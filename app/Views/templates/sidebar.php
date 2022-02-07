<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
        <i class="fas fa-briefcase"></i>
        <div class="sidebar-brand-text mx-3">PT.PSI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>
    <?php if (in_groups('admin')) : ?>
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('admin'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('admin'); ?>" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Manajement</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu:</h6>
                    <a class="collapse-item" href="<?= base_url('admin/daftar_pegawai'); ?>">Daftar Karyawan</a>
                    <a class="collapse-item" href="<?= base_url('admin/mutasi_pegawai'); ?>">Mutasi Pegawai</a>
                    <a class="collapse-item" href="<?= base_url('admin/daftar_akun'); ?>">Daftar Akun</a>
                    <a class="collapse-item" href="<?= base_url('admin/histori_akun'); ?>">Histori Akun</a>
                </div>
            </div>
        </li>
    <?php endif; ?>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('user/index/' . user_id()); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span>
            <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
        </a>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('user/edit/' . user_id()); ?>">
            <i class="fas fa-fw fa-edit"></i>
            <span>Edit Profile</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('logout'); ?>" data-toggle="modal" data-target="#logoutModal">
            <i class="fa fa-sign-out-alt" aria-hidden="true"></i>
            <span>Logout</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>