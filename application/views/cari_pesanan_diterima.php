<link href="<?php echo base_url();?>assets/vendor/toogle/css/bootstrap-toggle.min.css" rel="stylesheet">

<!-- <style>
#insmodal {

    top: 30%;
}
</style> -->

<?php if ($this->session->flashdata('success')){  ?>
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Berhasil!</strong> <?php echo $this->session->flashdata('success'); ?>
</div>
<?php } ?>

<?php if ($this->session->flashdata('error')){  ?>
<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Gagal!</strong> <?php echo $this->session->flashdata('error'); ?>
</div>
<?php } ?>

<form id="" method="post" action="<?php echo base_url('pemesanan/insert_jadwal');?>">

    <div class="col-lg-12">
           
                <div class="row">
                    <?php $no = 1; ?>
                    <?php foreach($caripemesananditerima as $key => $u){ ?>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">

                        <input type="hidden" class="form-control form-control-user" id="idpemesanan" name="idpemesanan[<?php echo $key; ?>]"value="<?php echo $u['id_pemesanan'];?>">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="p mb-0 text-gray-800">
                                            <a><b>Kode :</b> <?php echo $u['id_pemesanan'];?></a>
                                            <br>
                                            <input type="hidden" class="form-control form-control-user" id="namapemesan" name="namapemesan[<?php echo $key; ?>]" value="<?php echo $u['nama_pemesan'];?>">
                                            <a><b>Nama :</b> <?php echo $u['nama_pemesan'];?></a>
                                            <br>
                                            <a><b>Telp :</b> <?php echo $u['telp_pemesan'];?></a>
                                            <br>
                                            <input type="hidden" class="form-control form-control-user" id="tanggalberangkat" name="tanggalberangkat[<?php echo $key; ?>]" value="<?php echo $u['tanggal_berangkat'];?>">
                                            <a><b>Tanggal :</b> <?php echo date('d-m-Y', strtotime($u['tanggal_berangkat']));?></a>
                                            <br>
                                            <input type="hidden" class="form-control form-control-user" id="kotaasal" name="kotaasal[<?php echo $key; ?>]" value="<?php echo $u['id_kota_asal'];?>">
                                            <a><b>Kota Asal :</b> <?php echo $u['nama_kota_asal'];?></a>
                                            <br>
                                            <input type="hidden" class="form-control form-control-user" id="kotatujuan" name="kotatujuan[<?php echo $key; ?>]" value="<?php echo $u['id_kota_tujuan'];?>">
                                            <a><b>Kota Tujuan :</b> <?php echo $u['nama_kota_tujuan'];?></a>
                                            <br>
                                            <input type="hidden" class="form-control form-control-user" id="jumlahpemesanan" name="jumlahpemesanan[<?php echo $key; ?>]" value="<?php echo $u['jumlah_pemesanan'];?>">
                                            <a><b>Jumlah :</b> <?php echo $u['jumlah_pemesanan'];?></a>
                                            <br>
                                            <input type="hidden" class="form-control form-control-user" id="totalharga" name="totalharga[<?php echo $key; ?>]" value="<?php echo $u['total_harga'];?>">
                                            <a><b>Total Harga :</b> <?php echo $u['total_harga'];?></a>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            <div>

                                </div>
                                <?php if($u['status'] == 4 ){?>
                                <div class="row">
                                    <div class="col mr-2 mt-3 mb-0 align-items-center">
                                        <input type="checkbox" data-toggle="toggle" data-on="Dipilih" data-off=""
                                            data-onstyle="success" data-offstyle="danger" value="1" name="cek[<?php echo $key; ?>]">
                                    </div>
                                </div>
                                <?php }elseif($u['status'] == 1){?>
                                <hr>
                                <a><b>Pengemudi : </b> <?php echo $u['nama'];?></a>
                                <hr>

                                <div class="row">
                                    <div class="col mr-2 mt-3 mb-0 align-items-center">

                                        <button type="button" class="btn btn-warning btn-block" data-toggle="modal"
                                            data-target="#modaledit<?php echo $u['id_pemesanan'];?>">
                                            Edit
                                        </button>
                                    </div>

                                </div>
                                <?php }elseif($u['status'] == 3){?>
                                    <hr>
                                <a><b>Pengemudi : </b> <?php echo $u['nama'];?></a>
                                <hr>

                                <div class="row">
                                    <div class="col mr-2 mt-3 mb-0 align-items-center">
                                    <a href="#" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a>Selesai</a>
                                    </div>

                                </div>
                                <?php }?>

                                <div class="container">
                                <div class="row justify-content-center">
                                <form method="post" class="form-horizontal" action="<?php echo base_url('pemesanan/update_pemesanan_diterima')?>">
                                    <div class="modal fade" id="modaledit<?php echo $u['id_pemesanan'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document" id="insmodal">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Pemesanan Diterima</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="container">

                                            <div class="row">
                                                <div class="col-md-4">
                                                Nama :
                                                </div>
                                                <div class="col-md-6" style="float: left;">
                                                    <div class="form-group">
                                                    <input type="hidden" class="form-control form-control-user" id="updid" name="updid" value="<?php echo $u['id_pemesanan'];?>">
                                                    <input type="text" class="form-control form-control-user" id="updnamapemesan" name="updnamapemesan" value="<?php echo $u['nama_pemesan'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                Telp :
                                                </div>
                                                <div class="col-md-6" style="float: left;">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="updtelepon" name="updtelepon" value="<?php echo $u['telp_pemesan'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                Tanggal :
                                                </div>
                                                <div class="col-md-6" style="float: left;">
                                                    <div class="form-group">
                                                    <input class="form-control" type="date" name="updtanggalberangkat" id="updtanggalberangkat" maxlength="30" placeholder="" value="<?php echo $u['tanggal_berangkat'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                Kota Asal :
                                                </div>
                                                <div class="col-md-6" style="float: left;">
                                                    <div class="form-group">
                                                    <select class="form-control animated--fade-in" title="Kota Asal" name="updkotaasal">
                                                        <option class="dropdown-item" value = ""> Kota Asal </option>

                                                        <?php  foreach($kota_asal as $k){
                                                        $select=""; if(isset($u['id_kota_asal'])){
                                                        if($u['id_kota_asal'] == $k['id_kota_asal'])
                                                        $select="selected='selected'";} ?>

                                                        <option value="<?= $k['id_kota_asal'] ?>" <?php echo $select ?>><?php echo $k['nama_kota_asal'] ?></option>

                                                        <?php } ?>
                                                       
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                Kota Tujuan :
                                                </div>
                                                <div class="col-md-6" style="float: left;">
                                                    <div class="form-group">
                                                    <select class="form-control animated--fade-in" title="Kota Tujuan" name="updkotatujuan">
                                                        <option class="dropdown-item" value = ""> Kota Tujuan </option>
                                                        
                                                        <?php  foreach($kota_tujuan as $k){
                                                        $select=""; if(isset($u['id_kota_tujuan'])){
                                                        if($u['id_kota_tujuan'] == $k['id_kota_tujuan'])
                                                        $select="selected='selected'";} ?>

                                                        <option value="<?= $k['id_kota_tujuan'] ?>" <?php echo $select ?>><?php echo $k['nama_kota_tujuan'] ?></option>

                                                        <?php } ?>

                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                Jumlah :
                                                </div>
                                                <div class="col-md-6" style="float: left;">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="updjumlah" name="updjumlah" value="<?php echo $u['jumlah_pemesanan'];?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                Total Harga :
                                                </div>
                                                <div class="col-md-6" style="float: left;">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="updtotalharga" name="updtotalharga" value="<?php echo $u['total_harga'];?>">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-12 col mt-3 mb-3 align-items-center">
                                                <button type="submit" class="btn btn-success btn-block">Ubah</button>
                                                </div>
                                            </div>
                                            

                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <?php $no++;?>
                    <?php } ?>

                </div>
     
    </div>

    <div class="row mb-5">
        <div class="col-md-4">
            Pengemudi :
        </div>
        <div class="col-md-6" style="float: left;">

            <div class="form-group">
                <select class="form-control animated-fade-in" title="Pengemudi" name="pengemudi">
                    <option class="dropdown-item" value=""> Pilih Pengemudi </option>
                    <?php foreach($caripengemudi as $c){ ?>
                    <option value="<?php echo $c['id_user'];?>"><?php echo $c['nama'];?></option>
                    <?php }?>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-success btn-user btn-block" id="go">Submit </button>
            </div>

        </div>
    </div>

</form>

<script src="<?php echo base_url();?>assets/vendor/toogle/js/bootstrap-toggle.min.js"></script>