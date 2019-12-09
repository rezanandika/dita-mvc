<div class="col-lg-12">

    <div class="row">
        <?php $no = 1; ?>
        <?php foreach($pemesananbaru as $p){ ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="p mb-0 text-gray-800">
                                <a><b>Kode :</b> <?php echo $p['id_pemesanan'];?></a>
                                <br>
                                <a><b>Tanggal Berangkat :</b>
                                    <?php echo date('d-m-Y', strtotime($p['tanggal_berangkat']));?></a>
                                <br>
                                <br>
                                <button type="button" class="btn btn-warning btn-block" data-toggle="modal"
                                    data-target="#modaldetail<?php echo $no;?>">Detail</button>

                                <form method="post" class="form-horizontal"
                                    action="<?php echo base_url('pemesanan/update_pemesanan_baru');?>">
                                    <div class="modal fade" id="modaldetail<?php echo $no;?>" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document" id="insmodal">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">

                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div style="width: 50%;">
                                                                    Nama
                                                                </div style="width: 50%;">
                                                                <div>
                                                                    <input type="hidden"
                                                                        class="form-control form-control-user" id="id"
                                                                        name="id"
                                                                        value="<?php echo $p['id_pemesanan'];?>">
                                                                    : <a><?php echo $p['nama_pemesan'];?></a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div style="width: 50%;">
                                                                    Telp
                                                                </div style="width: 50%;">
                                                                <div>
                                                                    : <a><?php echo $p['telp_pemesan'];?></a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div style="width: 50%;">
                                                                    Tanggal
                                                                </div style="width: 50%;">
                                                                <div>
                                                                    :
                                                                    <a><?php echo date('d-m-Y', strtotime($p['tanggal_berangkat']));?></a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div style="width: 50%;">
                                                                    Jumlah
                                                                </div style="width: 50%;">
                                                                <div>
                                                                    : <a><?php echo $p['jumlah_pemesanan'];?></a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div style="width: 50%;">
                                                                    Kota Asal
                                                                </div style="width: 50%;">
                                                                <div>
                                                                    : <a><?php echo $p['nama_kota_asal'];?></a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div style="width: 50%;">
                                                                    Kota Tujuan
                                                                </div style="width: 50%;">
                                                                <div>
                                                                    : <a><?php echo $p['nama_kota_tujuan'];?></a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div style="width: 50%;">
                                                                    Harga Total
                                                                </div style="width: 50%;">
                                                                <div>
                                                                    : <a><?php echo $p['total_harga'];?></a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <br>
                                                        <div class="form-group">
                                                            <select class="form-control animated--fade-in"
                                                                title="status" name="status">
                                                                <option class="dropdown-item" value=""> STATUS </option>

                                                                <option value="4">DITERIMA</option>
                                                                <option value="2">DIOLAK</option>

                                                            </select>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success">Proses</button>
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
                </div>

                <?php $no++;?>
                <?php } ?>

            </div>
        </div>