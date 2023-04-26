<?php
ob_start();
session_start();
    include "assets/function/koneksi.php";
    
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

<!-- hero start -->
<div class="container " style="margin-top:6em;">
  <div class="row align-items-center mb-4">
    <div class="col-lg-6 col-md-8 col-12" class="p-2">
        <h3 >Sehati</h3>
        <p>Sehati adalah sebuah rumah produksi homemade didirikan pada tahun 2018 dan dengan berbagai kue, makanan ringan, minuman kwalitas , rasa  dan komposisi yang baik.</p>
    </div>
    <div class="col-lg-6 col-md-12 col-12">
        <img src="assets/images/106337060_fcf4610c-885e-4dfc-9152-8caa6712a7ac_1182_1182.jpeg" style="height: 30em; width: 30em;" alt="">
    </div>
  </div>
</div>
<!-- hero end -->


<div class="container-fluid" id="ktgr">
  <div class="row d-flex justify-content-center" >
    <?php 
    $ktgr = mysqli_query($conn, "SELECT * FROM tb_data_produk LEFT JOIN tb_kategori USING (ktgr_id) GROUP BY ktgr_id DESC");
    if(mysqli_num_rows($ktgr) > 0){
    while($row = mysqli_fetch_assoc($ktgr)){
    ?>
    <div class="col-lg-2 col-md-3 col-3 mx-4 py-3" >
        <a href="per-kategori.php?kat=<?php echo $row['ktgr_id'] ?>#ktgr" class="text-decoration-none">
        <div class="card  bg-light" style="width: 10em;">
          <h3 class="text-center  text-decoration-none text-dark"><?= $row['ktgr_nama'] ?></h3>
        </div></a>
    </div>
    <?php }}else{ ?>
      <tr>
        <td colspan="8">Tidak ada Data</td>
      </tr>
    <?php } ?>
  </div>
</div>
<hr>

<div class="container-fluid px-3">
  <div class="row " >
  <?php
                    $ktgr = mysqli_query($conn, "SELECT * FROM tb_data_produk LEFT JOIN tb_kategori USING (ktgr_id)  WHERE ktgr_id = '$_GET[kat]' ORDER BY pdk_data_id DESC");
                    if(mysqli_num_rows($ktgr) > 0){
                        while($row = mysqli_fetch_array($ktgr)){
                ?>
      <div class="col-lg-3 col-md-6 col-12">
      <a href="detail-produk.php?pddk=<?php echo $row['pdk_data_id'] ?>"><img src="../admin/assets/images/produk/<?= $row['pdk_gambar'] ?>" class="card-img-top " style="object-fit: cover; height:22em;"></a>
          <div class="row m-1">
            <div class="col-6">
              <h4 class="m-0"><?= $row['pdk_nama'] ?></h4>
              <h5 class="fw-light m-0"><?= $row['pdk_ukuran'] ?></h5>
            </div>
            <div class="col-6">
              <h4 class="m-1">Rp. <?= number_format($row['pdk_harga'])?></h4>
            </div>
           </div>
      </div>
      <?php }}else{ ?>
                                <tr>
                                  <td colspan="8">Tidak ada Data</td>
                                </tr>
                              <?php } ?>
		</div>
</div>
        

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