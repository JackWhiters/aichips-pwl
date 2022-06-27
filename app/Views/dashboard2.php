<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AiChips </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('/vendors/feather/feather.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/vendors/mdi/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/vendors/ti-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/vendors/typicons/typicons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/vendors/simple-line-icons/css/simple-line-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/vendors/css/vendor.bundle.base.css') ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('/css/vertical-layout-light/style.css') ?>">
    <!-- endinject -->

    <link rel="stylesheet" href="<?= base_url() ?>\assets\fontawesome\css\all.min.css">
    
    <link rel="stylesheet" href="<?= base_url() ?>\assets\css\styles2.css">


    <link rel="shortcut icon" href="<?= base_url('/images/favicon.png') ?>" />
</head>

<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top d-flex align-items-top flex-row">
            <div class="container-fluid">
                <a class="navbar-brand " href="<?php echo base_url().'customer/index'?>"><img src="<?= base_url('uploads/profile/aichips_logos.png') ?>" alt="" class="navbar-img-logo">
                </a>
        
           <div class="d-flex align-items-top">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                         <button type="button" class="btn btn-social-icon-text btn-warning desktop" onclick="bukaModalKeranjang()"><i class="fa-solid fa-bag-shopping"></i>Keranjang<b id="jmlPesanan">(0)</b></button>
                    </li>
                    <li class="nav-item">
                         <button type="button" class="btn btn-social-icon-text btn-google desktop" onclick="bukaModalLogin()"><i class="mdi mdi-account-check"></i>Pegawai</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        <!-- partial -->
        <div class="container">
            <!-- partial -->
            <div class="heroes text-center">
                <h1 class="title-heroes">
                    Makan Enak, Makan Kenyang
                </h1>
                <p>Penuhi Kebutuhan perut anda hanya disini!</p>
            </div>


            <?php if ($snack) : ?>
                <div class="content-wrapper text-center">
                       
                        <div class="row g-3 product-menu">
                            <?php foreach ($snack as $snack) :
                                if ($snack["jenis"] == 2) : ?>
                                    <div class="col-6 col-md-4 col-lg-3 product">
                                        <div class="card mt-4 text-center mb-4">
                                            <div class="card-head">
                                                <img src="<?= base_url() ?>/images/menu/<?= $snack ["foto"] ?>" class="product-img img-fluid rounded-circle" <?php if ($snack["status"] == 0) {
                                                    echo 'style = "filter: grayscale(100%);-webkit-filter: grayscale(100%);"';  
                                                } ?> alt="...">
                                            </div>
                                           
                                            <div class="card-body text-center">
                                            <h5 class="product-name "><?= $snack["nama_item"] ?></h5>
                                            <hr>
                                                <div class="card-foot">
                                                    <h5 class="price"><span>Rp. </span><?= $snack ["harga"]?></h5>
                                                    <button class="btn-add mt-2" <?php if ($snack ["status"] == 0) {
                                                        echo "disabled";
                                                        } ?> onclick='tambahPesanan(<?= $snack ["id"] ?>, "<?= $snack ["nama_item"] ?>", <?= $snack ["harga"] ?> )'><?php if ($snack ["status"] == 0) {
                                                            echo "Habis";
                                                        } else {
                                                            echo "<i class='fa-solid fa-plus'></i>";
                                                        } ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                endif;
                            endforeach; ?>
                        </div>
                    </div>
                <?php endif;

                 if ($makanan) : ?>
                <div class="content-wrapper text-center">
                     
                        <div class="row g-3 product-menu">
                            <?php foreach ($makanan as $makanan) :
                                if ($makanan["jenis"] == 1) : ?>
                                    <div class="col-6 mt-4 col-md-4 col-lg-3 product">
                                        <div class="card mt-4 text-center mb-4">
                                            <div class="card-head">
                                                <img src="<?= base_url() ?>/images/menu/<?= $makanan ["foto"] ?>" class="product-img img-fluid rounded-circle" <?php if ($makanan["status"] == 0) {
                                                    echo 'style = "filter: grayscale(100%);-webkit-filter: grayscale(100%);"';  
                                                } ?> alt="...">
                                            </div>
                                           
                                            <div class="card-body text-center">
                                            <h5 class="product-name "><?= $makanan["nama_item"] ?></h5>
                                            <hr>
                                                <div class="card-foot">
                                                    <h5 class="price"><span>Rp. </span><?= $makanan ["harga"]?></h5>
                                                    <button class="btn-add mt-2" <?php if ($makanan ["status"] == 0) {
                                                        echo "disabled";
                                                        } ?> onclick='tambahPesanan(<?= $makanan ["id"] ?>, "<?= $makanan ["nama_item"] ?>", <?= $makanan ["harga"] ?> )'><?php if ($makanan ["status"] == 0) {
                                                            echo "Habis";
                                                        } else {
                                                            echo "<i class='fa-solid fa-plus'></i>";
                                                        } ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                endif;
                            endforeach; ?>
                        </div>
                    </div>
                <?php endif;?>

                <!-- Modal -->
                <div class="modal fade" id="modalKeranjang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pesanan</h5>
                            </div>
                            <div class="modal-body p-0 text-center">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-warning text-white">Nama</span>
                                                </div>
                                                <input type="text" id="nama" class="form-control" aria-label="Amount (to the nearest dollar)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-warning text-white">No Meja</span>
                                                </div>
                                                <input type="number" id="noMeja" class="form-control" aria-label="Amount (to the nearest dollar)">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <table class="table text-center bg-white" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jml</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabelPesanan">
                                        <td colspan="5">Data Kosong</td>
                                    </tbody>
                                </table>

                                <b id="peringatan" class="badge badge-danger">Silahkan isi nama dan no meja.</b><br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" onclick="tutupModalKeranjang()">Tutup</button>
                                <button type="button" class="btn btn-warning" onclick="prosesTransaksi()" id="simpanTransaksi">Pesan dan Bayar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modalSelesai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pesanan Berhasil.</h5>
                            </div>
                            <div class="modal-body">
                                Pesanan Berhasil dibuat. atas nama <b id="namaPemesan"></b> dengan lokasi meja <b id="lokasiMeja"></b>.
                                <br> <br> Mohon Menunggu sebentar kak. semoga anda dapat menikmati suasana rindu cafe ini. <br> <br>
                                <b>Terimakasih... :)</b><br><br>
                                <i>langsung dibayar ya.. </i>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" onclick="tutupModalSelesai()">Siap :)</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Login Pegawai.</h5>
                            </div>
                            <div class="modal-body">
                                <div id="errorLogin" class="mb-3"></div>
                                <div class="form-group">
                                    <div class="input-group">
                                          <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-danger text-white">Username</span>
                                        </div>
                                        <input type="text" id="username" name='username' class="form-control" aria-label="Amount (to the nearest dollar)">
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-danger text-white">Password</span>
                                        </div>
                                        <input type="password" id="password" name='password' class="form-control" aria-label="Amount (to the nearest dollar)">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" onclick="tutupModalLogin()">Batal</button>
                                <button type="submit" class="btn btn-danger" onclick="login()" id="login">Log in</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
                        
