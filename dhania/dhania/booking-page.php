<?php

    ob_start();
    session_start();

include 'assets/function/koneksi.php'; 

if(!isset($_SESSION['id_pelanggan'])){
    die("<b>Oops!</b> Access Failed.
        <p>Sistem Logout. Anda harus melakukan Login kembali.</p>
        <button type='button' onclick=location.href='./'>Back</button>");
}

    $produk = mysqli_query($conn, "SELECT * FROM tb_booking LEFT JOIN tb_kelas USING (kelas_id) WHERE id_pelanggan='$_SESSION[id_pelanggan]' ");
  $data = mysqli_fetch_object($produk)
  



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>

<!-- navbar start -->
<nav class="navbar navbar-expand-md fixed-top scrolling-navbar navbar-light bg-white">
    <div class="container" style="font-size:18px;">
      <a class="navbar-brand" href="index.php" style="font-size:35px;">yoga Juwita</a>
      <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="daftar-booking.php">My Booking</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<!-- navbar end -->

<!-- isi booking start -->
<div class="img-booking">
<div class="container border border-light-3 booking-page shadow-lg  bg-body">
  <h2>SELAMAT DATANG, <span class="text-uppercase" style="font-weight: 200; font-size:30px; "><?php echo $data->nama_pelanggan ?></span></h2>
    <div class="row">
      <div class="col-md-4 mt-3">
        <p class="h5 m-3">Nama</p>
      </div>
      <div class="col-md-6 mt-3">
        <p class="m-3 text-uppercase font-weight-bold m-3"> :&nbsp;<?php echo $data->nama_pelanggan ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 mt-3">
        <p class="h5 m-3">Tempat / Tanggal Lahir</p>
      </div>
      <div class="col-md-6 mt-3">
        <p class="m-3"> :&nbsp;<?php echo $data->tempat_pelanggan ?>,&nbsp;<?php echo $data->tl_pelanggan ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 mt-3">
        <p class="h5 m-3">Jenis Kelamin</p>
      </div>
      <div class="col-md-6 mt-3">
        <p class="m-3"> :&nbsp;<?php echo $data->jk_pelanggan == 1? 'Laki-Laki':'Perempuan';  ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 mt-3">
        <p class="h5 m-3">No telepon</p>
      </div>
      <div class="col-md-6 mt-3">
        <p class="m-3"> :&nbsp;<?php $telepon = $data->id_pelanggan;  $depan = substr($telepon,0,4); $tengah = substr($telepon,4,4); $belakang = substr($telepon,8,6);?><?php echo $depan?>-<?php echo $tengah?>-<?php echo $belakang?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 mt-3">
        <p class="h5 m-3">Kelas Yang Di Pilih</p>
      </div>
      <div class="col-md-6 mt-3">
        <p class="m-3 text-uppercase font-weight-bold m-3"> :&nbsp; <?php echo $data->kelas_nama ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 mt-3">
        <p class="h5 m-3">Tanggal Booking</p>
      </div>
      <div class="col-md-6 mt-3">
        <p class="m-3 text-uppercase font-weight-bold m-3"> :&nbsp; <?php echo $data->tgl_booking ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 mt-3">
        <p class="h5 m-3">Harga</p>
      </div>
      <div class="col-md-6 mt-3">
        <p class="m-3 text-uppercase font-weight-bold m-3"> :&nbsp;Rp&nbsp;<?php echo number_format($data->kelas_harga) ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 mt-3">
        <p class="h5 m-3">Yang di Bayar</p>
      </div>
      <div class="col-md-3 mt-3">
        <p class="m-3 text-uppercase font-weight-bold m-3"> :&nbsp; <?php echo ($data->pembayaran_pelanggan) == 1? 'full' : '' ;  ?> </p>
        <p class="m-3 text-uppercase font-weight-bold m-3 text-center bg-info"> &nbsp; <?php echo number_format($data->kelas_harga/$data->pembayaran_pelanggan) ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 mt-3">
        <p class="h5 m-3">bukti transfer</p>
      </div>
      <div class="col-md-3 mt-3">
      <img src="assets/image/bukti_booking/<?php echo $data->bukti_booking ?>" width="300px">
      </div>
    </div>
      <div class="row">
                <div class="col-md-6 mt-3">
                  <p class="h5 m-5 text-primary font-weight-bold">Transfer ke bank BCA 4210188580 a.n KU</p>
                </div>
              </div>
              <form action="" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-8 mt-2">
                  <p class="h5 m-3">Upload Bukti Transfer</p>
                  <div class="input-group m-3">
                    <input type="file" class="form-control" name="gambar" id="file" accept="image/png, image/jpeg, image/jpg" onchange="return validasiEkstensi()" required>
                    <script type="text/javascript">
                      var uploadField = document.getElementById("file");
                      uploadField.onchange = function() {
                          if(this.files[0].size > 1000000){
                            alert("Maaf. File Terlalu Besar ! Maksimal Upload 1MB");
                            this.value = "";
                          };
                      };
                      function validasiEkstensi(){
                          var inputFile = document.getElementById('file');
                          var pathFile = inputFile.value;
                          var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
                          if(!ekstensiOk.exec(pathFile)){
                              alert('Silakan upload file yang dengan ekstensi .jpeg/.jpg/.png');
                              inputFile.value = '';
                              return false;
                          }else{
                              // Preview gambar
                              if (inputFile.files && inputFile.files[0]) {
                                  var reader = new FileReader();
                                  reader.onload = function(e) {
                                      document.getElementById('preview').innerHTML = '<img src="'+e.target.result+'" style="height:300px"/>';
                                  };
                                  reader.readAsDataURL(inputFile.files[0]);
                              }
                          }
                      }
                      </script>
                    <button  type="submit" name="kirim" value="kirim" class="btn btn-primary">Upload</button>
                  </div>
                </div>
              </div>
              </form>

              <?php
    // jika ada tombol kirim
    if (isset($_POST["kirim"]))
    {
        // upload bukti
        $namabukti = $_FILES["gambar"]["name"];
        $lokasibukti = $_FILES["gambar"]["tmp_name"];
        $namafiks = date("YmdHis").$namabukti;
        move_uploaded_file($lokasibukti, "assets/image/bukti_booking/$namafiks");

        // insert ke tabel pembayaran
        $update = mysqli_query($conn, "UPDATE tb_booking SET bukti_booking = '$namafiks' WHERE id_pelanggan  = '".$data->id_pelanggan."' ");

                        if($update){
                            echo '<script>alert("bukti berhasil di kirim")</script>';
                            echo '<script>window.location="booking-page.php"</script>';
                        }else{
                            echo 'gagal '.mysqli_error($conn);
                        }

    }
    ?>    


</div>
</div>
<!-- isi booking end  -->





<!-- footer start -->
<footer class="text-center text-lg-start text-white" style="background-color: #a5458d; margin-top: 10em; margin-bottom: 0px;">
    <div class="container p-4 pb-0">
      <section class="">
        <div class="row">
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Yoga</h6>
            <p>Pelatihan yoga yang menyenangkan dan menyenangkan</p>
          </div>
          <hr class="w-100 clearfix d-md-none" />
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Kelas</h6>
            <p><a class="text-white">Care</a></p>
            <p><a class="text-white">Body</a></p>
            <p><a class="text-white">Mind</a></p>
            <p><a class="text-white">Hot</a></p>
          </div>
          <hr class="w-100 clearfix d-md-none" />
          <hr class="w-100 clearfix d-md-none" />
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Kontak</h6>
            <p><i class="fas fa-home mr-3"></i>Indonesia, Bekasi</p>
            <p><i class="fas fa-envelope mr-3"></i> dhaniae27@gmail.com</p>
            <p><i class="fas fa-phone mr-3"></i>085883307012</p>
          </div>

        </div>
      </section>
    </div>
    <div class="text-center p-3"style="background-color: rgba(0, 0, 0, 0.2)">
      © 2022 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">Yoga.com</a>
    </div>
  </footer>
<!-- footer end -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>