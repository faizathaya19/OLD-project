<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title></title>
  </head>
  <body>


<!-- hero start -->
<div class="container">
    <div class="top-area shadow p-3 mb-5  rounded login">
  <div class="row align-items-center justify-content-center p-5">
    <div class="col-lg-6 col-md-12 col-12">
        <img src="assets/images/c9749164-a510-468e-ac54-02b36ec4d2ee.jpg" style="height: 30em; " alt="">
    </div>
    <div class="col-lg-6 col-md-12 col-12 text-center">
        <h2 class="mb-3">ADMIN</h2>
        <form action="assets/function/akses.php?op=in" method="POST" enctype="multipart/form-data">
        <input type="text" class="form-control my-2"  name="username" placeholder="username">
        <input type="password" class="form-control my-2" name="password"  placeholder="Password">
        <button type="submit" name="login" value="login" class="btn btn-dark fs-5">masuk</button>
        </form>
    </div>
  </div>
  </div>
</div>
<!-- hero end -->


        


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