<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CWD Coffee</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link Custom CSS (if any) -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>

    <div class="login-background">
        <div class="form-container">
            <img src="{{ asset('images/logo.png') }}" alt="CWD Coffee" class="logo-circle mb-3">
            <h2 class="mb-4">Login</h2>

            <!-- Error Message -->
            <div id="error-message" class="alert alert-danger" style="display: none;"></div>

            <!-- Login Form -->
            <form id="login-form">
                <div class="mb-3">
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Nomor WhatsApp" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn login-btn mt-3">Login</button>
            </form>

            <div class="mt-3">
                <p class="text-white">Belum punya akun? <a href="{{ route('otp.request') }}" class="text-warning">Daftar sekarang</a></p>
            </div>
        </div>
    </div>

    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- JavaScript for handling login -->
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
