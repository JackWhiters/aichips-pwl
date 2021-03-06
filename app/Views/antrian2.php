<?=$this->extend('layout/template');?>
<?=$this->section('content');?>

<div class="row"  id="daftar-antrian">

</div>
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pelanggan</h4><br>
                    <p class="card-description"> Meja yang memiliki pesanan belum dihidangkan.
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.Pesanan</th>
                                    <th>Meja</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Rincian</th>
                                </tr>
                            </thead>
                            <tbody id="tabelAntrian">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title ">Data Pelanggan Selesai</h4><br>
                    <p class="card-description">Pesanan pelanggan yang sudah dihidangkan hari ini.
                    </p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.Pesanan</th>
                                    <th>Meja</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Rincian</th>
                                </tr>
                            </thead>
                            <tbody id="tabelAntrianSelesai">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalRincian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Pesanan</h5>
            </div>
            <div class="modal-body p-0">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white">No.Pesanan</span>
                                </div>
                                <input type="text" id="id" class="form-control" disabled aria-label="Amount (to the nearest dollar)">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white">Nama</span>
                                </div>
                                <input type="text" id="nama" class="form-control" disabled aria-label="Amount (to the nearest dollar)">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white">No Meja</span>
                                </div>
                                <input type="number" id="noMeja" class="form-control" disabled aria-label="Amount (to the nearest dollar)">
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
                        </tr>
                    </thead>
                    <tbody id="tabelRincian">
                        <td colspan="5">Memuat data....</td>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white">Rp.</span>
                                </div>
                                <input type="number" id="totalHarga" class="form-control" disabled aria-label="Amount (to the nearest dollar)" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="idTransaksi">
                <input type="hidden" id="statusTransaksi">
                <button type="button" class="btn btn-secondary" onclick="tutupModalRincian()">Tutup</button>
                <button type="button" class="btn btn-warning" onclick="proses()" id="proses">Bayar</button>
            </div>
        </div>
    </div>
</div>


