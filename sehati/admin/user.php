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
        <button type='button' onclick=location.href='login.php'>Back</button>");
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
                <h2 class="ms-2 mt-2">User Pelanggan</h2>
                <hr>
<div class="container-fluid p-3 scroll3">
    <table class="table table-dark table-striped text-center  ">
          <tbody class="">
            <tr>
                <th style="width: 10em;">No</th>
                <th style="width: 15em;">Nama User</th>
                <th style="width: 15em;">Email</th>
                <th style="width: 10em;">Aksi</th>
            </tr>
            <?php 
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM tb_p_user ORDER BY id_user DESC");
            if(mysqli_num_rows($data) > 0){
            while($row = mysqli_fetch_assoc($data)){
            ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $row['nama_user'] ?></td>
              <td><?= $row['id_p_user'] ?></td>
              <td><a href="assets/function/hapus-pelanggan.php?idp=<?php echo $row['id_user'] ?>"onclick="return confirm('Yakin ingin hapus?')" class="btn btn-danger">Hapus</a></td>
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