<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | CWD Coffee</title>
    <!-- Hubungkan ke file CSS -->
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body style="background-image: url('/images/coffee-background.jpg'); background-size: cover; background-position: center; background-attachment: fixed; color: white;">
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

    <!-- Contact Section with Box -->
    <div style="padding: 50px; border-radius: 10px; max-width: 600px; margin: auto; text-align: center;">
        <div class="contact-section">
            <!-- Kotak Konten -->
            <div class="contact-info" style="background-color: rgba(0, 0, 0, 0.7); padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <h1>Hubungi Kami</h1>
                <p>Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi kami. Kami selalu di sini untuk membantu!</p>
                <!-- Tombol WhatsApp dengan Ikon -->
                <a href="https://wa.me/6285184841997" class="btn btn-success" target="_blank" style="font-size: 18px; padding: 12px 20px; display: inline-flex; align-items: center; background-color: #25d366; border-radius: 5px; color: white; text-decoration: none;">
                    <i class="bi bi-whatsapp" style="margin-right: 8px;"></i> Hubungi melalui WhatsApp
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS dan icons (untuk tombol WhatsApp) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
