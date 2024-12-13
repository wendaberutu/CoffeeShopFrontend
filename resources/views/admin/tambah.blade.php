@extends('layouts.main')
@section('judul') Tambah Produk @endsection
@section('container')
<div class="card-body">
    <form id="product-form" enctype="multipart/form-data">
        @csrf
        <!-- Input Nama Barang -->
        <div class="form-group">
            <label for="nama_produk" class="form-label">Nama Barang</label>
            <input name="nama_produk" type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" value="{{ old('nama_produk') }}" />
            @error('nama_produk')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Input Kategori Barang (Dropdown) -->
        <div class="form-group">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" id="kategori">
                <option value="minuman" {{ old('kategori') == 'minuman' ? 'selected' : '' }}>Minuman</option>
                <option value="makanan" {{ old('kategori') == 'makanan' ? 'selected' : '' }}>Makanan</option>
            </select>
            @error('kategori')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Input Deskripsi Barang -->
        <div class="form-group">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Input Harga Barang -->
        <div class="form-group">
            <label for="harga" class="form-label">Harga</label>
            <input name="harga" type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" value="{{ old('harga') }}" />
            @error('harga')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Input Diskon Barang -->
        <div class="form-group">
            <label for="diskon" class="form-label">Diskon (%)</label>
            <input name="diskon" type="number" class="form-control @error('diskon') is-invalid @enderror" id="diskon" value="{{ old('diskon') }}" />
            @error('diskon')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Input Gambar Barang -->
        <div class="form-group">
            <label for="gambar" class="form-label">Foto Barang</label>
            <img id="foto-preview" class="img-preview img-fluid form-group col-sm-4 mx-auto" style="display: none" alt="Preview Foto Barang" />
            <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" onchange="previewImage()" accept="image/*" />
            @error('gambar')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <br>
        <button type="button" class="btn btn-primary" id="submit-button"><i class="fas fa-save"></i> Simpan Produk</button>
    </form>
</div>
@endsection

@section('scripttambahan')
<script>
    // Fungsi untuk preview gambar
    function previewImage() {
        const gambar = document.querySelector("#gambar");
        const imgPreview = document.querySelector("#foto-preview");

        imgPreview.style.display = "block";
        const reader = new FileReader();
        reader.readAsDataURL(gambar.files[0]);

        reader.onload = function (e) {
            imgPreview.src = e.target.result;
        };
    }

    // Fungsi untuk submit form
    document.getElementById("submit-button").addEventListener("click", async (event) => {
        event.preventDefault(); // Mencegah form melakukan submit default
        const form = document.getElementById("product-form");
        const formData = new FormData(form);

        const token = localStorage.getItem("access_token");
        const serverBackend = @json(env('SERVER_BACKEND')); // Ambil URL backend dari sisi server

        try {
            const response = await fetch(`${serverBackend}/api/products`, {
                method: "POST",
                headers: {
                    "Authorization": `Bearer ${token}`,
                },
                body: formData,
            });

            if (!response.ok) {
                const errorData = await response.json();
                throw new Error(errorData.message || "Terjadi kesalahan");
            }

            const result = await response.json();
            alert("Produk berhasil ditambahkan!");
            console.log(result);

            // Redirect ke halaman admin/product
            window.location.href = "/admin/products";
        } catch (error) {
            console.error("Error:", error.message);
            alert("Gagal mengirim data: " + error.message);
        }
    });
</script>

@endsection
