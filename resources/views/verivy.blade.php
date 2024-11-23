<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Verify OTP</title>
    <!-- Link Custom CSS -->
    <link href="{{ asset('css/otp_request.css') }}" rel="stylesheet">
</head>
<body>
    <div class="otp-background">
        <div class="form-container">
            <img src="{{ asset('images/logo.png') }}" alt="CWD Coffee" width="50" class="logo-circle mb-3">
            <h2>Verify OTP</h2>

            <div id="error-message" class="alert alert-danger" style="display: none;"></div>

            <form id="otpVerifyForm">
                @csrf
                <div class="mb-3">
                    <label for="nomor" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Masukkan nomor telepon" required>
                </div>
                <div class="mb-3">
                    <label for="otp" class="form-label">Kode OTP</label>
                    <input type="text" class="form-control" id="otp" name="otp" placeholder="Masukkan kode OTP" required>
                </div>
                <button type="submit" class="btn otp-btn mt-3">Verify OTP</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('otpVerifyForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const nomor = document.getElementById('nomor').value;
            const otp = document.getElementById('otp').value;
            const errorMessage = document.getElementById('error-message');

            // Reset pesan error
            errorMessage.style.display = 'none';
            errorMessage.textContent = '';

            // Validasi OTP (hanya angka, panjang 6 karakter)
            if (!/^\d{6}$/.test(otp)) {
                errorMessage.style.display = 'block';
                errorMessage.textContent = 'Kode OTP tidak valid. Masukkan 6 digit angka.';
                return;
            }

            // Validasi Nomor Telepon
            if (!/^\d{10,15}$/.test(nomor)) {
                errorMessage.style.display = 'block';
                errorMessage.textContent = 'Nomor telepon tidak valid. Masukkan 10-15 digit angka.';
                return;
            }

            // Melakukan verifikasi OTP ke backend
            fetch('http://127.0.0.1:8000/api/otp/verify', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ otp, nomor })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('OTP berhasil diverifikasi');
                    window.location.href = '/formRegister';
                } else {
                    errorMessage.style.display = 'block';
                    errorMessage.textContent = data.message || 'Verifikasi OTP gagal. Silakan coba lagi.';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                errorMessage.style.display = 'block';
                errorMessage.textContent = 'Terjadi kesalahan pada server. Silakan coba lagi.';
            });
        });
    </script>
</body>
</html>
