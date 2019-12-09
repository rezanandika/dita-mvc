<div class="col-lg-12">
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
</div>


<div class="container-fluid">
    <div class="col-lg-12 mb-5">
        <div class="row">
            <div class="col-lg-2">
            <label class="col-form-label">Ubah Jadwal Berangkat : </label>
            </div>
            <div class="col-md-4 mb-2">
            <input class="form-control" type="date" name="jadwalberangkat" id="jadwalberangkat" maxlength="30" placeholder="Cari">
            </div>
            <div class="col-md-4">
            <button type="button" id="ubahjadwalberangkat" class="btn btn-warning" >Cari</button>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid" id="hasicaripesanan"></div>

<script>
$("#ubahjadwalberangkat").on('click', function(){
    var tanggal = $('#jadwalberangkat').val();
  $.get(
   "<?php echo base_url().'jadwal_berangkat/ubah_cari_jadwal_berangkat'; ?>",
   {id: tanggal},function(data){
     $("#hasicaripesanan").html(data);
   });
});
</script>



