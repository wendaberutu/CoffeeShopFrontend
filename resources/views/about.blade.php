<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | CWD Coffee</title>
    <!-- Hubungkan ke file CSS -->
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav>
        <div class="logo-container">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="CWD Coffee">
            </div>
            <span class="logo-text">CWD Coffee</span>
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Beranda</a></li>
            <li><a href="{{ route('about') }}" class="nav-link {{ Request::is('about') ? 'active' : '' }}">Tentang Kami</a></li>
            <li><a href="{{ route('contact') }}" class="nav-link {{ Request::is('contact') ? 'active' : '' }}">Kontak</a></li>
            <li><a href="{{ route('login') }}" class="login-button">Login</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div class="content-box">
            <h1>Selamat Datang di CWD Coffee!</h1>
            <p>Di CWD Coffee, kami tidak hanya menyajikan kopi, tetapi juga pengalaman yang memanjakan indera Anda. Dari biji kopi terbaik yang dipilih dengan cermat hingga penyajian yang penuh perhatian, kami berkomitmen untuk memberikan rasa yang tak terlupakan dalam setiap tegukan.</p>


            <h1>Kenapa Memilih Kami?</h1>
            <p>Kami percaya bahwa setiap cangkir kopi adalah cerita. Sebuah cerita yang dimulai dengan bahan baku berkualitas tinggi, diproses dengan teknik yang penuh seni, dan disajikan dengan kasih sayang. Di CWD Coffee, setiap kopi yang kami buat adalah dedikasi kami untuk memberikan kenyamanan dan kehangatan di setiap kunjungan Anda.</p>
            <p>Tidak hanya itu, suasana nyaman dan pelayanan yang ramah juga kami jaga agar Anda merasa betah dan ingin kembali. Apakah Anda mencari tempat untuk bersantai, bekerja, atau bertemu teman, CWD Coffee adalah pilihan yang tepat.</p>


            <h1>Menikmati Setiap Momen Bersama Kami</h1>
            <p>Kami menyajikan berbagai jenis kopi, dari yang klasik hingga varian kekinian, cocok untuk setiap selera. Ditambah dengan makanan ringan yang menggugah selera, CWD Coffee akan membuat setiap momen Anda semakin istimewa.</p>
            <p>Ayo, nikmati kopi terbaik hanya di CWD Coffee. Segera kunjungi kami dan rasakan sendiri kenikmatan yang tiada duanya!</p>
        </div>
    </div>

</body>
</html>
