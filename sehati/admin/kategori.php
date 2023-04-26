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



                        <h4 class="mt-2">Tambah Kategori</h4>
                        <hr>
                        <div class="row">
                          <div class="col-5">
                          <form action="assets/function/tambah-kategori.php" method="POST" enctype="multipart/form-data">
                            <input type="text" class="form-control my-2" name="nama" placeholder="kategori"> 
                            <button type="submit" class="btn btn-primary" name="kirim-kategori" value="kirim-kategori">+ Kategori</button>
                          </form>
                          </div>
                          <div class="col-6">
                            <table class="table table-dark table-striped text-center scroll1">
                            <tbody>
                              <tr>
                                <th style="width: 4em;">No</th>
                                <th style="width: 20em;">Kategori</th>
                                <th style="width: 25em;">aksi</th>
                              </tr>
                              <?php 
                              $no = 1;
                              $ktgr = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY ktgr_id DESC");
                              if(mysqli_num_rows($ktgr) > 0){
                              while($row = mysqli_fetch_assoc($ktgr)){
                                ?>
                              <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['ktgr_nama'] ?></td>
                                <td><a href="assets/function/hapus-kategori.php?idk=<?php echo $row['ktgr_id'] ?>"onclick="return confirm('Yakin ingin hapus?')" class="btn btn-danger">Hapus</a><a href="edit-kategori.php?idk=<?php echo $row['ktgr_id'] ?>"onclick="return confirm('Yakin ingin edit?')" class="btn btn-primary ms-2">Edit</a></td>
                              </tr>
                              <?php }}else{ ?>
                                <tr>
                                  <td colspan="8">Tidak ada Data</td>
                                </tr>
                              <?php } ?>
                            </tbody>
                            </table>
                          </div>
                        </div>       

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