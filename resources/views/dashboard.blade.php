<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COFFEE SHOP</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex h-100">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white p-3">
            <h4 class="text-center">COFFEE SHOP</h4>
            <hr>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-box"></i> Menu
                    </a>
                </li>
            </ul>
            <hr>
            <!-- User Info -->
            <div class="user-info d-flex justify-content-between align-items-center">
                <span>Kaleb</span>
                <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main">
            <!-- Card Container -->
            <div class="content-card">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Daftar Barang</h2>
                    <button class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                </div>
                <hr>
                <table id="barangTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Barang</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>6</td>
                            <td>Susu</td>
                            <td>100</td>
                            <td>1000</td>
                            <td>
                                <button class="btn btn-success btn-sm"><i class="fas fa-pen"></i></button>
                                <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>7</td>
                            <td>Beras</td>
                            <td>200</td>
                            <td>2000</td>
                            <td>
                                <button class="btn btn-success btn-sm"><i class="fas fa-pen"></i></button>
                                <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#barangTable').DataTable({
                dom: 'Bfrtip',
                buttons: ['excel', 'pdf', 'print', 'colvis']
            });
        });
    </script>
</body>
</html>

<div class="content-card mt-4">
    <h3>Broadcast Pesan</h3>
    <form id="broadcastForm" action="#" method="POST">
        @csrf
        <div class="mb-3">
            <label for="message" class="form-label">Pesan</label>
            <textarea id="message" name="message" class="form-control" rows="3" placeholder="Tulis pesan broadcast..." required></textarea>
        </div>
        <div class="mb-3">
            <label for="action" class="form-label">Target Penerima</label>
            <select id="action" name="action" class="form-select" required>
                <option value="all">Semua</option>
                <option value="byAge">Berdasarkan Umur</option>
            </select>
        </div>
        <!-- Input umur awal dan akhir -->
        <div id="ageFilters" style="display: none;">
            <div class="mb-3">
                <label for="startAge" class="form-label">Umur Awal</label>
                <input type="number" id="startAge" name="start_age" class="form-control" min="1" placeholder="Masukkan umur awal">
            </div>
            <div class="mb-3">
                <label for="endAge" class="form-label">Umur Akhir</label>
                <input type="number" id="endAge" name="end_age" class="form-control" min="1" placeholder="Masukkan umur akhir">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> Kirim Pesan
        </button>
    </form>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const actionSelect = document.getElementById('action');
    const ageFilters = document.getElementById('ageFilters');

    actionSelect.addEventListener('change', function () {
        if (this.value === 'byAge') {
            ageFilters.style.display = 'block';
        } else {
            ageFilters.style.display = 'none';
        }
    });
});

</script>