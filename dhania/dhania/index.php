<?php

include 'assets/function/koneksi.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- carousel -->
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <!-- font -->
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

<!-- hero start -->

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img src="assets/image/012443800_1606988898-Gerakan-Yoga-yang-Dapat-Jadi-Posisi-Seks-Favorit-Anda-shutterstock_1033264990.jpg" class="d-block w-20 shadow-lg mb-5 bg-body rounded imgc" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/image/backlit-beach-dawn-588561.jpg" class="d-block w-20 shadow-lg mb-5 bg-body rounded imgc" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/image/gentle-flow-yoga-class-malaysia.jpg" class="d-block w-20 shadow-lg mb-5 bg-body rounded imgc" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>

</div>

<!-- hero end -->



<!-- about us -->
<div class=" tentang-kita">
  <img class="" src="assets/image/PikPng.com_leg-png_1177249.png" alt="">
  <div class="text-tentang-kita"><h2 class="text-end" style="font-weight:600;">TENTANG KITA</h2>
  <p class="text-center">Meskipun kami tidak meresepkan gaya yoga tertentu, kami mendasarkan ajaran kami pada prinsip-prinsip nafas-pranayama, gerakan-asana dan meditasi kesadaran. Prinsip-prinsip ini adalah dasar dari kelas kami dimana kami menyambut para pemula hingga Yogi yang berpengalaman.</p>
  <p class="text-center">Guru kami selalu hadir dengan penuh perhatian untuk siswa mereka dengan tujuan untuk menciptakan ruang dimana Anda akan selalu merasa nyaman. Setiap guru kami mengambil inspirasi dari aliran yoga dan latihan pribadi mereka saat merancang kelas mereka, memastikan setiap orang memiliki paparan berbagai jenis ajaran dan praktek.</p>
  </div>
</div>
<!-- about us -->



<!-- isi -->
<section class="kelas-yoga">
  <div class="container">
    <div class="row mb-5 text-center">
          <h2>Kelas Kita</h2>
          <hr>
          <p>Kelas Yoga adalah kelas low impact yang menitikberatkan pada aktivitas olah tubuh dan pikiran yang sangat baik untuk menjaga kebugaraan tubuh. Dengan berfokus pada kekuatan, kelenturan, dan pernafasan. Yoga mampu meningkatkan kualitas serta menstabilkan mental dan fisik seseorang.</p>        
    </div>
  <div class=" d-flex justify-content-center">
    <div class="class " >
      <div class="card p-0" style="border-radius:20px;">
        <img src="assets/image/012443800_1606988898-Gerakan-Yoga-yang-Dapat-Jadi-Posisi-Seks-Favorit-Anda-shutterstock_1033264990.jpg" alt="Avatar" class="img-class">
        <div class="no-overlay">Care</div>
        <div class="no-overlay fs-6 px-3 rounded-3 text-dark" style="margin-top:9em; margin-left:10em; background-color:white; ">Rp. 520.000</div>
          <div class="overlay">
            <div class="text-class">Memperdalam pemahaman tentang tubuh Anda ketika menghadiri kelas-kelas seperti pembukaan tubuh, terapi yoga dan kelas yoga ringan. Merasa terisi kembali, berenergi, dan seimbang.</div>
              <div class="card-body text-center">
              <a href="daftar-booking.php#booking">
              <button class="btn btn-dark position-absolute bottom-0 start-50 translate-middle-x">Booking</button></a>
              </div>
          </div>
      </div>
    </div>
    <div class="class " >
      <div class="card p-0" style="border-radius:20px;">
        <img src="assets/image/gerakan-yoga.jpg" alt="Avatar" class="img-class">
        <div class="no-overlay">Body</div>
        <div class="no-overlay fs-6 px-3 rounded-3 text-dark" style="margin-top:9em; margin-left:10em; background-color:white; ">Rp. 700.000</div>
          <div class="overlay">
            <div class="text-class">Sebuah beragam kelas seperti Hatha Klasik, Inti Yoga dan Yoga Slimming yang ditawarkan dengan mendalam dan menyenangkan.</div>
              <div class="card-body text-center">
              <a href="daftar-booking.php#booking">
              <button class="btn btn-dark position-absolute bottom-0 start-50 translate-middle-x">Booking</button></a>
              </div>
          </div>
      </div>
    </div>
  </div>
  <div class=" d-flex justify-content-center">
    <div class="class " >
      <div class="card p-0" style="border-radius:20px;">
        <img src="assets/image/backlit-beach-dawn-588561.jpg" alt="Avatar" class="img-class">
        <div class="no-overlay">Hot</div>
        <div class="no-overlay fs-6 px-3 rounded-3 text-dark" style="margin-top:9em; margin-left:10em; background-color:white; ">Rp. 350.000</div>
          <div class="overlay">
            <div class="text-class">Berlatih yoga di dalam ruangan 40°! Manjakanlah dirimu dengan pilihan kelas power hot, hot vinyasa dan apapun yang baik di dalam hot yoga.</div>
              <div class="card-body text-center">
              <a href="daftar-booking.php#booking">
              <button class="btn btn-dark position-absolute bottom-0 start-50 translate-middle-x">Booking</button></a>
              </div>
          </div>
      </div>
    </div>
    <div class="class" >
      <div class="card p-0" style="border-radius:20px;">
        <img src="assets/image/yoga-for-kids-2021-06-17.jpg" alt="Avatar" class="img-class">
        <div class="no-overlay">Mind</div>
        <div class="no-overlay fs-6 px-3 rounded-3 text-dark" style="margin-top:9em; margin-left:10em; background-color:white; ">Rp. 470.000</div>
          <div class="overlay">
            <div class="text-class">Kelas ini memiliki intensitas sedang, yang memberi siswa kesempatan untuk menghubungkan napas pada gerakan untuk menenangkan pikiran dan memperkuat tubuh.</div>
              <div class="card-body text-center">
              <a href="daftar-booking.php#booking">
              <button class="btn btn-dark position-absolute bottom-0 start-50 translate-middle-x">Booking</button></a>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
