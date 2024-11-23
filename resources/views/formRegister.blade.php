<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data User</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link External CSS -->
    
    <style>
        /* Background styling */
        .login-background {
            background-image: url('/images/coffee-background2.jpg'); /* Make sure the path is correct */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        /* Form container styling */
        .form-container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
        }

        /* Form input fields styling */
        .form-control {
            background: transparent;
            border: 1px solid #ffffff;
            color: white;
        }

        /* Placeholder text color */
        .form-control::placeholder {
            color: #cccccc;
        }

        /* Button styling */
        .login-btn {
            background-color: #a0522d;
            color: white;
            border: none;
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }

        .login-btn:hover {
            background-color: #8b4513;
        }

        /* Circular logo styling */
        .logo-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            overflow: hidden;
            object-fit: cover;
        }

        /* Left-side text styling */
        .left-side {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            flex: 1;
        }

        .right-side {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body class="login-background">
    <div class="container d-flex vh-100">
        <!-- Left Side -->
        <div class="left-side d-none d-md-flex flex-column justify-content-center align-items-center text-center p-4">
            <h1 class="display-5 fw-bold mb-4">Selamat Datang</h1>
            <p class="lead">
                Silakan masukkan data Anda di formulir sebelah kanan. Data Anda akan diproses dengan aman dan rahasia.
            </p>
        </div>

        <!-- Right Side -->
        <div class="right-side">
            <div class="form-container shadow">
                <div class="text-center mb-4">
                    <div class="logo-circle">
                        <img src="/images/logo.png" alt="Logo" class="img-fluid"> <!-- Ganti dengan path logo Anda -->
                    </div>
                </div>
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Input Data User</h3>
                    </div>
                    <div class="card-body">
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
                                <input type="text" class="form-control" id="no_whatshap" name="no_whatshap" placeholder="Masukkan nomor WhatsApp" required>
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
    </div>

    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script for Handling Form -->
    <script>
        document.getElementById('userForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const data = {
                nama: document.getElementById('nama').value,
                email: document.getElementById('email').value,
                umur: document.getElementById('umur').value,
                tanggal_lahir: document.getElementById('tanggal_lahir').value,
                alamat: document.getElementById('alamat').value,
                no_whatshap: document.getElementById('no_whatshap').value,
                password: document.getElementById('password').value,
            };

            fetch('http://127.0.0.1:8000/api/user', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(responseData => {
                if (responseData.success) {
                    alert('Data user berhasil disimpan');
                } else {
                    alert('Gagal menyimpan data user');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
