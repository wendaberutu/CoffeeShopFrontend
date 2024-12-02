@extends('layouts.main')

@section('judul')
    Daftar Menu
@endsection

@section('container')
<a href="{{ route('tambah.product') }}" class="btn btn-primary">
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
            <td>
    @if($product['gambar'])
        <img src={{ env("SERVER_BACKEND") . "/storage/" . $product['gambar'] }} alt="Gambar Produk" style="width: 100px; height: auto;">
   
        @else
        Tidak ada gambar
    @endif
</td>

            <td>
<a href="{{ url('/admin/products/edit/' . $product['id']) }}" class="btn btn-success btn-sm">
        <i class="fas fa-pen"></i>
    </a>

                <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection


@section('scripttambahan')
<script>
    function editProduct(productId) {
    const token = localStorage.getItem('token');  // Ambil token dari localStorage
    
    if (!token) {
        console.log(token);
        alert("Anda belum login!");
        return;
    }

    // Mengirim request ke backend untuk mendapatkan data produk
    fetch(`http://127.0.0.1:8000/api/public/products/${productId}`, {
        method: 'GET',
        headers: {
            // 'Authorization': `Bearer ${token}`,
            'Content-Type': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const product = data.product;  // Misalnya response memiliki properti 'product'
            
            // Isi data pada form edit
            document.getElementById('nama_produk').value = product.nama_produk;
            document.getElementById('kategori').value = product.kategori;
            document.getElementById('deskripsi').value = product.deskripsi;
            document.getElementById('harga').value = product.harga;
            document.getElementById('diskon').value = product.diskon;
            
            // Tampilkan gambar produk jika ada
            const imageUrl = product.gambar ? `{{ env('SERVER_BACKEND') }}/storage/${product.gambar}` : '';
            document.querySelector('.img-preview').src = imageUrl;

            // Tampilkan form edit (misalnya menggunakan modal atau page lain)
            window.location.href = `/admin/products/edit/${productId}`;
        } else {
            console.log(data);
            alert('Data produk tidak ditemukan');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat memuat data produk');
    });
}

 </script>
@endsection
