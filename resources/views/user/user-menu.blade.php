@extends('layouts.main')
@section('judul')
    Menu
@endsection

 
 @section('container')
<div class="container mt-4">
    <!-- Dropdown untuk memilih kategori -->
    <div class="mb-3">
        <label for="category-select" class="form-label">Pilih Kategori:</label>
        <select id="category-select" class="form-select" onchange="filterProducts()">
            <option value="minuman" selected>Minuman</option>
            <option value="makanan">Makanan</option>
        </select>
    </div>

    <!-- Card Produk -->
    <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-4 justify-content-start" id="product-container">
        <!-- Produk akan ditambahkan di sini oleh JavaScript -->
    </div>
</div>
 @endsection

@section('scripttambahan')
<script>
let products = [];  // Menyimpan data produk secara global

async function fetchProducts() {
    try {
        const response = await fetch('http://127.0.0.1:8000/api/public/products', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const result = await response.json();
        console.log(result); // Debugging: Periksa struktur respons API

        // Ambil array produk dari result.data
        products = result.data || [];
        renderProducts('minuman'); // Tampilkan produk default 'minuman'
    } catch (error) {
        console.error('Error fetching products:', error);
    }
}

function renderProducts(category) {
    const container = document.getElementById('product-container');
    container.innerHTML = ''; // Bersihkan konten sebelumnya

    // Filter produk berdasarkan kategori yang dipilih (gunakan toLowerCase untuk memastikan tidak sensitif terhadap kapitalisasi)
    const filteredProducts = products.filter(product => product.kategori.toLowerCase() === category.toLowerCase());

    if (filteredProducts.length === 0) {
        container.innerHTML = '<p class="text-center">Tidak ada produk yang tersedia untuk kategori ini.</p>';
        return;
    }

    filteredProducts.forEach(product => {
        const card = `
            <div class="card h-100">
                <!-- Product image -->
                <div class="m-3">
                    <img class="card-img-top img-preview img-fluid" 
                         src="http://127.0.0.1:8000/storage/${product.gambar}" 
                         alt="Gambar ${product.nama_produk}">
                </div>
                <!-- Product details -->
                <div class="card-body p-1">
                    <div class="text-center">
                        <!-- Product name -->
                        <h5 class="fw-bold">${product.nama_produk}</h5>
                        <!-- Product price -->
                        <p class="text-success">Rp${new Intl.NumberFormat('id-ID').format(product.harga)}</p>
                         
                        
                        <!-- Product description -->
                        <p class="text-muted small">${product.deskripsi}</p>
                    </div>
                </div>
                <!-- Product discount (if available) -->
                ${product.diskon > 0 ? 
                    `<div class="badge bg-danger text-white position-absolute" style="top: 10px; right: 10px;">
                        Diskon ${product.diskon}%
                    </div>` 
                : ''}
            </div>
        `;

        // Append card to container
        const col = document.createElement('div');
        col.className = 'col mb-4';
        col.innerHTML = card;
        container.appendChild(col);
    });
}

function filterProducts() {
    const category = document.getElementById('category-select').value; // Ambil nilai kategori yang dipilih
    renderProducts(category); // Render produk sesuai kategori yang dipilih
}

// Panggil fungsi untuk fetch produk pertama kali
fetchProducts();
</script>
@endsection

