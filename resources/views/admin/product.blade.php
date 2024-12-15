@extends('layouts.main')

@section('judul')
    Daftar Menu
@endsection

@section('container')
<a href="{{ route('tambah.product') }}" class="btn btn-secondary">
    <i class="fas fa-plus"></i> Tambah
</a>

<div class="d-flex justify-content-between align-items-center"></div>
<hr>

<table id="barangTable" class="table table-striped">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>ID</th>
            <th>Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Diskon</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $index => $product)
        <tr class="text-center">
            <td>{{ $index + 1 }}</td>
            <td>{{ $product['id'] }}</td>
            <td>{{ $product['nama_produk'] }}</td>
            <td>{{ $product['kategori'] }}</td>
            <td>Rp {{ number_format($product['harga']) }}</td>
            <td>{{ $product['diskon'] . "%" }}</td>
            <td>
    @if($product['gambar'])
        <img src={{ env("SERVER_BACKEND") . "/storage/" . $product['gambar'] }} alt="Gambar Produk" style="width: 100px; height: auto;">
   
        @else
        Tidak ada gambar
    @endif
</td>

            <td>
 


               <button class="btn btn-success btn-sm edit-btn" data-id="{{ $product['id'] }}"><i class="fas fa-pen"></i></button>

                {{-- <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button> --}}
                <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $product['id'] }}"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table> 
@endsection


@section('scripttambahan')
 <script>
    document.addEventListener("DOMContentLoaded", function () {
    const editButtons = document.querySelectorAll(".edit-btn");
    const token =  localStorage.getItem("access_token"); // Ganti dengan token API Anda
    console.log(token);
const user = JSON.parse(localStorage.getItem("user")); // Mengubah string ke objek
console.log(user);

    editButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const productId = button.getAttribute("data-id");
            const apiEndpoint = `http://127.0.0.1:8000/api/public/products/${productId}`;

            // Fetch data produk dengan token otorisasi
            fetch(apiEndpoint, {
                method: "GET",
                headers: {
                    "Authorization": `Bearer ${token}`,
                    "Content-Type": "application/json",
                },
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Gagal memuat data produk.");
                    }
                    return response.json();
                })
                .then((data) => {
                    if (data) {
                        console.log(data);
                        // Simpan data ke localStorage untuk digunakan di halaman edit
                        localStorage.setItem("editProduct", JSON.stringify(data));
                        localStorage.setItem("productID", JSON.stringify(data.id));
                         
                        
                        // Arahkan ke halaman edit
                        window.location.href = "/admin/products/edit";

                       
                    } else {
                        alert("Data produk tidak ditemukan.");
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("Terjadi kesalahan saat memuat data produk.");
                });
        });
    });
});

 </script>
 
 <script>
    document.addEventListener("DOMContentLoaded", function () {
        const deleteButtons = document.querySelectorAll(".delete-btn");
        const token = localStorage.getItem("access_token"); // Mengambil token API

        if (!token) {
            console.error("Access token tidak ditemukan.");
            alert("Anda tidak memiliki akses.");
            return;
        }
        console.log(token);

        deleteButtons.forEach((button) => {
            button.addEventListener("click", async function () {
                const productId = button.getAttribute("data-id"); // Ambil ID produk dari atribut data-id
                const apiEndpoint = `http://127.0.0.1:8000/api/products/${productId}`;
                
                // Tampilkan dialog konfirmasi
                const confirmation = confirm("Apakah Anda yakin ingin menghapus produk ini?");
                if (!confirmation) {
                    return; // Jika user membatalkan, hentikan proses
                }

                try {
                    // Kirim request DELETE ke API
                    const response = await fetch(apiEndpoint, {
                        method: "DELETE",
                        headers: {
                            "Authorization": `Bearer ${token}`, // Menambahkan token ke header Authorization
                        },
                    });

                    if (!response.ok) {
                        const errorData = await response.json();
                        console.error("Error:", errorData);
                        alert("Gagal menghapus produk: " + (errorData.message || "Unknown error"));
                        return;
                    }

                    // Jika berhasil
                    alert("Produk berhasil dihapus.");
                    // Hapus elemen produk dari DOM atau reload halaman
                    location.reload(); // Reload halaman untuk menyegarkan daftar produk
                } catch (error) {
                    console.error("Terjadi kesalahan:", error);
                    alert("Terjadi kesalahan saat menghapus produk.");
                }
            });
        });
    });
</script>

 

@endsection
