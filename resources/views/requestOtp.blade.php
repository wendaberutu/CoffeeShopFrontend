<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Request OTP</title>
    
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Link Custom CSS -->
    <link href="{{ asset('css/otp_request.css') }}" rel="stylesheet">
</head>
<body class="otp-background">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="form-container">
            <div class="text-center mb-4">
                <img src="/images/logo.png" alt="Logo" class="logo-circle">
                <h3 class="text-white">Request OTP</h3>
            </div>
            <form id="otpRequestForm">
                <div class="mb-3">
                    <label for="nomor" class="form-label text-white">Nomor Telepon</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="nomor" 
                        name="nomor" 
                        placeholder="Masukkan nomor telepon" 
                        required 
                        pattern="[0-9]{10,13}" 
                        title="Masukkan nomor telepon yang valid (10-13 digit angka)">
                </div>
                <button type="submit" class="btn btn-primary w-100">Request OTP</button>
            </form>
        </div>
    </div>

    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script for OTP Request -->
    <script>
        document.getElementById('otpRequestForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nomor = document.getElementById('nomor').value;
            
            // Melakukan request OTP ke backend
            fetch('http://127.0.0.1:8000/api/otp/request', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    nomor: nomor
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.message === 'OTP sent successfully') {
                    alert('OTP berhasil dikirim');
                    
                    // Simpan nomor telepon di localStorage untuk halaman verifikasi
                    localStorage.setItem('nomor_otp', nomor);

                    // Redirect ke halaman verifikasi OTP
                    window.location.href = '/otp/verify';
                } else {
                    alert('Gagal mengirim OTP: ' + (data.message || 'Error tidak diketahui'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan dalam mengirim OTP');
            });
        });
    </script>
</body>
</html>
