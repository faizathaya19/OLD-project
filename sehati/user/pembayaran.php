<?php 
ob_start();
session_start();
include "assets/function/koneksi.php";

if(!isset($_SESSION['id_p_user'])){
    die("<b>Oops!</b> Access Failed.
        <p>Sistem Logout. Anda harus melakukan Login kembali.</p>
        <button type='button' onclick=location.href='login.php'>Back</button>");
}
if($_SESSION['hak_akses']!="user"){
    die("<b>Oops!</b> Access Failed.
        <p>Anda Bukan admin.</p>
        <button type='button' onclick=location.href='login.php'>Back</button>");
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

    <?php 
        $pemby = mysqli_query($conn,"SELECT * FROM tb_pembelian 
        JOIN tb_pem_pdk ON tb_pembelian.pem_id = tb_pem_pdk.pem_id 
        JOIN tb_data_area ON tb_pembelian.area_id = tb_data_area.area_id 
            WHERE tb_pembelian.pem_id = '$_GET[idpem]'");
            $depemby =  mysqli_fetch_assoc($pemby);
            
        ?>
<!-- hero start -->
<div class="container" style="margin-top:10em ;">
    <div class="top-area shadow p-3 mb-5 bg-body rounded ">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 border-end border-dark auto">
                <div class="top-area shadow p-3 mb-5 bg-body rounded ">
                  <div class="row my-2">
                    <div class="col-6">
                      <h5>Tanggal Pemesanan</h5>
                    </div>
                    <div class="col-4">
                      <p>: <?php echo $depemby['pem_tanggal']; ?></p>
                    </div>
                  </div>
                  <div class="row my-2">
                    <div class="col-6">
                      <h5>status pembayaran</h5>
                    </div>
                    <div class="col-6">
                      <button type="button" class="btn btn-info"><?php echo $depemby['pem_status_pembayaran']; ?></button> 
                    </div>
                  </div>
                  <?php if ($depemby['pem_status_pembayaran']!=="pending"): ?>
                    <div class="row my-2">
                    <div class="col-6">
                      <h5>status pengiriman</h5>
                    </div>
                    <div class="col-6">
                      <button type="button" class="btn btn-info"><?php echo $depemby['pem_status_pengiriman']; ?></button> 
                    </div>
                  </div>
                  <?php endif ?>
                </div>
                <div class="top-area shadow p-3 mb-5 bg-body rounded "><?php
                $pdkpem = mysqli_query($conn, "SELECT * FROM tb_pem_pdk JOIN tb_data_produk ON tb_pem_pdk.pdk_data_id=tb_data_produk.pdk_data_id WHERE pem_id ='$_GET[idpem]' ");
            if(mysqli_num_rows($pdkpem) > 0){
            while($row = mysqli_fetch_assoc($pdkpem)){
            ?>
                  <div class="row ">
                    <div class="col-4">
                      <img src="../admin/assets/images/produk/<?= $row['pdk_gambar'] ?>" alt="" style="object-fit: cover; height:9em; width:9em;">
                    </div>
                    <div class="col-3 pt-4">
                      <h4><?php echo $row['pdk_nama']; ?></h4>
                      <p class="fw-light m-0"><?php echo $row['pdk_ukuran']; ?></p>
                      <p class="fw-light m-0">( <?php echo $row['pem_pdk_jumlah']; ?> )</p>
                    </div>
                    <div class="col-3 pt-4">
                      <p class="fs-6">Rp. <?php  echo number_format($row['pem_pdk_harga']); ?></p>
                      <p class="m-0">Total harga :</p>
                      <p class="m-0">Rp. <?php echo number_format($row['pem_pdk_subharga']); ?></p>
                    </div>
                  </div>
                  
                  <?php }}else{ ?>
                  <tr>
                  <td colspan="8">Tidak ada Data</td>
                  </tr>
                  <?php } ?>
                  <hr>
                <h4>Catatan</h4>
                <h5><?php echo $depemby['pem_tambahan']; ?></h5>
                </div>
                <div class="top-area shadow p-3 mb-5 bg-body rounded ">
                  <h5>Data Pengiriman</h5>
                  <hr>
                  <div class="row my-2">
                    <div class="col-6">
                      <h6>Nama</h6>
                    </div>
                    <div class="col-4">
                      <p>: <?php echo $depemby['p_nama']; ?></p>
                    </div>
                  </div>
                  <div class="row my-2">
                    <div class="col-6">
                      <h6>No telepom</h6>
                    </div>
                    <div class="col-4">
                      <p>: <?php echo $depemby['p_telp']; ?> </p>
                    </div>
                  </div>
                  <div class="row my-2">
                    <div class="col-6">
                      <h6>Alamat</h6>
                    </div>
                    <div class="col-4">
                      <p class="m-0"><?php echo $depemby['p_alamat']; ?></p>
                      <p class="m-0"><?php echo $depemby['nama_area']; ?></p>
                      <p class="m-0"><?php echo $depemby['p_kodepos']; ?></p>
                    </div>
                  </div>
                </div>
                <div class="top-area shadow p-3 mb-5 bg-body rounded ">
                <?php 
                  $totalsubharga = mysqli_query($conn,"SELECT SUM(pem_pdk_subharga) AS total_harga FROM tb_pem_pdk WHERE pem_id ='$_GET[idpem]'");
                      $ttlsubharga =  mysqli_fetch_assoc($totalsubharga);
                      $totalitem = mysqli_query($conn,"SELECT SUM(pem_pdk_jumlah) AS jumlah_item FROM tb_pem_pdk WHERE pem_id ='$_GET[idpem]'");
                      $ttlitem=  mysqli_fetch_assoc($totalitem);
                  ?>
                  <div class="row my-2">
                    <div class="col-6">
                      <h6>Sub Harga (<?php echo ($ttlitem['jumlah_item']); ?> item)</h6>
                    </div>
                    <div class="col-4">
                      <p>: Rp. <?php echo number_format($ttlsubharga['total_harga']); ?></p>
                    </div>
                  </div>
                  <div class="row my-2">
                    <div class="col-6">
                      <h6>Ongkir</h6>
                    </div>
                    <div class="col-4">
                      <p>: Rp. <?php echo number_format($depemby['ongkir_area']); ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row my-2">
                    <div class="col-6">
                      <h6>Total Harga</h6>
                    </div>
                    <div class="col-4">
                      <p>: Rp. <?php echo number_format($depemby['pem_total']); ?></p>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 p-3">

            <?php if ($depemby['pem_status_pembayaran']=="pending"): ?>
            <form action="" method="POST" enctype="multipart/form-data">
              <h4>Kirim Bukti Transfer</h4>
              <hr>
                <p class="fs-4">BCA <span class="text-primary">1410188580</span> an faiz athaya ramadhan</p>
                <p>Upload Bukti transfer : <span class="fs-6 fw-light">File tidak besar dari 1MB</span></p>
                <input type="file" class="form-control my-2" name="gambar" id="file" accept="image/png, image/jpeg, image/jpg" onchange="return validasiEkstensi()" required> 
                <script type="text/javascript">
                      var uploadField = document.getElementById("file");
                      uploadField.onchange = function() {
                          if(this.files[0].size > 1000000){
                            alert("Maaf. File Terlalu Besar ! Maksimal Upload 1MB");
                            this.value = "";
                          };
                      };
                      function validasiEkstensi(){
                          var inputFile = document.getElementById('file');
                          var pathFile = inputFile.value;
                          var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
                          if(!ekstensiOk.exec(pathFile)){
                              alert('Silakan upload file yang dengan ekstensi .jpeg/.jpg/.png');
                              inputFile.value = '';
                              return false;
                          }else{
                              // Preview gambar
                              if (inputFile.files && inputFile.files[0]) {
                                  var reader = new FileReader();
                                  reader.onload = function(e) {
                                      document.getElementById('preview').innerHTML = '<img src="'+e.target.result+'" style="height:300px"/>';
                                  };
                                  reader.readAsDataURL(inputFile.files[0]);
                              }
                          }
                      }
                      </script>
                <button type="submit" name="Bukti-pembayaran" value="Bukti-pembayaran" class="btn btn-info">Upload</button> 
            </form>
            <?php  
                    if(isset($_POST['Bukti-pembayaran'])){

                        $tgl_pem = date("Y-m-d");
                        $pem_id= $_GET['idpem'];

                        $folder = "assets/images/bukti-pembayaran/";
                        $nama_file = $_FILES['gambar']['name'];
                        $nama_file_tmp = $_FILES['gambar']['tmp_name'];
                        $namafiks = date("YmdHis").$nama_file;
                        move_uploaded_file($nama_file_tmp, $folder.$namafiks);
                        $insert = mysqli_query($conn, "INSERT INTO tb_pembayaran 
                                                        VALUES('','$pem_id','$tgl_pem','$namafiks')");

                            $update = mysqli_query($conn, "UPDATE tb_pembelian SET pem_status_pembayaran = 'Menunggu Konfirmasi' WHERE pem_id  = '$pem_id' ");
                          if($insert){
                            echo "<script>alert('Bukti terkirim');</script>";
                            echo "<script>location='pembayaran.php?idpem=$pem_id';</script>";
                        }else{
                            echo "<script>alert('Bukti gagal terkirim');</script>";
                            echo "<script>location='pembayaran.php?idpem=$pem_id';</script>";
                        }
                    }
                    ?>
                    <?php  endif ?>
                    <?php if ($depemby['pem_status_pembayaran']!=="pending"): ?>
                      <?php 
                        $statuspem = mysqli_query($conn,"SELECT * FROM tb_pembelian 
                        JOIN tb_pembayaran ON tb_pembelian.pem_id=tb_pembayaran.pem_id
                            WHERE tb_pembelian.pem_id = '$_GET[idpem]'");
                            $statpem =  mysqli_fetch_assoc($statuspem);
                            
                        ?>
                      <h4>Bukti Transfer</h4>
                        <div class="row my-2">
                          <div class="col-6">
                            <h6>pada tanggal</h6>
                          </div>
                          <div class="col-4">
                            <p>: <?php echo($statpem['tanggal_pembayaran']); ?></p>
                          </div>
                        </div>
                        <a href="assets/images/bukti-pembayaran/<?= $statpem['bukti_pembayaran'] ?>"><img src="assets/images/bukti-pembayaran/<?= $statpem['bukti_pembayaran'] ?>" class="card-img-top m-5" style="height: 25em; width:25em;"></a>
                    <?php  endif ?>
            </div>
            <?php if ($depemby['pem_status_pembayaran']!=="Success"): ?>
              <form action="assets/function/batal-orderan.php?idpem=<?php echo $depemby["pem_id"] ?>" method="POST" enctype="multipart/form-data">
                <button type="submit" class="btn btn-primary my-3" name="batal-orderan" value="batal-orderan" onclick="return confirm('yakin membatalkan orderan?')">Batalkan Orderan</button>
              </form>
            <?php  endif ?>
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