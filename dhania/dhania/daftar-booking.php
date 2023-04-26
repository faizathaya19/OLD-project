<?php
ob_start();
    session_start();
    include 'assets/function/koneksi.php'; 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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




<!-- isi check booking start -->


<Div class="container-fluid check-booking">
  <h1>ANDA SUDAH BOOKING KELAS?</h1>
  <h2>Silahkan Cek Di sini</h2>
    <form action="assets/function/akses.php?id=in" method="POST" class="row input-nomer justify-content-center" >
        <label class="col-sm-2 col-form-label">Masukan No Telepon</label>
      <div class="col-sm-8 input-group-lg d-flex">
        <input type="tel" class="form-control" name="ponsel" placeholder="08123654789                (Sesuai Nomor Telepon saat mendaftar)" required >
        <button type="submit" name="submit" class=" col-sm-3 btn btn-primary">Check Di sini</button>
      </div>
    </form>
</Div>

<!-- isi check booking end -->

<!-- isi Daftar-->
<div id="booking" class="container border border-light-3 daftar shadow-lg  bg-body">
  <h2>DAFTAR BOOKING</h2>
<form class="row" action="assets/function/send-booking.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="nama" class="form-control" id="nama" name="nama" pattern="[A-Z a-z]{3,}" title="Tidak boleh ada angka" required>
        <div id="nameError"><span id="spanNameError" class="nameClass"></span></div>
      </div>
      <div class="mb-3  d-inline-flex" >
          <div class="form-group" style="padding-right: 5em;">
            <label for="tempat" class="form-label">Tempat Lahir</label>
            <input type="tempat" class="form-control" id="tempat" name="tempat"  required>
          </div>
          <div class="form-group">
            <label>Tanggal lahir</label>
            <input type="date" class="form-control" name="tanggallahir" required>
          </div>
          <label for="control-label" style=" margin: 2.5em; margin-right: -1em;">Jenis Kelamin :</label>
          <div class="form-check" style=" margin: 2.5em;">
            <input class="form-check-input" type="radio" name="jeniskelamin"  value="1" checked>
            <label class="form-check-label">Laki-laki</label>
          </div>
          <div class="form-check" style=" margin: 2.5em;">
            <input class="form-check-input" type="radio" name="jeniskelamin"  value="0">
            <label class="form-check-label" >Perempuan</label>
          </div>
      </div>
      
      <div class="mb-3" style=" margin-top: -2em;">
        <label for="no-telepon" class="form-label d-flex">No Telepon &nbsp;<span class="d-flex form-text">( No Whatsapp Aktif )</span></label>
        <input type="notel" class="form-control" name="notelepon" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "13" required />
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" required>
      </div>
    
      <div class="mb-3">
        <label for="Select" class="form-label">Kelas</label>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-sm example" name="kelas" required>
            <option selected>Pilih Kelas</option>
            <?php $kelas = mysqli_query($conn, "SELECT * FROM tb_kelas ORDER BY kelas_id DESC");
                        while($r = mysqli_fetch_array($kelas)) {    ?>
            <option value="<?php echo $r['kelas_id'] ?>"><?php echo $r['kelas_nama'] ?></option>
                    <?php } ?>
          </select>
      </div>

      <div class="form-group">
            <label>Tanggal Booking</label>
            <input type="date" class="form-control" value="<?=date('Y-m-d')?>" name="tgl_booking" required>
          </div>

    <div class="row">
      <div class="col-2">
        <p class="h7 mt-3">pembayaran :</p>
      </div>
      <div class="col-10 mt-3">
          <input class="form-check-input" type="radio" name="pembayaran" value="1">
          <label class="form-check-label col-2 me-5">Full</label>
      </div>
    </div>
    <input type="submit" name="submit" value="Booking Sekarang" class="mt-3 btn btn-primary btn-lg">
  </form>
</div>


<!-- isi daftar End -->

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