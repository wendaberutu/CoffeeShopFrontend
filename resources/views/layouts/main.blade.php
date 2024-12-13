<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>COFFEE SHOP</title>
        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <!-- Font Awesome -->
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            rel="stylesheet"
        />
        <!-- Custom CSS -->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <!-- DataTables CSS -->
        <link
            href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"
            rel="stylesheet"
        />
        <link
            href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css"
            rel="stylesheet"
        />
    </head>
    <body>
        <div class="d-flex h-100">
            <!-- Sidebar -->
            @include('partials.sidebar')

            <!-- Main Content -->
            <div class="main">
                <!-- Card Container -->
                <div class="content-card mt-4">
                    <h3 class="text-center">@yield('judul')</h3>
                    @yield('container')
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
                $("#barangTable").DataTable({
                    dom: "Bfrtip",
                    buttons: ["excel", "pdf", "print", "colvis"],
                });
            });
        </script>
        <script>
            // Fungsi untuk logout
            const logout = () => {
               // Hapus semua item dari localStorage
    localStorage.clear();
                // Redirect ke halaman login setelah logout berhasil
                window.location.href = "/login"; // Ganti dengan URL login Anda
            };

            // Tambahkan event listener untuk tombol logout
            document
                .getElementById("logout-btn")
                .addEventListener("click", logout);
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const userData = JSON.parse(localStorage.getItem("user"));
                const userRole = userData.role;
                console.log(userRole);
                document.querySelector("#nama-user").textContent =
                    userData.nama;

                if (userRole === "admin") {
                    document.querySelectorAll(".admin-nav").forEach((menu) => {
                        menu.style.display = "block"; // Tampilkan semua elemen dengan kelas .admin-nav
                    });
                    document.querySelectorAll(".user-nav").forEach((menu) => {
                        menu.style.display = "none"; // Tampilkan semua elemen dengan kelas .admin-nav
                    });
                    document.querySelector(".admin-nav").style.display =
                        "block";
                    document.querySelector(".user-nav").style.display = "none";
                } else if (userRole === "user") {
                    document.querySelectorAll(".admin-nav").forEach((menu) => {
                        menu.style.display = "none";
                    });
                    document.querySelectorAll(".user-nav").forEach((menu) => {
                        menu.style.display = "block";
                    });
                } else {
                    // Jika role tidak ditemukan atau belum login, sembunyikan keduanya
                    document.querySelector("#admin-nav").style.display = "none";
                    document.querySelector("#user-nav").style.display = "none";
                }
            });
        </script>
        @yield('scripttambahan')
    </body>
</html>
