<?php

$server = "localhost" ;
$username = "root" ;
$password = "" ;
$database = "kpu";

//Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die ("Koneksi database gagal");
mysql_select_db($database) or die ("Database tidak tersedia");



    $id = $_GET['id'];
    $data = mysql_query("SELECT * FROM post WHERE id='$id'");

    while($row=  mysql_fetch_array($data)){
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h4 class="modal-title" id="myModalLabel">Edit Dokter</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="../admin_kpu/post_update.php" name="modal-popup" enctype="multipart/form-data" method="POST" id="form-edit">
                <div class="form-group">
                                <label class="col-lg-3 control-label">ID Dokter</label>
                                    <div class="col-lg-5">
                                        <input style="width: 210px;"  class="form-control" type="text" name="id" value="<?php echo $row['id']; ?>" readonly/>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Judul</label>
                                    <div class="col-lg-5">
                                        <input style="width: 210px;"  class="form-control" type="text" name="judul" value="<?php echo $row['judul']; ?>"/>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Konten</label>
                                    <div class="col-lg-5">
                                    <textarea style="width: 210px;"  class="form-control" type="text" name="konten" value="" rows= "5" readonly><?php echo $row['konten']; ?> </textarea>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Kategori</label>
                                  <div class="col-lg-5">
                                <select class="form-control" name="kategori" style="width:210px;">
                                  <option value="selected">--Pilih Kategori--</option>
                                  <option>Spesialis Bedah</option>
                                  <option>Spesiali Penyakit Dalam </option>
                                  <option>Spesialis Kejiwaan</option>
                                  <option>Spesialis Jantung</option>
                                  <option>Spesialis Anak</option>
                                </select>
                                </select>
                              </DIV>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Link</label>
                                    <div class="col-lg-5">
                                        <input style="width: 210px;"  class="form-control" type="text" name="url" value="<?php echo $row['url']; ?>"/>
                                    </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Selesai</button>
                                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
                            </div>
            </form>
            <?
                }
                ?>
        </div>
    </div>
</div>

<!--- Script EDIT PASIEN-->
<script type="text/javascript">
    $(document).ready(function() {
                $('#form-edit')
                    .bootstrapValidator({
                        message: 'This value is not valid',
                        feedbackIcons: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            nama: {
                                message: 'The username is not valid',
                                validators: {
                                    notEmpty: {
                                        message: 'Tidak boleh kosong'
                                    },
                                    stringLength: {
                                        min: 5,
                                        max: 30,
                                        message: 'Panjang minimal 5 karakter dan panjang maksismu 30 karakter'
                                    }
                                }
                            },
                            jumlah: {
                                message: 'The username is not valid',
                                validators: {
                                    notEmpty: {
                                        message: 'Tidak boleh kosong'
                                    },
                                    digits: {
                                        message: 'tidak boleh kosong'
                                    }
                                }
                            }
                        }
                    });
                });
</script>
<!--- Script EDIT PASIEN END-->
