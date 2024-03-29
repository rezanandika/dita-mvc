<link href="<?php echo base_url();?>assets/vendor/toogle/css/bootstrap-toggle.min.css" rel="stylesheet">

<style>
#insmodal {

    top: 30%;
}
</style>

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

<form id="" method="post" action="<?php echo base_url('pengemudi/update_jadwal');?>">

    <div class="col-lg-12">
        <div class="mb-4">
            <div class="card-header py-3">
                <div class="row">

                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php $no = 1; ?>
                    <?php foreach($carijadwalberangkat as $c){ ?>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">

                            <div class="card-body">
                                <div style="text-align: center;">
                                    <input type="hidden" class="form-control form-control-user" id="kodejadwal"
                                        name="kodejadwal[<?php echo $c['kode_jadwal']; ?>]"
                                        value="<?php echo $c['kode_jadwal'];?>">
                                    <a>Kode Jadwal : <?php echo $c['kode_jadwal'];?></a>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="p mb-0 text-gray-800">
                                            <!-- <input type="hidden" class="form-control form-control-user" id="idjadwal" name="idjadwal[<?php echo $key; ?>]" value="<?php echo $c['id_jadwal'];?>"> -->
                                            <br>
                                            <a><b>Nama: </b></a>
                                            <br>
                                            <?php foreach($caribypengemudi as $u){
                                                if($c['kode_jadwal'] == $u['kode_jadwal']){?>
                                            <input type="hidden" class="form-control form-control-user" id="idpemesanan"
                                                name="idpemesanan[<?php echo $u['id_pemesanan']; ?>]"
                                                value="<?php echo $u['id_pemesanan'];?>">
                                            <a>- <?php echo $u['nama_pemesan'];?></a>
                                            
                                            <a href="https://api.whatsapp.com/send?phone=<?php echo $u['telp_pemesan'];?>" style="float: right;"><i class="fab fa-whatsapp"></i></a>
                                            <br>
                                            <?php } }?>
                                            <hr>
                                            <a style="text-align: right;"><b>Penumpang :</b>
                                                <?php echo $c['jumlah_pemesanan'];?></a>
                                            <hr>
                                            <a><b>Pengemudi :</b> <?php echo $c['nama'];?></a>
                                            <hr>
                                            <div class="row">
                                                <div class="col-lg-12 col mt-3 mb-3 align-items-center">
                                                    <button type="submit"
                                                        class="btn btn-success btn-block">Lengkap</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <?php $no++;?>
                    <?php } ?>

                </div>


            </div>
        </div>
    </div>

</form>
<script src="<?php echo base_url();?>assets/vendor/toogle/js/bootstrap-toggle.min.js"></script>