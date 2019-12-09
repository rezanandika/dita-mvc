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
    <div class="col-lg-12 mb-2">
        <div class="row">
            <div class="col-lg-2">
            <label class="col-form-label">Cari Jadwal Berangkat : </label>
            </div>
            <div class="col-md-4 mb-2">
            <input class="form-control" type="date" name="jadwalberangkat" id="jadwalberangkat" maxlength="30" placeholder="Cari">
            </div>
           
        </div>
    </div>
    <div class="col-lg-12 mb-2">
        <div class="row">
            <?php if($this->session->userdata('hak_akses') == 2){?>
            <input type="hidden" class="form-control" name="bypengemudi" id="bypengemudi" value="<?php echo $this->session->userdata('id_user');?>">
            <?php }else{?>
            <div class="col-lg-2">
            <label class="col-form-label">Pilih Pengemudi : </label>
            </div>
            <div class="col-md-4 mb-2">
            <div class="form-group">
                <select class="form-control animated-fade-in" title="Pengemudi" name="pengemudiall" id="pengemudiall">
                    <option class="dropdown-item" value=""> Pilih Pengemudi </option>
                    <?php foreach($caripengemudi as $c){ ?>
                    <option value="<?php echo $c['id_user'];?>"><?php echo $c['nama'];?></option>
                    <?php }?>
                </select>
            </div>
            </div>
            <?php }?>
        </div>
    </div>
    <div class="col-lg-12 mb-5">
        <div class="row">
            <div class="col-lg-2">
            
            </div>
            <div class="col-md-4 mb-2">
            <button type="button" id="carijadwalberangkat" class="btn btn-warning" >Cari</button>
            </div>
           
        </div>
    </div>

</div>


<div class="container-fluid" id="hasicaripesanan"></div>

<script>
$("#carijadwalberangkat").on('click', function(){
    var tanggal = $('#jadwalberangkat').val();
    var pengemudi = $('#bypengemudi').val();
    var pengemudiall = $('#pengemudiall').val();
  $.get(
   "<?php echo base_url().'pengemudi/cari_jadwal_berangkat'; ?>",
   {id: tanggal, idx: pengemudi, idxall: pengemudiall},function(data){
     $("#hasicaripesanan").html(data);
   });
});
</script>