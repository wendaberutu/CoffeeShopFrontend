<!DOCTYPE html>
<html lang="id">
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
            <h1>CWD Coffee!</h1>
            <p>Selamat datang di CWD Coffee, tempat di mana setiap cangkir kopi menyajikan lebih dari sekadar rasa, tetapi sebuah pengalaman. Di sini, kami tidak hanya menyajikan kopi, melainkan juga menyajikan kisah yang penuh kehangatan dan kelezatan. Dari biji kopi pilihan terbaik yang dipilih dengan seksama hingga proses penyajian yang penuh perhatian, setiap tegukan di CWD Coffee adalah perjalanan rasa yang tak terlupakan.</p>

            <h1>Kenapa Memilih CWD Coffee?</h1>
            <p>Di CWD Coffee, kami percaya bahwa setiap cangkir kopi adalah cerita yang dimulai dengan pemilihan biji kopi berkualitas tinggi, yang diproses dengan teknik yang terampil, dan disajikan dengan penuh kasih sayang. Kami berkomitmen untuk memberikan pengalaman yang berbeda dengan setiap tegukan. Kami juga menyadari pentingnya suasana yang nyaman, sehingga Anda bisa menikmati kopi sambil bersantai, bekerja, atau berkumpul dengan teman-teman. Di CWD Coffee, setiap kunjungan adalah momen berharga yang ingin kami bagi dengan Anda.</p>

            <p>Lebih dari sekedar tempat untuk minum kopi, kami menciptakan atmosfer yang nyaman dan ramah agar Anda merasa seperti di rumah sendiri. Kami ingin Anda merasa betah untuk berlama-lama, baik untuk menikmati secangkir kopi yang nikmat atau hanya sekedar menghabiskan waktu bersama orang-orang terdekat. Dengan pelayanan yang penuh perhatian, kami berusaha untuk memberikan pengalaman terbaik setiap kali Anda berkunjung.</p>

            <h1>Rasakan Kenikmatan Setiap Momen di CWD Coffee</h1>
            <p>Apakah Anda pencinta kopi klasik atau lebih suka varian kopi kekinian? Di CWD Coffee, kami menyajikan beragam jenis kopi untuk memenuhi selera Anda. Dari kopi hitam yang pekat hingga cappuccino dengan busa susu lembut, setiap kopi yang kami sajikan memiliki cita rasa yang kaya dan tak terlupakan. Ditambah dengan makanan ringan yang menggugah selera, seperti pastry segar dan camilan ringan, setiap kunjungan Anda akan menjadi pengalaman kuliner yang memuaskan.</p>

            <p>Selain kopi, kami juga menyediakan berbagai pilihan minuman lainnya yang menyegarkan, serta hidangan yang cocok untuk menemani waktu santai Anda. Jadi, apakah Anda sedang mencari tempat untuk bekerja dengan tenang atau hanya ingin menikmati waktu bersama teman-teman, CWD Coffee adalah pilihan yang sempurna.</p>

            <p>Segera kunjungi kami dan nikmati kopi terbaik yang hanya bisa Anda temukan di CWD Coffee. Kami yakin, setelah mencoba, Anda akan selalu kembali untuk menikmati setiap momen berharga bersama kami. Kami menantikan kedatangan Anda di CWD Coffee, tempat di mana setiap cangkir kopi membawa kebahagiaan.</p>
        </div>
    </div>

</body>
</html>
