const apiUrl = 'http://127.0.0.1:8000/api/products'; // Ganti dengan URL API yang sesuai

// Mengambil daftar produk saat halaman dimuat
document.addEventListener('DOMContentLoaded', fetchProducts);

// Mengambil produk dari API
function fetchProducts() {
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                displayProducts(data.data);
            } else {
                alert('Error fetching products.');
            }
        })
        .catch(error => console.error('Error:', error));
}

// Menampilkan produk di tabel
function displayProducts(products) {
    const tbody = document.querySelector('#productTable tbody');
    tbody.innerHTML = '';  // Kosongkan tabel
    products.forEach((product, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${index + 1}</td>
            <td>${product.nama_produk}</td>
            <td>${product.deskripsi}</td>
            <td>${product.harga}</td>
            <td>${product.diskon}%</td>
            <td>
                <button class="btn btn-warning btn-sm" onclick="editProduct(${product.id})">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-danger btn-sm" onclick="deleteProduct(${product.id})">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

// Menangani penambahan produk baru
document.getElementById('addProductForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData();
    formData.append('nama_produk', document.getElementById('nama_produk').value);
    formData.append('deskripsi', document.getElementById('deskripsi').value);
    formData.append('harga', document.getElementById('harga').value);
    formData.append('kategori', document.getElementById('kategori').value);
    formData.append('diskon', document.getElementById('diskon').value);
    formData.append('gambar', document.getElementById('gambar').files[0]);

    const token = localStorage.getItem('access_token');  // Ambil token dari localStorage

    fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Authorization': `Bearer ${token}`,  // Sertakan token di header
        },
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Produk berhasil ditambahkan!');
                fetchProducts();  // Muat ulang daftar produk
                $('#addProductModal').modal('hide');  // Tutup modal
            } else {
                alert('Error menambahkan produk: ' + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
});

// Edit produk (Fungsi dapat ditambahkan di sini)
function editProduct(id) {
    console.log('Edit produk dengan ID:', id);
    // Tambahkan logika untuk mengedit produk
}

// Menghapus produk
function deleteProduct(id) {
    if (confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
        const token = localStorage.getItem('access_token');  // Ambil token dari localStorage

        fetch(`${apiUrl}/${id}`, {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${token}`,  // Sertakan token di header
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Produk berhasil dihapus!');
                    fetchProducts();  // Muat ulang daftar produk
                } else {
                    alert('Error menghapus produk: ' + data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    }
}
