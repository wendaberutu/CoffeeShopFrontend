@extends('layouts.main') @section('judul') Tambah Produk @endsection
@section('container')
<div class="card-body">
<form action="{{ '#' }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Input Nama Barang -->
    <div class="form-group">
        <label for="nama_barang" class="form-label">Nama Barang</label>
        <input
            name="nama_barang"
            type="text"
            class="form-control @error('nama_barang') is-invalid @enderror"
            id="nama_barang"
            value="{{ old('nama_barang') }}"
 
        /> @error('nama_barang')
        <div class="invalid-feedback">{{ $message }}</div>
        <!-- Menampilkan pesan error -->
        @enderror
    </div>

    <!-- Input Kategori Barang -->
    <div class="form-group">
        <label for="kategori" class="form-label">Kategori</label>
        <input
            name="kategori"
            type="text"
            class="form-control @error('kategori') is-invalid @enderror"
            id="kategori"
            value="{{ old('kategori') }}"
        />
        @error('kategori')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Input Deskripsi Barang -->
    <div class="form-group">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea
            name="deskripsi"
            class="form-control @error('deskripsi') is-invalid @enderror"
            id="deskripsi"
            rows="4"
        >
{{ old('deskripsi') }}</textarea
        >
        @error('deskripsi')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Input Harga Barang -->
    <div class="form-group">
        <label for="harga" class="form-label">Harga</label>
        <input
            name="harga"
            type="number"
            class="form-control @error('harga') is-invalid @enderror"
            id="harga"
            value="{{ old('harga') }}"
        />
        @error('harga')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Input Diskon Barang -->
    <div class="form-group">
        <label for="diskon" class="form-label">Diskon (%)</label>
        <input
            name="diskon"
            type="number"
            class="form-control @error('diskon') is-invalid @enderror"
            id="diskon"
            value="{{ old('diskon') }}"
        />
        @error('diskon')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Input Gambar Barang (Foto) -->
    <div class="form-group">
        <label for="foto_barang" class="form-label">Foto Barang</label>

        <!-- Gambar Preview -->
        <img
            id="foto-preview"
            class="img-preview img-fluid form-group col-sm-4 mx-auto"
            style="display: none"
            alt="Preview Foto Barang"
        />

        <!-- Input File untuk Foto Barang -->
        <input
            class="form-control @error('foto_barang') is-invalid @enderror"
            type="file"
            id="foto_barang"
            name="foto_barang"
            onchange="previewImage()"
            accept="image/*"
        />
        @error('foto_barang')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <br>

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Simpan Produk
    </button>
</form>
</div>
@endsection


{{-- @section('scripttambahan')
    <script>
         // Fungsi untuk menampilkan preview gambar
    function previewImage() {
        const foto_barang = document.querySelector("#foto_barang");
        const imgPreview = document.querySelector("#foto-preview");

        // Menampilkan gambar preview
        imgPreview.style.display = "block";

        const reader = new FileReader();
        reader.readAsDataURL(foto_barang.files[0]);

        reader.onload = function (e) {
            imgPreview.src = e.target.result;
        };
    }
    </script>
@endsection --}}
