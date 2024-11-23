@extends('layouts.main')
@section('judul')
    Menu
@endsection
@section('container')
<div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-4 justify-content-center">
    @foreach ($data as $row)
        <div class="col mb-4">
            <div class="card h-100">
                <!-- Product image -->
                <div class="m-3">
                    <img class="card-img-top img-preview img-fluid" src="{{ asset('storage/' . $row->gambar) }}" alt="{{ $row->nama_produk }}" />
                </div>

                <!-- Product details -->
                <div class="card-body p-1">
                    <div class="text-center">
                        <!-- Product name -->
                        <h5 class="fw-bold">{{ $row->nama_produk }}</h5>

                        <!-- Product category -->
                        <p class="mb-1 text-muted">{{ $row->kategori }}</p>

                        <!-- Product description -->
                        <p class="card-text">{{ \Str::limit($row->deskripsi, 100) }}</p>

                        <!-- Product price -->
                        <h6 class="fw-bold" style="color: blue;">Rp. {{ number_format($row->harga, 0, ',', '.') }}</h6>

                        <!-- Product discount -->
                        @if($row->diskon > 0)
                            <span class="badge bg-success">Diskon: {{ $row->diskon }}%</span>
                        @endif
                    </div>

                    <!-- Button to send message -->
                    <div class="mt-4 text-center">
                        <a href="{{ url('pesan/' . $row->id) }}" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
