<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/otp_verify.css') }}" rel="stylesheet">
    

</head>
<body class="login-background">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="form-container shadow">
            <div class="text-center mb-4">
                <h3>Verify OTP</h3>
            </div>

            <!-- Alert messages -->
            <div class="alert alert-danger mt-3" id="errorMessage" style="display: none;"></div>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- OTP Form -->
            <form id="otpVerifyForm" action="{{ route('otp.verify') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="verifyNomor" class="form-label">Nomor Telepon</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="verifyNomor" 
                        name="nomor" 
                        placeholder="Masukkan nomor telepon" 
                        value="{{ session('nomor') ?? $nomor ?? '' }}" 
                        required
                    >
                </div>
                <div class="mb-3">
                    <label for="otp" class="form-label">Kode OTP</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="otp" 
                        name="otp" 
                        placeholder="Masukkan OTP" 
                        required
                    >
                </div>
                <button type="submit" class="btn login-btn">Verify OTP</button>
            </form>
        </div>
    </div>

    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
