<?php 
ob_start();
session_start();
include "assets/function/koneksi.php";

if(!isset($_SESSION['id_admin'])){
    die("<b>Oops!</b> Access Failed.
        <p>Sistem Logout. Anda harus melakukan Login kembali.</p>
        <button type='button' onclick=location.href='login.php'>Back</button>");
}
if($_SESSION['hak_akses']!="admin"){
    die("<b>Oops!</b> Access Failed.
        <p>Anda Bukan admin.</p>
        <button type='button' onclick=location.href='login,php'>Back</button>");
} 


?>


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

                <!-- isi start -->
<div class="container-fluid p-3 scroll4">
  <h2>Pembelian Berjalan</h2>
  <hr>
    <table class="table table-dark table-striped text-center  ">
          <tbody>
            <tr>
                <th style="width: 9em; height:3em;">No</th>
                <th style="width: 20em;">Nama Pelanggan</th>
                <th style="width: 20em;">Nama Pengiriman</th>
                <th style="width: 15em;">Tanggal</th>
                <th style="width: 15em;">Status pembayaran</th>
                <th style="width: 15em;">Status pengiriman</th>
            </tr>
            <?php 
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM tb_pembelian JOIN tb_p_user ON tb_pembelian.id_p_user=tb_p_user.id_p_user WHERE pem_status_pengiriman != 'Success' ORDER BY pem_id DESC");
            if(mysqli_num_rows($data) > 0){
            while($row = mysqli_fetch_assoc($data)){
            ?>
            <tr>
              <td style="height:3em;"><?= $no++ ?></td>
              <td><?= $row['nama_user'] ?></td>
              <td><?= $row['p_nama'] ?></td>
              <td><?= $row['pem_tanggal'] ?></td>

              <?php if ($row['pem_status_pembayaran']!=="pending"): ?>
              <td><a href="index.php?hal=detail-pembayaran&idpem=<?php echo $row["pem_id"] ?>" class="btn btn-info"><?= $row['pem_status_pembayaran'] ?></a></td>
              <?php  endif ?>

              <?php if ($row['pem_status_pembayaran']=="pending"): ?>
              <td><?= $row['pem_status_pembayaran'] ?></td>
              <?php  endif ?>

              <?php if ($row['pem_status_pengiriman']=="Success"): ?>
              <td>
                  <button type="Button" class="btn btn-primary"><?= $row['pem_status_pengiriman'] ?></button>
              </td>
              <?php  endif ?>

              <?php if ($row['pem_status_pengiriman']=="Barang Dikirim"): ?>
              <td>
                <form action="assets/function/validasi-selesai-dikirim.php?idpem=<?php echo $row["pem_id"] ?>" method="POST" enctype="multipart/form-data">
                  <button type="submit" class="btn btn-primary" name="barang-dikirim" value="barang-dikirim" onclick="return confirm('sudah sampai?')"><?= $row['pem_status_pengiriman'] ?></button>
                </form>
              </td>
              <?php  endif ?>

              <?php if ($row['pem_status_pengiriman']=="Proses"): ?>
              <td>
                <form action="assets/function/validasi-barang-dikirim.php?idpem=<?php echo $row["pem_id"] ?>" method="POST" enctype="multipart/form-data">
                  <button type="submit" class="btn btn-primary" name="barang-dikirim" value="barang-dikirim" onclick="return confirm('sudah bisa di kirim?')"><?= $row['pem_status_pengiriman'] ?></button>
                </form>
              </td>
              <?php  endif ?>

              <?php if ($row['pem_status_pengiriman']=="pending"): ?>
              <td><?= $row['pem_status_pengiriman'] ?></td>
              <?php  endif ?>

            </tr>
            <?php }}else{ ?>
                                <tr>
                                  <td colspan="8">Tidak ada Data</td>
                                </tr>
                              <?php } ?>
          </tbody>
    </table>
</div>
<!-- isi end -->

 <!-- isi start -->
 <div class="container-fluid p-3 scroll4">
  <h2>Pembelian Selesai</h2>
  <hr>
    <table class="table table-dark table-striped text-center  ">
          <tbody>
            <tr>
            <th style="width: 9em; height:3em;">No</th>
                <th style="width: 20em;">Nama Pelanggan</th>
                <th style="width: 20em;">Nama Pengiriman</th>
                <th style="width: 15em;">Tanggal</th>
                <th style="width: 15em;">Status pembayaran</th>
                <th style="width: 15em;">Status pengiriman</th>
            </tr>
            <?php 
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM tb_pembelian JOIN tb_p_user ON tb_pembelian.id_p_user=tb_p_user.id_p_user WHERE pem_status_pengiriman = 'Success' ORDER BY pem_id DESC");
            if(mysqli_num_rows($data) > 0){
            while($row = mysqli_fetch_assoc($data)){
            ?>
            <tr>
              <td style="height:3em;"><?= $no++ ?></td>
              <td><?= $row['nama_user'] ?></td>
              <td><?= $row['p_nama'] ?></td>
              <td><?= $row['pem_tanggal'] ?></td>

              <?php if ($row['pem_status_pembayaran']!=="pending"): ?>
              <td><a href="index.php?hal=detail-pembayaran&idpem=<?php echo $row["pem_id"] ?>" class="btn btn-info"><?= $row['pem_status_pembayaran'] ?></a></td>
              <?php  endif ?>

              <?php if ($row['pem_status_pembayaran']=="pending"): ?>
              <td><?= $row['pem_status_pembayaran'] ?></td>
              <?php  endif ?>

              <?php if ($row['pem_status_pengiriman']=="Success"): ?>
              <td>
                  <button type="Button" class="btn btn-primary"><?= $row['pem_status_pengiriman'] ?></button>
              </td>
              <?php  endif ?>

              <?php if ($row['pem_status_pengiriman']=="Barang Dikirim"): ?>
              <td>
                <form action="" method="POST" enctype="multipart/form-data">
                  <button type="submit" class="btn btn-primary" name="barang-dikirim" value="barang-dikirim" onclick="return confirm('sudah sampai?')"><?= $row['pem_status_pengiriman'] ?></button>
                </form>
              </td>
              <?php  endif ?>

              <?php if ($row['pem_status_pengiriman']=="Proses"): ?>
              <td>
                <form action="assets/function/validasi-barang-dikirim.php?idpem=<?php echo $row["pem_id"] ?>" method="POST" enctype="multipart/form-data">
                  <button type="submit" class="btn btn-primary" name="barang-dikirim" value="barang-dikirim" onclick="return confirm('sudah bisa di kirim?')"><?= $row['pem_status_pengiriman'] ?></button>
                </form>
              </td>
              <?php  endif ?>

              <?php if ($row['pem_status_pengiriman']=="pending"): ?>
              <td><?= $row['pem_status_pengiriman'] ?></td>
              <?php  endif ?>

            </tr>
            <?php }}else{ ?>
                                <tr>
                                  <td colspan="8">Tidak ada Data</td>
                                </tr>
                              <?php } ?>
          </tbody>
    </table>
</div>
<!-- isi end -->

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