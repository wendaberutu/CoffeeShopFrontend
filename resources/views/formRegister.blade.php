<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data User</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        /* Form input fields styling */
        .form-control {
            background: #ffffff;
            border: 1px solid #ced4da;
            color: #495057;
        }

        /* Placeholder text color */
        .form-control::placeholder {
            color: #6c757d;
        }

        /* Button styling */
        .login-btn {
            background-color: #6c757d;
            color: white;
            border: none;
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }

        .login-btn:hover {
            background-color: #5a6268;
        }

        /* Circular logo styling */
        .logo-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            overflow: hidden;
            object-fit: cover;
        }
    </style>
</head>
<body class="login-background">
    <div class="container d-flex vh-100">
        <!-- Right Side -->
        <div class="right-side">
            <div class="form-container shadow">
                <div class="text-center mb-4">
                    <div class="logo-circle">
                        <img src="/images/logo.png" alt="Logo" class="img-fluid"> <!-- Ganti dengan path logo Anda -->
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
