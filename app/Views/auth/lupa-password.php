<?= $this->extend('auth/auth_template'); ?>
<?= $this->section('auth'); ?>

<div class="container-fluid">
        <div class="row login"> 
            <div class="col-lg-7 login-container">
                <div class="head-title py-4 text-center">
                    <img src="<?= base_url('/images/auth/ai-chips-logo.png') ?>" class="img-fluid" alt="">
                    <h2 class="mt-4"><?= esc($title); ?></h2>
                    <p>Silahkan masukkan email yang terdaftar untuk mengubah password.</p>
                </div>
                <?= form_open(); ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <small class="invalid-feedback"></small>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn-login btn-block" id="lupa">Kirim Link</button>
                    </div>
                    <!-- /.col -->
                </div>
                <?= form_close(); ?>
                <hr>
            <a href="<?= base_url('auth') ?>" class="btn-login-secondary btn-block text-center">Login</a>

            </div>
            <div class="col-lg-5 image-container">
                <img src="<?= base_url('/images/auth/store.png') ?>" class="img-fluid" alt="">
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>