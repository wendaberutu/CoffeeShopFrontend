<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Verify OTP</h3>
                    </div>
                    <div class="card-body">
                        <form id="otpVerifyForm">
                            <div class="mb-3">
                                <label for="verifyNomor" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="verifyNomor" name="nomor" placeholder="Masukkan nomor telepon" required>
                            </div>
                            <div class="mb-3">
                                <label for="otp" class="form-label">Kode OTP</label>
                                <input type="text" class="form-control" id="otp" name="otp" placeholder="Masukkan OTP" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Verify OTP</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script for OTP Verify -->
    <script>
         // Ambil nomor telepon dari localStorage dan tampilkan di form
        document.getElementById('verifyNomor').value = localStorage.getItem('nomor_otp');

        document.getElementById('otpVerifyForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const nomor = document.getElementById('verifyNomor').value;
            const otp = document.getElementById('otp').value;

            // Melakukan verifikasi OTP ke backend
            fetch('http://127.0.0.1:8000/api/verify-otp', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    nomor: nomor,
                    otp: otp
                })
            })
            .then(response => response.json())
            .then(data => {
                
                if (data.message === 'OTP verified successfully') {
                    alert('OTP berhasil diverifikasi');
                } else {
                    alert('Verifikasi OTP gagal');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
