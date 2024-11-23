@extends('layouts.main')
@section('judul')
    Edit Menu
@endsection
@section('container')

<div class="card-header">
    
    </div>
    <div class="card-body">
        {{-- <form action="{{ route('admin.update-menu', $menu->id) }}" method="POST" enctype="multipart/form-data"> --}}
        <form action="{{ '#' }}" method="POST" enctype="multipart/form-data">

            @csrf
            {{-- @method('POST') --}}

            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" value="{{ old('nama_produk', $menu->nama_produk) }}">
                @error('nama_produk')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="kategori">Kategori</label>
                <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror" id="kategori" value="{{ old('kategori', $menu->kategori) }}">
                @error('kategori')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="harga">Harga</label>
                <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" value="{{ old('harga', $menu->harga) }}">
                @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="diskon">Diskon (%)</label>
                <input type="number" name="diskon" class="form-control @error('diskon') is-invalid @enderror" id="diskon" value="{{ old('diskon', $menu->diskon) }}">
                @error('diskon')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="foto_barang">Foto Barang</label>
                <img src="{{ asset('images/menu/' . $menu->gambar) }}" alt="Image" class="img-preview img-fluid mb-3" style="max-width: 100px;">
                <input type="file" class="form-control @error('foto_barang') is-invalid @enderror" id="foto_barang" name="foto_barang" onchange="previewImage()">
                @error('foto_barang')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>

            <button type="submit" class="btn btn-primary mt-3">Update Menu</button>
        </form>
    </div>