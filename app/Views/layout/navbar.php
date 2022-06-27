<nav class="main-header navbar navbar-expand">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <form class="d-flex">
                <input class="form-control me-2 search" type="search" placeholder="Search" aria-label="Search"> 
            </form>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link notif" data-toggle="dropdown" href="javascript:void(0)">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">2</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">Infomasi Stok Produk</span>
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0)" class="dropdown-item text-sm">
                    <i class="fas fa-cube mr-2"></i>
                    <span>Minyak Goreng</span>
                    <span class="float-right">Sisa 2 kg</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('item') ?>" class="dropdown-item dropdown-footer">Lihat Semua</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">
                <div class="image">
                    <img src="<?= base_url('uploads/profile/' . esc(get_user('avatar'))) ?>" class="img-circle avatar h-10">
                    <i class="fa-solid fa-caret-down"></i>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="info">
                    <span class="dropdown-header">Masuk sebagai</span>
                    <a href="javascript:void(0)" class="px-3"><?= esc(get_user('nama')); ?></a>
                </div>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('user/profile') ?>" class="dropdown-item text-sm">Lihat Profile</a>
                
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-logout" class="dropdown-item dropdown-footer text-sm">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Keluar</span>
                </a>
            </div>
        </li>
        
    </ul>
</nav>