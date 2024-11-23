<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CWD Coffee</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>

    <div class="login-background">
        <div class="form-container">
            <img src="{{ asset('images/logo.png') }}" alt="CWD Coffee" width="50" class="logo-circle mb-3">
            <h2>Login</h2>

            <div id="error-message" class="alert alert-danger" style="display: none;"></div>

            <form id="login-form">
                @csrf
                <div class="mb-3">
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Nomor Whatshap" required>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script>
        document.getElementById('login-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const phone_number = document.getElementById('phone_number').value;
            const password = document.getElementById('password').value;

            fetch('http://127.0.0.1:8000/api/auth/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'  // Laravel CSRF token
                },
                body: JSON.stringify({
                    phone_number: phone_number,
                    password: password
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Redirect ke halaman home setelah login berhasil
                    window.location.href = '/home';  
                } else {
                    // Tampilkan pesan kesalahan jika login gagal
                    document.getElementById('error-message').style.display = 'block';
                    document.getElementById('error-message').innerText = data.message || 'Invalid credentials, please try again.';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('error-message').style.display = 'block';
                document.getElementById('error-message').innerText = 'Something went wrong. Please try again.';
            });
        });
    </script> --}}

</body>
</html>
