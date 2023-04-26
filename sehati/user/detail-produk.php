<?php
ob_start();
session_start();
    include "assets/function/koneksi.php";

    $id_pdk = $_GET["pddk"];
    $ambil = $conn->query("SELECT * FROM tb_data_produk LEFT JOIN tb_kategori USING (ktgr_id) WHERE pdk_data_id = '$id_pdk'");
    $detail = $ambil->fetch_assoc();
    
    
?>

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


<div class="container" style="margin-top: 10em;">
<div class="top-area shadow p-3 mb-5 bg-body rounded">
          <div class="row">
              <div class="col-lg-8 col-md-12 col-12">
                  <div class="product-images">
                      <main id="gallery" >
                          <div class="main-img">
                              <img src="../admin/assets/images/produk/<?= $detail['pdk_gambar'] ?>" id="current" alt="#" class="rounded mx-auto d-block" style="object-fit: cover; height:40em; width:40em;">
                          </div>
                      </main>
                  </div>
              </div>
              <div class="col-lg-4 col-md-12 col-12">
                  <div class="product-info ps-4 pt-4">
                  <form method="POST">
                      <h2><?php echo $detail['pdk_nama'] ?></h2>
                      <h4>Rp. <?php echo number_format($detail['pdk_harga']) ?></h4>
                      <p><?php echo $detail['pdk_ukuran'] ?></p>
                        <p><?php echo $detail['pdk_deskripsi'] ?></p>
                        <input type="number" class="form-control my-2"  name="jumlah" min="1" placeholder="Jumlah" style="width:100px;" required> 
                        <button type="submit" class="btn btn-primary" name="masuk-keranjang" value="masuk-keranjang">Beli</button>
                  </form>
                  </div>
              </div>
          </div>
      </div>
</div>

<?php
                    // jika ada tombol beli
                    if (isset($_POST["masuk-keranjang"]))
                    {
                        // menerima jumlah
                        $jumlah = $_POST["jumlah"];
                        // masukan keranjang
                        $_SESSION["keranjang"][$id_pdk] = $jumlah;

                        echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
                        echo "<script>location='index.php';</script>";
                    }
                    ?>


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