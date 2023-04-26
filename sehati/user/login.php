<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title></title>
  </head>
  <body>

  <?php
include "navbar.php";
?>

<!-- hero start -->
<div class="container ">
    <div class="top-area shadow p-3 mb-5 rounded login">
  <div class="row align-items-center justify-content-center p-5">
    <div class="col-lg-6 col-md-12 col-12">
        <img src="assets/images/c9749164-a510-468e-ac54-02b36ec4d2ee.jpg" style="height: 30em; " alt="">
    </div>
    <div class="col-lg-6 col-md-12 col-12">
    <h3 class="text-center ">MASUK</h3>
      <form action="assets/function/akses.php?op=in" method="POST" enctype="multipart/form-data">
        <input type="email" class="form-control my-2" name="email" placeholder="email" required>
        <input type="password" class="form-control my-2" name="password" placeholder="Password" required>
        <button type="submit" name="login" value="login" class="btn btn-dark">masuk</button>
      
        <a href="daftar.php"><button type="button" class="btn btn-success">daftar</button></a>
        </form>
    </div>
  </div>
  </div>
</div>
<!-- hero end -->


<!-- footer start -->
<footer class="text-center text-lg-start text-dark" style=" margin-top: 10em; margin-bottom: 0px; background-color: rgba(0, 0, 0, 0.2)">
    <div class="container pb-0">
      <section class="">
        <div class="row">
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Sehati</h6>
            <p>Sehati adalah sebuah rumah produksi homemade didirikan pada tahun 2018 dan dengan berbagai kue, makanan ringan, minuman kwalitas , rasa  dan komposisi yang baik.</p>
          </div>
          <hr class="w-100 clearfix d-md-none" />
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
          </div>
          <hr class="w-100 clearfix d-md-none" />
          <hr class="w-100 clearfix d-md-none" />
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Kontak</h6>
            <p><i class="fas fa-home mr-3"></i>Indonesia, jakarta</p>
            <p><i class="fas fa-envelope mr-3"></i> sehati@gmail.com</p>
            <p><i class="fas fa-phone mr-3"></i>082260621445</p>
          </div>

        </div>
      </section>
    </div>
    <div class="text-center p-3"style="background-color: rgba(0, 0, 0, 0.2)">
      © 2022 Copyright:
      <a class="text-white" href="">Sehati.com</a>
    </div>
</footer>
<!-- footer end -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>