<script>
    tampilkanAntrian()
    tampilkanAntrianSelesai()

    function tampilkanAntrian() {
        var isiPesanan = ""
        var totalHarga = 0
        $.ajax({
            type: 'POST',
            url: '<?= base_url() ?>/antrian/dataAntrian',
            method: 'post',
            data: "idAntrian=" + id,
            dataType: 'json',
            success: function(data) {
                if (data.length) {
                    for (let i = 0; i < data.length; i++) {
                       
                        $('#daftar-antrian').append('<div class="card col-12 col-md-8 col-lg-4"><div class="card-head"><h5 class="order-id">Order#'+ data[i].id +'</h5><p class="">'+ data[i].nama +'</p></div><div class="card-body"><div class="product-list-order"><img src="assets/images/tahu.jpg" alt="" class="product-list-img"><div class="product-list-detail"><p class="product-list-name">'+ data[i].nama_item +'</p><p class="product-list-qty">'+ data[i].jumlah +'</p></div></div></div><hr><div class="product-list-order"><img src="assets/images/seblak1.jpg" alt="" class="product-list-img"><div class="product-list-detail"><p class="product-list-name">Seblak Ai Chips</p> <p class="product-list-taste">Level 3</p><div class="product-list-pq"><p class="product-list-price">14.000</p><p class="product-list-qty">Qty : 1</p></div></div></div><hr> <div class="product-list-order-bottom"> <p class="product-list-total">14.000</p><div class="btn-group-list-order"><button><i class="fa-solid fa-check" style="color: green"></i></button><button><i class="fa-solid fa-x" style="color: red"></i></button></div></div></div> </div>')

                        // $('#daftar-antrian').append('<div class="col-6 col-md-8 col-lg-4"><div class="card antrian mb-3"><div class="card-body"><div name="product-name-price"><span class="order-num mb-2"> Order#'+ data[i].id +'</span><h4 class="table-num float-sm-right">'+ data[i].noMeja +'</h4><h4 class="product-name mb-2">'+ data[i].nama +'</h4></div><label class="badge badge-danger mt-2">'+ data[i].status +'</label><div class="btn-group-ed"><button href="#" class="btn-secondary yellow" onClick="modalRincian(' + data[i].id + ', \"' + data[i].nama + '\" ,\"' + data[i].noMeja + '\"' + data[i].status + ')">Lihat Rincian <i class="mdi mdi-food-fork-drink"></i></button></div></div></div> </div>')

                        isiPesanan += "<tr><td>" + data[i].id + "</td><td>" + data[i].noMeja + "</td><td>" + data[i].nama + "</td><td>"

                         if (data[i].status == 0) {
                            isiPesanan += "<label class='badge badge-danger'>Belum Bayar"
                        } else {
                            isiPesanan += "<label class='badge badge-success'>Selesai"
                        }
                        isiPesanan += "</label></td><td><button href='#' class='btn btn-inverse-warning btn-sm' onClick='modalRincian(" + data[i].id + ", \"" + data[i].nama + "\", " + data[i].noMeja + "," + data[i].status + ")'><i class='mdi mdi-format-list-bulleted-type'></i><i class='mdi mdi-food-fork-drink'></i></button></td></tr>"
                    }
                } else {
                    isiPesanan = "<td colspan='4'>Antrian Masih Kosong :)</td>"
                }
                $("#tabelAntrian").html(isiPesanan)
            }
        });
    }

    function tampilkanAntrianSelesai() {
        var isiPesanan = ""
        $.ajax({
            type: 'POST',
            url: '<?= base_url() ?>/antrian/dataAntrianSelesai',
            dataType: 'json',
            success: function(data) {
                if (data.length) {
                    for (let i = 0; i < data.length; i++) {
                        isiPesanan += "<tr><td>" + data[i].id + "</td><td>" + data[i].noMeja + "</td><td>" + data[i].nama + "</td><td><label class='badge badge-success'>Selsai :)</label></td><td><button href='#' class='btn btn-inverse-success btn-sm' onClick='modalRincian(" + data[i].id + ", \"" + data[i].nama + "\", " + data[i].noMeja + "," + data[i].status + ")'><i class='mdi mdi-playlist-check'></i><i class='mdi mdi-food'></i></button></td></tr>"
                    }
                } else {
                    isiPesanan = "<td colspan='4' class='text-center'>Antrian Masih Kosong :)</td>"
                }
                $("#tabelAntrianSelesai").html(isiPesanan)
            }
        });
    }

    function modalRincian(id, nama, noMeja, status) {
        $("#id").val(id)
        $("#nama").val(nama)
        $("#noMeja").val(noMeja)
        $("#proses").show()

        tampilkanRincian(id)
        if (status == 0) {
            $("#proses").html("Bayar")
        } else if (status == 1) {
            $("#proses").html("Selesai")
        } else {
            $("#proses").hide()
        }

        $("#idTransaksi").val(id)
        $("#statusTransaksi").val(status)

        $("#modalRincian").modal("show")
    }

    function proses() {
        var id = $("#idTransaksi").val()
        var status = $("#statusTransaksi").val()

        $.ajax({
            url: '<?= base_url() ?>/antrian/proses',
            method: 'post',
            data: "idTransaksi=" + id + "&statusTransaksi=" + status,
            dataType: 'json',
            success: function(data) {
                tampilkanAntrian()
                tampilkanAntrianSelesai()
                tutupModalRincian()
            }
        });
    }

    function tampilkanRincian(id) {
        var isiPesanan = ""
        var totalHarga = 0
        $.ajax({
            url: '<?= base_url() ?>/antrian/rincianPesanan',
            method: 'post',
            data: "idAntrian=" + id,
            dataType: 'json',
            success: function(data) {
                if (data.length) {
                    for (let i = 0; i < data.length; i++) {
                        totalHarga += data[i].harga * data[i].jumlah
                        isiPesanan += "<tr><td>" + data[i].nama + "</td><td>" + data[i].jumlah + "</td><td>" + formatRupiah(data[i].harga.toString()) + "</td><td>" + formatRupiah((data[i].harga * data[i].jumlah).toString()) + "</td></tr>"
                    }
                } else {
                    isiPesanan = "<td colspan='4'>Antrian Masih Kosong :)</td>"
                }
                $("#tabelRincian").html(isiPesanan)
                $("#totalHarga").val(formatRupiah(totalHarga.toString()))

            }
        });
    }

    function tutupModalRincian() {
        $("#modalRincian").modal("hide")
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
<?php $this->endSection() ?>