<?= $this->extend('layout/template'); ?>
<h1><?= $this->section('content'); ?></h1>

<div class="container-fluid">
    <button class="btn mb-1 tambah" onclick="tryTambah()"><i class="fas fa-plus"></i> Tambah Menu</button>

    <div class="col">
       
            <div class="row" id="daftar-menu">
        
            
            </div>
        
    </div>
            <div class="col-12">
            
            </div>
        </div>


<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Menu</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white">Barcode</span>
                            </div>
                            <input type="text" id="barcode" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white">Nama</span>
                            </div>
                            <input type="text" id="nama" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white">Harga</span>
                            </div>
                            <input type="number" id="harga" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white">Stok</span>
                            </div>
                            <input type="number" id="stok" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="input-group">
                            <select name="jenis" id="jenis" class="form-control">
                                <option value="1">Makanan</option>
                                <option value="2">Snack</option>
                                <option value="3">Minuman Dingin</option>
                                <option value="4">Minuman Panas</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="tambah()" class="btn btn-info">Tambah</button>
                <button type="button" class="btn btn-secondary" onclick="tutupTambah()">Batal</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus User</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" value="" id="idHapus" name="idHapus">
                <p>Apakah anda yakin ingin menghapus <b id="detailHapus">....</b> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="hapus()" class="btn btn-info">Hapus</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="tutupHapus()">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUpload" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Foto <b id="namaUploadFoto"></b></h5>
            </div>
            <div class="modal-body text-center">
                <form enctype="multipart/form-data">
                    <input type="hidden" value="" id="idUploadFoto" name="idUpload">
                    <img src="" id="fotoMenu" style="width:50%">
                    <br>
                    <br>
                    <div class='alert alert-danger mt-2 d-none' id="err_file"></div>
                    <div class="alert displaynone" id="responseMsg"></div>
                    <input type="file" id="uploadFotoMenu" class="form-control" name="uploadFotomenu" value="Pilih foto" accept="image/*" onchange="ubahFoto(event)">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="upload()" class="btn btn-info">Upload</button>
                <button type="button" class="btn btn-secondary" onclick="tutupUpload()">Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
    muatData()

    function muatData() {
        $.ajax({
            url: '<?= base_url() ?>/menu/muatData',
            method: 'post',
            dataType: 'json',
            success: function(data) {
                var tabel = ''
                for (let i = data.length - 1; i > -1; i--) {
                    $('#daftar-menu').append('<div class="col-6 col-md-8 col-lg-4"><div class="card products"><div class="card-head text-center"><img src="images/menu/'+ data[i].foto +'" alt="Image" class="product-img img-fluid"></div><div class="card-body"><div name="product-name-price"><h4 class="product-name">'+ data[i].nama_item +'</h4><h5 class="product-qty float-sm-right">Stok : '+ data[i].stok +'</h5><h4 class="product-price"> <span>Rp.</span>'+ data[i].harga +'</45></div><div class="btn-group-ed"><a href="#" class="btn-secondary yellow" onClick="tryUpload(' + data[i].id + ', \"' + data[i].nama_item + '\" ,\"' + data[i].foto + '\")"><i class="fa-solid fa-pen-to-square"></i>Edit</a> <a href="" class="btn-secondary red"> <i class="fa-solid fa-trash-can"></i> Delete</a></div></div></div> </div>')


                    tabel += '<div class="col-6 col-md-8 col-lg-4"><div class="card products"><div class="card-head text-center"><img src="images/menu/'
                    + data[i].foto +'" alt="Image" class="product-img img-fluid"></div><div class="card-body"><div name="product-name-price"><h4 class="product-name">'
                    + data[i].nama_item +'</h4><p>'+ data[i].barcode + '</p><h5 class="product-qty float-sm-right">Stok : '
                    + data[i].stok +'</h5><h4 class="product-price"> <span>Rp.</span>'
                    + data[i].harga +''
              
                    tabel += "</div><div class='btn-group-ed'><a href='#' class='btn-secondary yellow' onClick='tryUpload(" + data[i].id + ", \"" + data[i].nama_item + "\" ,\"" + data[i].foto + "\")'>Edit<i class='mdi mdi-upload'></i></a><a href='#' class='btn-secondary red' id='hapus" + data[i].id + "' onclick='tryHapus(" + data[i].id + ", \"" + data[i].nama_item + "\")' ><i class='mdi mdi-delete'></i > </a></div></div></div> </div>"

                }
                if (!tabel) {
                    tabel = '<td class="text-center" colspan="2">Data Masih kosong :)</td>'
                }
                $("#daftar-menu").html(tabel)
            }
        });
    }

    function tryTambah() {
        $("#modalTambah").modal('show')
    }

    function tutupTambah() {
        $("#modalTambah").modal('hide')
    }

    function tambah() {
        if ($("#nama").val() == "") {
            $("#nama").focus();
        } else if ($("#harga").val() == "") {
            $("#harga").focus();
        } else if ($("#barcode").val() == "") {
            $("#barcode").focus();
        } else if ($("#stok").val() == "") {
            $("#stok").focus();
        } else {
            $.ajax({
                type: 'POST',
                data: 'nama_item=' + $("#nama").val() + '&barcode=' + $("#barcode").val() + '&stok=' + $("#stok").val() + '&harga=' + $("#harga").val() + '&jenis=' + $("#jenis").val(),
                url: '<?= base_url() ?>/menu/tambah',
                dataType: 'json',
                success: function(data) {
                    $("#barcode").val("");
                    $("#nama").val("");
                    $("#harga").val("");
                    $("#stok").val("");
                    $("#jenis").val("1");
                    muatData();
                    tutupTambah()
                }
            });
        }
    }

    function tryHapus(id, nama) {
        $("#idHapus").val(id)
        $("#detailHapus").html(nama + " (" + id + ") ")
        $("#modalHapus").modal('show')
    }

    function hapus() {
        $("#hapus").html('<i class="fa fa-spinner fa-pulse"></i> Memproses..')
        var id = $("#idHapus").val()
        $.ajax({
            url: '<?= base_url() ?>/menu/hapus',
            method: 'post',
            data: "id=" + id,
            dataType: 'json',
            success: function(data) {
                $("#idHapus").val("")
                $("#detailHapus").html("")
                $("#modalHapus").modal('hide')
                $("#hapus").html('Hapus')
                muatData()
            }
        });
    }

    function tutupHapus() {
        $("#modalHapus").modal("hide")
    }

    function ubahStatus(id) {
        $.ajax({
            url: '<?= base_url() ?>/menu/ubahStatus',
            method: 'post',
            data: "id=" + id + "&status=" + $("#status" + id).val(),
            dataType: 'json',
            success: function(data) {}
        });
    }


    function tryUpload(id, nama_item, foto) {
        $("#idUploadFoto").val(id)
        $.ajax({
            url: '<?= base_url() ?>/menu/getMenu',
            method: 'post',
            data: "id=" + id,
            dataType: 'json',
            success: function(data) {
                $("#fotoMenu").attr('src', '<?= base_url() . "/images/menu/" ?>' + data.foto + "?=" + new Date().getTime())
                $("#namaUploadFoto").html(data.nama_item)
                $("#modalUpload").modal("show")
            }
        });
    }

    function upload() {
        var files = $('#uploadFotoMenu')[0].files;

        if (files.length > 0) {
            var fd = new FormData();
            fd.append('file', files[0]);
            fd.append('namaMenu', $("#namaUploadFoto").html());
            fd.append('idMenu', $("#idUploadFoto").val());

            $('#responseMsg').hide();

            $.ajax({
                url: '<?= base_url() ?>/menu/upload',
                method: 'post',
                data: fd,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    $('#err_file').removeClass('d-block');
                    $('#err_file').addClass('d-none');

                    if (response.success == 1) {
                        $('#responseMsg').removeClass("alert-danger");
                        $('#responseMsg').addClass("alert-success");
                        $('#responseMsg').html(response.message);
                        $('#responseMsg').show();

                        $('#responseMsg').hide();
                        $('#uploadFotoMenu').val("")

                        tutupUpload()
                    } else if (response.success == 2) {
                        $('#responseMsg').removeClass("alert-success");
                        $('#responseMsg').addClass("alert-danger");
                        $('#responseMsg').html(response.message);
                        $('#responseMsg').show();
                    } else {
                        $('#err_file').text(response.message);
                        $('#err_file').removeClass('d-none');
                        $('#err_file').addClass('d-block');
                    }
                },
                error: function(response) {
                    console.log("error : " + JSON.stringify(response));
                }
            });
        } else {
            $('#responseMsg').removeClass("alert-success");
            $('#responseMsg').addClass("alert-danger");
            $('#responseMsg').html("Pilih foto dulu ya.");
            $('#responseMsg').show();
        }
    }

    function tutupUpload() {
        $("#modalUpload").modal("hide")
    }

    function ubahFoto(event) {
        $("#fotoMenu").attr("src", URL.createObjectURL(event.target.files[0]))
    }
</script>
<?php $this->endSection() ?>