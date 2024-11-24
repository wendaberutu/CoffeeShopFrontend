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
    <nav>
        <div class="logo-container">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="CWD Coffee">
            </div>
            <span class="logo-text">CWD Coffee</span>
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}" class="active">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Product</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="{{ route('login') }}" class="login-button">Login</a></li>
        </ul>
    </nav>

    <section class="hero">
        <h1>Enjoy The Most Delicious Coffee</h1>
        <p>Start the day and lift your mood with coffee</p>
        <img src="{{ asset('images/coffee-cup.jpg') }}" alt="Coffee Cup" class="coffee-cup">
    </section>

    <!-- Tambahkan konten lain di sini -->
</body>
</html>
