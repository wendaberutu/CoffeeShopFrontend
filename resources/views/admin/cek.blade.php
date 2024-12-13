
@extends('layouts.main')
@section('judul')
    Cek
@endsection
@section('container')
 
  

 
@endsection






  {{-- <h1>Product List</h1>
    <div id="product-list">
        <!-- Produk akan ditampilkan di sini -->
    </div> --}}

@section('scripttambahannnnnnn')
    
<script>
    // Fungsi untuk mengirimkan permintaan GET ke endpoint dengan token
const fetchProducts = async () => {
    try {
        const token = localStorage.getItem("access_token");

        if (!token) {
            console.error("No token found. Please log in first.");
            document.getElementById("product-list").innerHTML =
                "<p>No token found. Please log in first.</p>";
            return;
        }

        const response = await fetch("http://127.0.0.1:8000/api/public/products", {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "Authorization": `Bearer ${token}`,
            },
        });

        const result = await response.json();

        if (response.ok) {
            // Perbaikan akses data di sini
            displayProducts(result.data); // Akses langsung ke `data` dari respons API
        } else {
            console.error("Failed to fetch products:", result.message || "Unknown error");
            document.getElementById("product-list").innerHTML =
                `<p>Error: ${result.message || "Failed to fetch products."}</p>`;
        }
    } catch (error) {
        console.error("An error occurred while fetching products:", error);
        document.getElementById("product-list").innerHTML =
            "<p>An error occurred while fetching products. Please try again later.</p>";
    }
};

// Fungsi untuk menampilkan produk di halaman
const displayProducts = (products) => {
    const productList = document.getElementById("product-list");

    if (products && products.length > 0) {
        productList.innerHTML = products
            .map(
                (product) => `
                <div>
                    <h3>${product.nama_produk}</h3>
                    <p>Kategori: ${product.kategori}</p>
                    <p>Harga: Rp ${product.harga}</p>
                    <p>Deskripsi: ${product.deskripsi}</p>
                </div>
                <hr>
            `
            )
            .join("");
    } else {
        productList.innerHTML = "<p>No products available.</p>";
    }
};

// Panggil fungsi
fetchProducts();

</script>
@endsection


 
 