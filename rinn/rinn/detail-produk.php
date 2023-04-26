<?php
    error_reporting(0);
	include 'function/koneksi.php';

    $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE pdk_id = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/detail.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>FYS</title>
</head>
<body>
    
<!-- navbar start -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">FYS</a>
      <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tips.html">Tips</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kontak.php">Kontak</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<!-- navbar end -->

<!-- hero -->
<div class="hero">
    <div class="container">
        <h1>FYS Motor</h1>
        <p class="text-white">Adalah sebuah layanan website yang memberikan tips bagaimana cara memilih dan merawat motor dengan baik dan benar</p>
    </div>
</div>
<br><br>
<!-- end hero -->

<!-- Start Header Middle -->
<section class="item-details section">
  <div class="container">
      <div class="top-area shadow p-3 mb-5 bg-body rounded">
          <div class="row align-items-center">
              <div class="col-lg-6 col-md-12 col-12">
                  <div class="product-images">
                      <main id="gallery" >
                          <div class="main-img shadow-none bg-light">
                              <img src="asset/foto_motor/<?php echo $p->pdk_gambar?>" id="current" alt="#" class="rounded mx-auto d-block">
                          </div>
                      </main>
                  </div>
              </div>
              <div class="col-lg-6 col-md-12 col-12">
                  <div class="product-info">
                      <h2 class="merek"><?php echo $p->pdk_merek ?></h2>
                      <h2 class="namtor"><?php echo $p->pdk_nama ?></h2>
                      <br>
                      <h6>Harga OTR Jakarta</h6>
                      <h3 class="price">Rp. <?php echo number_format($p->pdk_harga) ?></h3>
                  </div>
              </div>
          </div>
      </div>

      <br><br>

      <div class="product-details-info ">
          <div class="single-block">
              <div class="row">
              <div class="col-md-5 col-12">
                      <div class="info-body">
                          <h4>Tentang</h4>
                          <ul class="features">
                              <li>Merek &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;: <?php echo $p->pdk_merek ?> </li>
                              <li>Jenis Motor&ensp;: <?php echo $p->pdk_nama ?> </li>
                          </ul>
                          <br>
                          <h4>Spesifikasi</h4>
                          <ul class="normal-list">
                              <li>Tipe Mesin &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;: <?php echo $p->pdk_mesin ?></li>
                              <li>Kapasitas Mesin &ensp;: <?php echo $p->pdk_cc ?> cc</li>
                              <li>Transmisi&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;: <?php echo $p->pdk_transmisi ?></li>
                              <li>Kapasitas Tanki&ensp;&ensp;: <?php echo $p->pdk_tangki ?></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-md-7 col-12">
                      <div class="info-body custom-responsive-margin">
                          <h4>Detail</h4>
                          <p class="text-break deskripsi" width="30px"><?php echo $p->pdk_deskripsi ?></p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<br><br>


<!-- End Item Details -->


<!-- footer start -->
<section class="">
    <!-- Footer -->
    <footer class="text-center text-white" style="background-color: rgb(69, 69, 69);">
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: CTA -->
        <section>
          <p class="d-flex justify-content-center align-items-center">
            <h3>Contact Us</h3>
            <p class="me-3">Email : rin@gmail.com</p>
            <p class="me-3">Alamat : PT. Astra Honda Motor</p>
            <p class="me-3">Tel. 0811-9-500-989</p>

          </p>
        </section>
        <!-- Section: CTA -->
      </div>
      <!-- Grid container -->
  
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-white" style="text-decoration: none;" href="">FYS Motor</a>
        <a class="d-flex justify-content-end  "href="" >admin</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
</section>
  <!-- End of .container -->
<!-- footer end -->







<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>