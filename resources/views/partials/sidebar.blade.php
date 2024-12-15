<div class="sidebar text-white p-3" style="background-color: rgb(78, 28, 16); box-shadow: 5px 0px 10px rgba(0, 0, 0, 0.2); border-right: 2px solid rgba(255, 255, 255, 0.2);">
    <h4 class="text-center">COFFEE SHOP</h4>
    <hr>
<ul class="nav flex-column">
    <!-- Dashboard for Admin -->
    <li class="nav-item">
        <a class="nav-link text-white admin-nav" style="display: none;" href="/admin/products">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
    </li>

    <!-- Promosi (Broadcast) for Admin -->
    <li class="nav-item">
        <a class="nav-link text-white admin-nav" style="display: none;" href="/admin/broadcast">
            <i class="fas fa-bullhorn"></i> Promosi
        </a>
    </li>


    <!-- Dashboard for User -->
    <li class="nav-item">
        <a class="nav-link text-white user-nav" style="display: none;" href="/user/dashboard">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white user-nav" style="display: none;" href="/user/product">
            <i class="fas fas fa-store"></i> Produk
        </a>
    </li>





</ul>

    <hr>
    <!-- User Info -->
    <div class="user-info d-flex justify-content-between align-items-center">
        <span id="nama-user">Kaleb</span>
        <button class="btn btn-secondary btn-sm" id="logout-btn">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </div>
</div>
