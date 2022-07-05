
<?= $this->extend('auth/auth_template'); ?>
<?= $this->section('auth'); ?>

    <div class="container-fluid">
        <div class="row login"> 
            <div class="col-lg-7 login-container">
                <div class="head-title py-4 text-center">
                    <a href="<?= base_url('') ?>" class="brand-link text-center">
                        <img src="<?= base_url('/images/auth/ai-chips-logo.png') ?>" class="img-fluid" alt="">
                    </a>
                    <h2 class="mt-4">Hello Again!</h2>
                    <p>Jika sudah punya akun, login dengan mudah</p>
                </div>
                <?= form_open(base_url('auth/login')); ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <small class="invalid-feedback"></small>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                    <div class="input-group-append show-password">
                        <div class="input-group-text">
                            <span class="fas fa-eye-slash"></span>
                        </div>
                    </div>
                    <small class="invalid-feedback"></small>
                </div>
                <div class="row py-4">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4 text-right">
                        <a href="<?= base_url('auth/lupa-password') ?>">Lupa Password</a>
                    </div>
                    <!-- /.col -->
                </div>
                <button type="submit" class="btn-login btn-block" id="login">Login</i></button>
                <?= form_close(); ?>
                <hr>

            </div>
            <div class="col-lg-5 image-container">
                <img src="<?= base_url('/images/auth/store.png') ?>" class="img-fluid" alt="">
            </div>
        </div>
    </div>


<?= $this->endSection(); ?>