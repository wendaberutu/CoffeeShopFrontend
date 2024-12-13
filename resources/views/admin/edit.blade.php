@extends('layouts.main')
@section('judul')
    Edit Menu
@endsection
@section('container')

<div class="card-header">
    
</div>
<div class="card-body">
    <form action="{{ '#' }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT') <!-- Pastikan method PUT untuk update -->

        <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" id="nama_produk">
            
        </div>

        <div class="form-group mt-3">
            <label for="kategori">Kategori</label>
            <input type="text" name="kategori" class="form-control" id="kategori">
             
        </div>

        <div class="form-group mt-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi"></textarea>
 
        </div>

        <div class="form-group mt-3">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" id="harga">
       
        </div>

        <div class="form-group mt-3">
            <label for="diskon">Diskon (%)</label>
            <input type="number" name="diskon" class="form-control" id="diskon">
       
        </div>

        <div class="form-group mt-3">
            <label for="foto_barang">Foto Barang</label>
               <div class="d-flex justify-content-center align-items-center">
    <img src="" alt="Image" class="img-preview img-fluid mb-3" style="max-width: 300px; display: none;">
</div>
            <input type="file" class="form-control" id="foto_barang" name="foto_barang" onchange="previewImage()">
     
        </div>
        <br>

        <button type="submit" class="btn btn-primary mt-3">Update Menu</button>
    </form>
</div>

@endsection

@section('scripttambahan')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const productData = localStorage.getItem("editProduct");

    console.log(localStorage.getItem('access_token'));
    // Pastikan data ada dan dapat di-parse
    if (productData) {
        const product = JSON.parse(productData);

        // Pastikan struktur data yang benar
        if (product.status === "success" && product.data) {
            const productData = product.data;
            console.log(productData);

            // Isi form dengan data produk
            document.getElementById("nama_produk").value = productData.nama_produk;
            document.getElementById("kategori").value = productData.kategori;
            document.getElementById("deskripsi").value = productData.deskripsi;
            document.getElementById("harga").value = productData.harga;
            document.getElementById("diskon").value = productData.diskon;

            // Tampilkan gambar jika ada
            if (productData.gambar) {
                const imgPreview = document.querySelector(".img-preview");
                imgPreview.src = `http://127.0.0.1:8000/storage/${productData.gambar}`;
                imgPreview.style.display = "block";
            }
        }
    } else {
        console.error("Data produk tidak ditemukan di localStorage.");
    }
});


function previewImage() {
    const file = document.getElementById("foto_barang").files[0];
    const reader = new FileReader();

    reader.onloadend = function () {
        const imgPreview = document.querySelector(".img-preview");
        imgPreview.src = reader.result;
        imgPreview.style.display = "block";
    };

    if (file) {
        reader.readAsDataURL(file);
    }
}
    console.log(JSON.parse(localStorage.getItem("editProduct")));

</script>
 


<script>
    document.querySelector("form").addEventListener("submit", async function (e) {
        e.preventDefault(); // Mencegah pengiriman form secara default

        // Ambil data produk dari localStorage
        const data = JSON.parse(localStorage.getItem("editProduct"));
        
        // Pastikan data produk dan id tersedia
        if (!data) {
            console.error("Data produk tidak ditemukan atau id produk tidak tersedia.");
            alert("Data produk tidak ditemukan.");
            return;
        }
        
        const productId = data.data.id;  // Ambil id produk dari data
        const token = localStorage.getItem("access_token");  // Ambil token akses dari localStorage
        
        // Cek apakah token akses tersedia
        if (!token) {
            console.error("Access token tidak ditemukan.");
            alert("Anda tidak memiliki akses.");
            return;
        }

        console.log("ID Produk: ", productId);
        console.log("Access Token: ", token);

        // Ambil data dari form
        const form = e.target;
        const formData = new FormData(form);  // Ambil data formulir
        
        // Cek data di dalam formData
        for (let [key, value] of formData.entries()) {
            console.log(key, value);  // Debug: tampilkan data yang terkandung di formData
        }

        try {
            const response = await fetch(`http://127.0.0.1:8000/api/products/${productId}`, {
                method: "PUT",  // Menggunakan metode PUT untuk memperbarui produk
                headers: {
                    "Authorization": `Bearer ${token}`,  // Menambahkan token dalam header Authorization
                },
                body: formData,  // Mengirimkan data formulir dalam request body
            });

            // Cek apakah response berhasil
            if (!response.ok) {
                const errorData = await response.json();
                console.error("Error:", errorData);
                alert("Gagal mengupdate produk: " + (errorData.message || "Unknown error"));
                return;
            }

            const responseData = await response.json();
            console.log("Sukses:", responseData);
            alert("Produk berhasil diperbarui.");

            // Redirect ke halaman admin/products setelah berhasil
            window.location.href = "/admin/products";  // Redirect ke halaman produk admin
        } catch (error) {
            console.error("Terjadi kesalahan:", error);
            alert("Terjadi kesalahan saat mengupdate produk.");
        }
    });
</script>


<script>
    window.addEventListener('beforeunload', () => {
    localStorage.removeItem('editProduct');
});
</script>

@endsection
