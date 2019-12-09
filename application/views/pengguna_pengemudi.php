<style>

#insmodal {

  top: 30%;
}

</style>

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

<div class="col-lg-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-11">
                </div>
                <?php if($this->session->userdata('hak_akses') == 1){?>
                <div class="col-md-1">
                    <button type="button" class="btn btn-success btn-circle btn-md" data-toggle="modal" data-target="#modalinsert" style="float: right;">
                    <i class="fas fa-plus"></i>
                    </button>
                </div>
                <?php }?>
            </div>
        </div>
        <div class="card-body">

            <div class="row">
            <?php $no = 1; ?>
            <?php foreach($user as $u){ ?>
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="p mb-0 text-gray-800"><b>Username :</b> <?php echo $u['username'];?></div>
                      <div class="p mb-0 text-gray-800"><b>Password :</b> <?php echo $u['password'];?></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mr-2 mt-3 mb-0 align-items-center">

                    <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modaledit<?php echo $no;?>">
                           Edit
                    </button>
                    </div>
                    <div class="col mr-2 mt-3 mb-0 ">
                    <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modaldelete<?php echo $no;?>">
                           Hapus
                    </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <form method="post" class="form-horizontal" action="<?php echo base_url('pengguna/update_pengemudi')?>">
            <div class="modal fade" id="modaledit<?php echo $no;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" id="insmodal">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Pengemudi</h5>
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
                                <input type="hidden" class="form-control form-control-user" id="id" name="id" value="<?php echo $u['id_user'];?>">
                                <input type="text" class="form-control form-control-user" id="updnama" name="updnama" value="<?php echo $u['nama'];?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            Username :
                            </div>
                            <div class="col-md-6" style="float: left;">
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="updusername" name="updusername" value="<?php echo $u['username'];?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            Password :
                            </div>
                            <div class="col-md-6" style="float: left;">
                                <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="updpassword" name="updpassword" value="<?php echo $u['password'];?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Ubah</button>
                    </div>
                </div>
                </div>
            </div>
            </form>

            <div class="modal fade" id="modaldelete<?php echo $no;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pengemudi?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>
                    <div class="modal-body">Anda Yakin Akan Menghapus User : <?php echo $u['username'];?></div>
                    <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?php echo base_url(). 'pengguna/hapus_pengemudi/' .$u['id_user']; ?>">Hapus</a>
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

<form method="post" class="form-horizontal" action="<?php echo base_url('pengguna/insert_pengemudi')?>">
<div class="modal fade" id="modalinsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengemudi</h5>
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
                      <input type="text" class="form-control form-control-user" id="insnama" name="insnama">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                Username :
                </div>
                <div class="col-md-6" style="float: left;">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="insusername" name="insusername">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                Password :
                </div>
                <div class="col-md-6" style="float: left;">
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="inspassword" name="inspassword">
                    </div>
                </div>
            </div>
        </div>
        
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success" >Simpan</button>
        </div>
      </div>
    </div>
  </div>

  </form>

        

           