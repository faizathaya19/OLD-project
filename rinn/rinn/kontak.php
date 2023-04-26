<?php
    session_start();
    include 'function/koneksi.php'; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Document</title>
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
<!-- end hero -->
<!--Section: Contact -->
<section class="mb-4 container">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">kontak</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Punya pertanyaan?</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form"  method="POST">
                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="name" class="">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control">
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="email" class="">email</label>
                            <input type="text" id="email" name="email" class="form-control">
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="judul" class="">Judul</label>
                            <input type="text" id="judul" name="judul" class="form-control">
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">
                        <div class="md-form">
                            <label for="pesan">Pesan</label>
                            <textarea type="text" id="pesan" name="pesan"  class="form-control md-textarea"></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="text-center text-md-left">
            <input type="submit" name="submit" value="Submit" class="btn btn-secondary">
            </div>
            <div class="status"></div>
                <!--Grid row-->

            </form>


        </div>
        <!--Grid column-->

        <?php  
                    if(isset($_POST['submit'])){
                        $insert = mysqli_query($conn, "INSERT INTO tb_kontak
                                                        VALUES('','$_POST[nama]','$_POST[email]','$_POST[judul]','$_POST[pesan]')");
                        if($insert){
                            echo "<script>alert('Data Berhasil terkirim');</script>";
                            echo "<script>location='kontak.php';</script>";
                        }else{
                            echo "<script>alert('Data Gagal terkirim');</script>";
                            echo "<script>location='kontak.php';</script>";
                        }
                    }
                    ?>

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>Jakarta</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+62 8320388268</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>rin@gamil.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact -->


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



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>