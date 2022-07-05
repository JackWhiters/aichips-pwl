<aside class="main-sidebar">
    <!-- Brand Logo -->
    <a href="javascript:void(0)" class="brand-link text-center">
        <!-- <img src="<?= base_url('/images/auth/ai-chips-logo.png') ?>" class="img-fluid" alt=""> -->
        AI <span>CHIPS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- Sidebar Menu -->
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column text-sm " data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link">
                        <i class="fi fi-rr-home"></i>
                        <p> Dashboard </p>
                    </a>
                </li>

                <?php if (esc(get_user('id_role') == 1)) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('pelanggan') ?>" class="nav-link">
                            <i class="fi fi-rr-apps"></i>
                            <p> Meja </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('antrian') ?>" class="nav-link">
                            <i class="fi fi-rr-time-fast"></i>
                            <p> Antrian</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('menu') ?>" class="nav-link">
                            <i class="fi fi-rr-restaurant"></i>
                            <p>Menu</p>
                        </a>
                    </li>
                <?php endif ?>
                <li class="nav-header">Transaksi</li>

                <li class="nav-item">
                    <a href="<?= base_url('penjualan') ?>" class="nav-link">
                        <i class="fi fi-rr-shop"></i>
                        <p>Penjualan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('penjualan/invoice') ?>" class="nav-link">
                        <i class="fi fi-rr-comment-alt"></i>
                        <p>Invoice</p>
                    </a>
                </li>


                </li>
                <li class="nav-header">Administrator</li>
                <li class="nav-item">
                    <a href="<?= base_url('user/profile') ?>" class="nav-link">
                        <i class="fi fi-rr-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <?php if (esc(get_user('id_role') == 1)) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('user') ?>" class="nav-link">
                            <i class="fi fi-rr-users"></i>
                            <p>Pengguna</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('pengaturan') ?>" class="nav-link">
                            <i class="fi fi-rr-settings"></i>
                            <p>Pengaturan</p>
                        </a>
                    </li>
                <?php endif ?>
                <li class="nav-item">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-logout" class="nav-link">
                        <i class="fi fi-rr-sign-out"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>