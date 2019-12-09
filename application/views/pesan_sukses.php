<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DITA JAYA TRAVEL</title>

  <link href="<?php echo base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/css/fonts-googleapis.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/sb-admin-2.min.css" rel="stylesheet">

<style>
  .notes{
    font-size: 12px;
    color: red;
  }

  body:before {
  content: "";
  position: fixed;
  z-index: -1;
  background-size:cover;
  background-position:center top;
  display: block;
  background-image: url('../assets/img/background1.jpg');
  width: 100%;
  height: 100%;
  filter: blur(3px) ;
  -webkit-filter: blur(3px) ;
}
</style>

</head>

<body>

  <div class="container">

    <div class="row justify-content-center">
     
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
                <div class="p-5">
                  <div class="text-center">
                  <h4 class="mb-4" style="color: #0bfc03;">Anda Berhasil Booking Tiket Online!</h4>
                    <h1 class="h4 text-gray-900 mb-4">Kode Booking : </h1>
                  
                  <h2><b><?php echo $cek;?></b></h2>
                  </div>
                 
                    <div class="col-lg-12">
                        <div class="col-sm-12 mt-5">
                            <div class="row">
                                <div class="col">
                                <a>Nama : </a>
                                </div>
                                <div>
                                <a> <?php echo $nama;?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col">
                                <a>Telepon : </a>
                                </div>
                                <div>
                                <a> +62<?php echo $telp;?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col">
                                <a>Tanggal Berangkat : </a>
                                </div>
                                <div class>
                                <a> <?php echo date('d-m-Y', strtotime($tanggal));?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col">
                                <a>Jumlah : </a>
                                </div>
                                <div>
                                <a> <?php echo $jumlah;?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col">
                                <a>Kota Asal : </a>
                                </div>
                                <div>
                                <?php foreach($kota_asal as $k){
                                    if($asal == $k['id_kota_asal']){ ?>
                                <a> <?php echo $k['nama_kota_asal'];?></a>
                                <?php }}?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col">
                                <a>Kota Tujuan : </a>
                                </div>
                                <div>
                                <?php foreach($kota_tujuan as $kt){
                                    if($tujuan == $kt['id_kota_tujuan']){ ?>
                                <a> <?php echo $kt['nama_kota_tujuan'];?></a>
                                <?php }}?>
                                </div>
                            </div>
                        </div>
                    </div>  

                    <div class="notes mt-5">
                        <p>*Harap simpan bukti booking anda. (bisa ScreenShot)</p>
                        <p>*Tunjukkan ke admin/driver saat penjemputan/pembayaran</p>
                    </div>

                    <a href="<?php echo base_url();?>" class="btn btn-primary btn-block" style=" border-radius: 25px;"> Selesai </a>

                </div>
            </div>

          </div>
        </div>

     

    </div>

  </div>

  <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>