</section>


<div class="container-fluid">
    <div class="row member ">
      <div class="col-sm-6">
        <img class="img1" src="assets/image/core-flow-yoga-class-malaysia.jpg" alt="">
      </div>
      <div class="col-sm-6 member-ben shadow-lg">
        <h2>Manfaat Keanggotaan</h2>
        <div class="row ">
          <div class="col-8 col-sm-6">
            <ul>
              <li>Tidak ada biaya pendaftaran atau penghentian</li>
              <li>Kelas tidak terbatas</li>
              <li>Prioritas Check-in</li>
              <li>Sewa Matras Gratis</li>
              <li>Kredit Akun $ 20 untuk merujuk siswa yang mendaftar di Keanggotaan Bayar Otomatis</li>
              <li>Satu jeda gratis untuk Keanggotaan Anda (Batas 1x per tahun hingga 60 hari; harus dalam bentuk tertulis. Jeda tambahan adalah $25/bulan)</li>
            </ul>
          </div>
          <div class="col-4 col-sm-6">
            <ul>
              <li>Tarif diskon untuk Kelas dan Lokakarya Khusus</li>
              <li>Tarif Diskon untuk Pelatihan Guru</li>
              <li>Tiket Tamu Tanpa Batas untuk pengunjung pertama kali (Harus menemani anggota ke kelas dan belum pernah ke studio sebelumnya)</li>
              <li>Satu hadiah Hot on Yoga gratis</li>
              <li>Diskon 10% untuk merchandise dengan harga reguler</li>
              <li>Batalkan kapan saja dengan pemberitahuan tertulis 30 hari sebelumnya</li>
            </ul>
          </div>
        </div>
        <div class="card-body text-center">
          <a href="https://wa.me/+6285883307012?text=Saya%20Mau%20Join%20Member">
          <button class="btn btn-dark mt-3">Hubungi Kami</button></a>
        </div>
      </div>
    </div>
</div>


<!-- isi -->


<!-- video -->
<div class="container vid">
  <iframe class="d-flex shadow-lg p-1 mb-5 bg-body" src="https://www.youtube.com/embed/871uim_3l1A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<!-- video -->



<h2 class="text-center testimoni">Testimoni</h2>
<div class="row owl-carousel owl-theme mt-5" >
<?php
	      	$produk = mysqli_query($conn, "SELECT * FROM tb_kontak ORDER BY kontak_id DESC LIMIT 5");
	    	if(mysqli_num_rows($produk) > 0){
	            while($p = mysqli_fetch_array($produk)){
  	        ?>
      <div class="owl-item col-md-3 mb-1">
        <div class="card p-4" class="d-flex justify-content-center">
        <div class="testimonial mt-4 mb-2">
          <?php echo $p['kontak_testimoni'] ?>
          </div>
          <div class="name">
          <?php echo $p['Kontak_nama'] ?>
          </div>
              
        </div>
      </div>
            <?php }}else{ ?>
                <p>Produk tidak ada</p>
            <?php } ?>
		</div>

<!--Section: Contact -->
<section class="mb-4 container kontak" >
    <h2 class="h1-responsive font-weight-bold text-center my-4">Kritik</h2>
    <p class="text-center w-responsive mx-auto mb-5">Punya pertanyaan?</p>
    <div class="row">
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form"  method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="name" class="mt-1">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="email" class="mt-1">email</label>
                            <input type="text" id="email" name="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form">
                            <label for="pesan" class="mt-1">Pesan</label>
                            <textarea type="text" id="pesan" name="pesan"  class="form-control md-textarea"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                      <div class="col-md-12">
                          <div class="md-form">
                              <label for="testi" class="mt-1">Testimoni</label>
                              <textarea type="text" id="testi" name="testi"  class="form-control md-textarea"></textarea>
                          </div>
                      </div>
                      </div>
                      <br>
                      <div class="text-center text-md-left">
                         <input type="submit" name="submit" value="Kirim"  class="btn btn-secondary">
                      </div>
                        </form>
            <?php 
                    if(isset($_POST['submit'])){
                        $insert = mysqli_query($conn, "INSERT INTO tb_kontak
                                                        VALUES('','$_POST[nama]','$_POST[email]','$_POST[judul]','$_POST[pesan]','$_POST[testi]')");
                        if($insert){
                            echo "<script>alert('Data Berhasil terkirim');</script>";
                            echo "<script>location='index.php';</script>";
                        }else{
                            echo "<script>alert('Data Gagal terkirim');</script>";
                            echo "<script>location='index.php';</script>";
                        }
                    }
                    ?>
        </div>
       

        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>bekasi</p>
                </li>
  
                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>085883307012</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>dhaniae27@gmail.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact -->



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
    
                          <!-- testimoni -->
                          <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
                          <script src="assets/js/index.js"></script>
                          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
                          <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
                          <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
                          <!-- testimoni -->
                      
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</body>
</html>