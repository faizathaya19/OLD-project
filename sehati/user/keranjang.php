<?php
ob_start();
session_start();
    include "assets/function/koneksi.php";
    if(!isset($_SESSION['id_p_user'])){
      echo "<script>alert('Login Untuk Akses Keranjang');</script>";
      echo "<script>location='login.php';</script>";
  }
  if($_SESSION['hak_akses']!="user"){
      die("<b>Oops!</b> Access Failed.
          <p>Anda Bukan admin.</p>
          <button type='button' onclick=location.href='login.php'>Back</button>");
  } 
  if (!isset($_SESSION['keranjang']) OR empty($_SESSION['keranjang'])) {
    echo "<script>alert('Keranjang Kosong, Silahkan Belanja');</script>";
    echo "<script>location='index.php';</script>";
    exit();
}
    
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">

    <title></title>
  </head>
  <body>

  <?php
include "navbar.php";
?>

<!-- hero start -->
<div class="container" style="margin-top: 10em;">
  <div class="top-area shadow p-3 mb-5 bg-body rounded " >
      <div class="row ">
          <div class="col-lg-6 col-md-12 col-12 border-end border-dark">
            <h3>Data Pengiriman:</h3>
            <hr>

            <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" class="form-control my-2" value="" name="nama" placeholder="Nama Lengkap" pattern="[A-Z a-z]{3,}" title="Tidak boleh ada angka" required>
        <input type="text" class="form-control my-2" value="" name="perusahaan" placeholder="Perusahaan (Optional)">
        <input type="text" class="form-control my-2" value="" name="alamat" placeholder="Alamat Lengkap" required>
        <input type="text" class="form-control my-2" value="" name="tempat" placeholder="rumah, Apartement, dll (Optional)">
        <div class="row">
          <div class="col-5">
            <select class="form-select" name="provinsi" required>
              <option selected>Kota</option>
              <?php
                             $area = mysqli_query($conn, "SELECT * FROM tb_data_area ORDER BY area_id DESC");
                                      while($areadata = mysqli_fetch_array($area)) {
                                    ?>
                          <option value="<?php echo $areadata['area_id'] ?>"><?php echo $areadata['nama_area'] ?> (Rp. <?php echo number_format($areadata['ongkir_area']) ?> )</option>
                          <?php } ?>
            </select>
          </div>
          <div class="col-4">
        <input type="number" class="form-control" value="" name="kodepos" placeholder="Kode Pos" required>
          </div>
      </div>
      <input type="number" class="form-control my-2" name="telp" value="" placeholder="No Whatsapp" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "13"  required>
      </div>
      <div class="col-lg-6 col-md-12 col-12  ">
        <div class="auto1">
        <?php $totalbelanja = 0; ?>
        <?php foreach ($_SESSION["keranjang"] as $id_pdk => $jumlah): ?>
                    <!-- menampilkan produk yang di perulangkan -->
                    <?php 
                    $ambil = $conn->query("SELECT * FROM tb_data_produk LEFT JOIN tb_kategori USING (ktgr_id) WHERE pdk_data_id = '$id_pdk'");
                    $pecah = $ambil->fetch_assoc();
                    $subharga = $pecah["pdk_harga"]*$jumlah;
                    ?>
          <div class="row ">
            <div class="col-4 d-flex justify-content-center">
              <img src="../admin/assets/images/produk/<?= $pecah['pdk_gambar'] ?>" alt="" style="object-fit: cover; height:9em; width:9em;">
            </div>
            <div class="col-3 pt-4">
              <h4><?php echo $pecah["pdk_nama"]; ?></h4>
              <p class="fw-light m-0"><?php echo $pecah["pdk_ukuran"]; ?></p>
              <p class="fw-light m-0">( <?php echo $jumlah; ?> )</p>
            </div>
            <div class="col-3 pt-4">
              <p class="fs-6">Rp. <?php echo number_format($pecah["pdk_harga"]); ?></p>
              <p class="m-0">Total harga :</p>
              <p class="m-0">Rp. <?php echo number_format($subharga); ?></p>
            </div>
            <div class="col-2 pt-5">
            <a href="assets/function/hapuskeranjang.php?id=<?php echo $id_pdk ?>" class="btn btn-danger">X</a>
            </div>
          </div>
          <hr>
          <?php $totalbelanja+=$subharga; ?>
          <?php endforeach ?>
        </div>
        <h4><span class="fs-5">Total pembelian :</span> Rp. <?php echo number_format($totalbelanja) ?> <span class="fw-light fs-6">(Belum Termasuk ongkir)</span></h4>
          <label for="" class="mt-3">Catatan :</label>
          <textarea class="form-control" name="tambahan" rows="3"></textarea>
          <button type="submit" name="bayar" value="bayar" class="btn btn-primary my-3">Checkout untuk Membayar</button>
        </div>
      </div>
      </form>
      <?php
      if (isset($_POST["bayar"]))
                {
                  $id_pel = $_SESSION['id_p_user'];
                  $nama      = $_POST["nama"];
                  $perusahaan      = $_POST["perusahaan"];
                  $alamat      = $_POST["alamat"];
                  $tempat     = $_POST["tempat"];
                  $provinsi     = $_POST["provinsi"];
                  $kodepos      = $_POST["kodepos"];
                  $telp      = $_POST["telp"];
                  $tambahan      = $_POST["tambahan"];
                  $tgl_pem = date("Y-m-d");

                  $area = $conn->query("SELECT * FROM tb_data_area WHERE area_id='$provinsi' ");
                    $areaong = $area->fetch_assoc();
                    $ongkir = $areaong['ongkir_area'];

                    $total_pembelian = $totalbelanja + $ongkir;

                
                  $conn->query("INSERT INTO tb_pembelian (id_p_user,p_nama,p_perusahaan,p_alamat,p_tempat,area_id,p_kodepos,p_telp,pem_tanggal,pem_total,pem_status_pembayaran, pem_status_pengiriman, pem_tambahan) 
                                            VALUES ('$id_pel','$nama','$perusahaan','$alamat','$tempat','$provinsi','$kodepos','$telp','$tgl_pem','$total_pembelian','pending','pending','$tambahan')");

                  // mendapatkan id_pembelian barusan terjadi
                    $pem_id= $conn->insert_id;

                    foreach ($_SESSION["keranjang"] as $id_pdk => $jumlah)
                    {
                        $produk=$conn->query("SELECT * FROM tb_data_produk WHERE pdk_data_id='$id_pdk'");
                              $perproduk = $produk->fetch_assoc();
                        
                              $nama = $perproduk['pdk_nama'];
                              $harga = $perproduk['pdk_harga'];

                              $subharga = $perproduk['pdk_harga']*$jumlah;
                              $conn->query("INSERT INTO tb_pem_pdk (pem_id,pdk_data_id,pem_pdk_jumlah,pem_pdk_nama,pem_pdk_harga,pem_pdk_subharga)
                                VALUES ('$pem_id','$id_pdk','$jumlah','$nama','$harga','$subharga') ");
                                        
                        
                    }
                        // mengkosongkan keranjang belanja
                        unset($_SESSION["keranjang"]);

                    // tampilan di alihkan ke halaman nota
                    echo "<script>alert('Pembelian Sukses!');</script>";
                    echo "<script>location='pembayaran.php?idpem=$pem_id';</script>";
                }
            ?>

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