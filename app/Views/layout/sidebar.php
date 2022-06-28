<aside class="main-sidebar">
    <!-- Brand Logo -->
    <a href="javascript:void(0)" class="brand-link text-center">
    <img src="<?= base_url('uploads/profile/aichips_logos.png') ?>" alt="" class="sidebar-img-logo">
        
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-10">
            <ul class="nav nav-pills nav-sidebar flex-column text-sm " data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link">
                     <i class="fa-solid fa-gauge"></i>
                        <p> Dashboard </p>
                    </a>
                </li>

                <?php if (esc(get_user('id_role') == 1)) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('pelanggan') ?>" class="nav-link">
                        <i class="fa-solid fa-table"></i>
                            <p> Meja </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('antrian') ?>" class="nav-link">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                            <p> Antrian</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('menu') ?>" class="nav-link">
                        <i class="fa-solid fa-utensils"></i>
                            <p>Produk</p>
                        </a>
                    </li>
                <?php endif ?>

                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="fa-solid fa-arrow-down-wide-short"></i>
                        <p> Transaksi <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('penjualan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penjualan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('penjualan/invoice') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Invoice</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-header">Administrator</li>
                <li class="nav-item">
                    <a href="<?= base_url('user/profile') ?>" class="nav-link">
                        <i class="fa-solid fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <?php if (esc(get_user('id_role') == 1)) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('user') ?>" class="nav-link">
                        <i class="fa-solid fa-users"></i>
                            <p>Pengguna</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('pengaturan') ?>" class="nav-link">
                        <i class="fa-solid fa-gear"></i>
                            <p>Pengaturan</p>
                        </a>
                    </li>
                <?php endif ?>
                <li class="nav-item">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>