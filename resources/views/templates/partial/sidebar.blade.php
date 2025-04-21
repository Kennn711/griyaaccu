<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ Route('dashboard.index') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#data" aria-expanded="false" aria-controls="data">
                <span class="menu-title">Data Accu</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-lock menu-icon"></i>
            </a>
            <div class="collapse" id="data">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route('accu.index') }}">Accu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route('type.index') }}">Tipe Accu</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#transaction" aria-expanded="false" aria-controls="transaction">
                <span class="menu-title">Catatan Transaksi</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-lock menu-icon"></i>
            </a>
            <div class="collapse" id="transaction">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/blank-page.html">Penjualan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/login.html">Pembelian</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
