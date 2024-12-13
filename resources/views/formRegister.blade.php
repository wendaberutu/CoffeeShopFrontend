<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data User</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    
</head>
<body class="login-background">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <!-- Left Side -->
            <div class="col-md-6 left-side">
                <div class="text-center px-3">
                    <h1 class="display-5 fw-bold">Selamat Datang</h1>
                    <p class="lead">Silakan masukkan data Anda di formulir sebelah kanan. Data Anda akan diproses dengan aman dan rahasia.</p>
                </div>
            </div>

            <!-- Right Side -->
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="form-container col-12 col-md-10 col-lg-8">
                    <div class="text-center mb-4">
                        <div class="logo-container">
                            <div class="logo">
                                <img src="{{ asset('images/logo.png') }}" alt="CWD Coffee">
                            </div>
                        </div>
                    </div>
                    <h3 class="text-center mb-4">Input Data User</h3>
                    <form id="userForm">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                        </div>
                        <div class="mb-3">
                            <label for="umur" class="form-label">Umur</label>
                            <input type="number" class="form-control" id="umur" name="umur" placeholder="Masukkan umur" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="no_whatshap" class="form-label">Nomor WhatsApp</label>
                            <input type="text" class="form-control" id="no_whatshap" name="no_whatshap" placeholder="Masukkan nomor WhatsApp" value="{{ session('nomor') ?? $nomor ?? '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                        </div>
                        <button type="submit" class="btn login-btn">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript to Handle Form Submission -->
    <script>
        document.getElementById('userForm').addEventListener('submit', async function(event) {
            event.preventDefault();

            // Prepare the form data
            const formData = new FormData(this);

            // Convert form data to an object
            const data = {};
            formData.forEach((value, key) => {
                data[key] = value;
            });

            console.log("Data : ", JSON.stringify(data));
            try {
                const response = await fetch('http://127.0.0.1:8000/api/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data),
                });

                const result = await response.json();

                if (response.ok) {
                    alert('Data berhasil disimpan!');
                    // Redirect to login page
                    window.location.href = '/login';
                } else {
                    alert('Terjadi kesalahan: ' + result.message);
                }
            } catch (error) {
                alert('Error: ' + error.message);
            }
        });
    </script>
</body>
</html>
