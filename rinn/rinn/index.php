<?php
    session_start();
    include 'function/koneksi.php'; 
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
<!-- end hero -->

<!-- category card -->
<section id="service">
    <div class="container my-5 py-5">
    <div class="row card-ser">
        <div class="col-lg-4">
            <div class="card p-4" style="width:20rem;">
                <img src="asset/pramac-racing-luncurkan-motor-baru-untuk-motogp-2022-pic-600x600.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                    <h3>Motor Baru</h3>
                    <p class="card-text">Di bagian Motor Baru ini terdapat beberapa motor baru yang diproduksi pada tahun sekarang</p>
                    </div>
                    <div class="card-body text-center">
                      <a href="motor-baru.php">
                      <button class="btn btn-dark mt-3">Pelajari Lebih Lanjut</button></a>
                    </div>
            </div>
        </div>
        <div class="col-lg-4">  
        <div class="card p-4" style="width: 20rem;">
            <img src="asset/data.jpeg.webp" class="card-img-top" alt="...">
            <div class="card-body text-center">
              <h3>Motor Bekas</h3>
              <p class="card-text">Di bagian Motor Bekas ini terdapat motor bekas yang diproduksi 5 tahun ke belakang</p>
            </div>
            <div class="card-body text-center">
              <a href="motor-bekas.php">
              <button class="btn btn-dark mt-3">Pelajari Lebih Lanjut</button></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card p-4" style="width: 20rem;">
            <img src="asset/9517642_8c94ec20-258b-41c6-8b07-225b77ca9137_600_600.jpg" class="card-img-top" alt="...">
            <div class="card-body text-center">
              <h3>Tips</h3>
              <p class="card-text">
                Di bagian Tips terdapat cara memilih motor bekas dan merawat motor yang baik dan benar</p>
            </div>
            <div class="card-body text-center">
              <a href="tips.html">
              <button class="btn btn-dark mt-3">Pelajari Lebih Lanjut</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- end card -->

<!-- produk card -->
<section id="service">
  <div class="container my-5 py-5">
    <div class="">
    <div class="row mb-5">
        <div class="col-12">
            <h1 class="fw-bold text-center">Produk Terpopuler</h1>
            <hr>
        </div>
    </div>


    <div class="row d-flex justify-content-around " >
    <?php
	      	$produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE pdk_status=1 ORDER BY pdk_id DESC LIMIT 3");
	    	if(mysqli_num_rows($produk) > 0){
	            while($p = mysqli_fetch_array($produk)){
  	        ?>
      <div class=" col-md-3 mb-5">
        <div class="card p-4" class="d-flex justify-content-center">
          <img src="asset/foto_motor/<?php echo $p['pdk_gambar'] ?>" class="card-img-top" alt="...">
            <p class="merek"><?php echo $p['pdk_merek'] ?></p>
            <h2 class="nama"><?php echo $p['pdk_nama'] ?></h2>
            <h5>Harga OTR Mulai dari</h5>
            <p class="harga">Rp. <?php echo number_format($p['pdk_harga'])  ?></p>
              <div class="card-body text-center">
                <a href="detail-produk.php?id=<?php echo $p['pdk_id'] ?>">
                <button class="btn btn-dark mt-3">Detail</button></a>
              </div>
        </div>
      </div>
            <?php }}else{ ?>
                <p>Produk tidak ada</p>
            <?php } ?>
		</div>
  </div>

  </div>
</section>
<!-- end produk -->


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
        <a class="d-flex justify-content-end  "href="admin/admin.php" >admin</a>
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