<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-light sidebar sidebar-light accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
    <div class="sidebar-brand-icon">
        <img src="assets/img/image/Logo.png" width="45" height="54.21" alt="...">
        <img class="sidebar-brand-text" src="assets/img/image/Teks.png" width="100" height="35" alt="...">
    </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0 mb-4">

@can('admin')
<!-- Nav Item - Dashboard -->
<li class="nav-item {{ ($title === "Dashboard") ? 'active' : '' }}">
    <a class="nav-link" href="/dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider my-0">
@endcan

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item {{ ($title === "Pesanan") ? 'active' : '' }}">
    <a class="nav-link" href="/pesanan">
        <i class="fas fa-clipboard-list"></i>
        <span>Pesanan</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

@can('admin')
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item {{ ($title === "Layanan") ? 'active' : '' }}">
    <a class="nav-link" href="/layanan">
        <i class="fas fa-database"></i>
        <span>Layanan</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">
@endcan

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item {{ ($title === "Riwayat Transaksi") ? 'active' : '' }}">
    <a class="nav-link" href="/riwayat_transaksi">
        <i class="fas fa-history"></i>
        <span>Riwayat Transaksi</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Charts -->
<li class="nav-item {{ ($title === "Laporan Keuangan" or $title === "Input Pengeluaran") ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-chart-bar"></i>
        <span>Kelola Keuangan</span></a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelola Keuangan:</h6>
            @can('admin')
            <a class="collapse-item" href="/laporan_keuangan">Laporan Keuangan</a>
            @endcan
            <a class="collapse-item" href="/input_pengeluaran">Input Pengeluaran</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

@can('admin')
<!-- Nav Item - Tables -->
<li class="nav-item {{ ($title === "Data Kasir") ? 'active' : '' }}">
    <a class="nav-link" href="/data_kasir">
        <i class="fas fa-cash-register"></i>
        <span>Data Kasir</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">
@endcan

<!-- Nav Item - Tables -->
<li class="nav-item {{ ($title === "Pengaturan") ? 'active' : '' }}">
    <a class="nav-link" href="/pengaturan">
        <i class="fas fa-cog"></i>
        <span>Pengaturan</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->