.
        <!-- Footer --> 
        <footer class="text-center">
                <h3 class="footer-title">Lorem Ipsum</h3>
                <p class="footer-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum incidunt placeat amet doloremque, distinctio eaque?
                </p>
                <div class="btn-group-footer">
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                </div>
                <hr>
                <p class="copyright">Copyright © 2021 - 2022 AiChips. All rights reserved.</p>
        </footer>

        <script src="<?php echo base_url() ?>   /js/jquery/jquery.min.js"></script>
        
        <script>
            var pesanan = [];
            var ditemukan = false
            var jmlPesanan = 0

            function bukaModalKeranjang() {
                tampilkanPesanan()
                $("#modalKeranjang").modal("show")
                $("#peringatan").hide()
            }

            function bukaModalLogin() {
                $("#modalLogin").modal("show")
            }

            function login() {
                username = $("#username").val()
                password = $("#password").val()

                if ($("#password").val() == "") {
                    $("#password").focus();
                } else {
                    $.ajax({
                        type: 'POST',
                        data: 'username=' + username + '&password=' + password,
                        url: '<?= base_url() ?>/auth/proses',
                        dataType: 'json',
                        success: function(respon) {
                            if (respon.sukses == true && respon.pesan == "Login berhasil!") {
                                window.location.href = "dashboard";
                            } else {
                                $("#errorLogin").html(respon.pesan)
                            }
                        }
                    });
                }
            }

            function prosesTransaksi() {
                var nama = $('#nama').val();
                var noMeja = $('#noMeja').val();
                if (nama == "") {
                    $("#nama").focus()
                    $("#peringatan").show()
                } else if (noMeja == "") {
                    $("#noMeja").focus()
                    $("#peringatan").show()
                } else {
                    $("#simpanTransaksi").html('<i class="mdi mdi-reload fa-pulse"></i> Memproses..')
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url() ?>/dashboard2/tambahPesanan',
                        data: {
                            'pesanan': pesanan,
                            'nama': nama,
                            'noMeja': noMeja
                        },
                        dataType: 'json',
                        success: function(data) {
                            $("#modalKeranjang").modal("hide")
                            pesanan = [];
                            $('#nama').val("");
                            $('#noMeja').val("");
                            tampilkanPesanan();

                            $("#simpanTransaksi").html('Pesan dan Bayar')
                            $("#namaPemesan").html(nama)
                            $("#lokasiMeja").html(noMeja)
                            $("#modalSelesai").modal("show")
                        }
                    });
                }
            }

            function tutupModalKeranjang() {
                $("#modalKeranjang").modal("hide")
            }

            function tutupModalSelesai() {
                $("#modalSelesai").modal("hide")
            }

            function tutupModalLogin() {
                $("#modalLogin").modal("hide")
            }

            function tambahPesanan(id, nama, harga) {
                ditemukan = false
                jmlPesanan = 0
                for (let i = 0; i < pesanan.length; i++) {
                    if (pesanan[i][0] == id) {
                        pesanan[i][2] += 1
                        ditemukan = true
                    }
                    jmlPesanan += pesanan[i][2]
                }
                if (ditemukan == false) {
                    pesanan.push([id, nama, 1, harga])
                    jmlPesanan += 1
                }

                $("#jmlPesanan").html("(" + jmlPesanan + ")")
            }

            function tampilkanPesanan() {
                var isiPesanan = ""

                for (let i = 0; i < pesanan.length; i++) {
                    isiPesanan += "<tr><td>" + pesanan[i][1] + "</td><td>" + pesanan[i][2] + "</td><td>" + formatRupiah(pesanan[i][3].toString()) + "</td><td>" + formatRupiah((pesanan[i][2] * pesanan[i][3]).toString()) + "</td><td><button href='#' class='badge badge-danger' onClick='hapusPesanan(" + i + ")'>x</button></td></tr>"
                }
                if (pesanan.length < 1) {
                    $("#simpanTransaksi").prop("disabled", true)
                    isiPesanan = "<td colspan='5'>Pesanan Masih Kosong :)</td>"
                } else {
                    $("#simpanTransaksi").prop("disabled", false)
                }

                $("#tabelPesanan").html(isiPesanan)
            }

            function hapusPesanan(id) {
                pesanan.splice(id, 1)
                tampilkanPesanan()
            }

            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
        </script>

        <script src="<?= base_url('/vendors/js/vendor.bundle.base.js') ?>"></script>
        <script src="<?= base_url('/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
        <script src="<?= base_url('/js/off-canvas.js') ?>"></script>
        <script src="<?= base_url('/js/hoverable-collapse.js') ?>"></script>
        <script src="<?= base_url('/js/template.js') ?>"></script>
        <script src="<?= base_url('/js/settings.js') ?>"></script>
        <script src="<?= base_url('/js/todolist.js') ?>"></script>
        <!-- endinject -->
</body>

</html>
