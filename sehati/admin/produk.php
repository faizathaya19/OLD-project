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

                        <h4 class="mt-3">tambah data</h4>
                        <hr>
                        <form action="assets/function/tambah-data-produk.php" method="POST" enctype="multipart/form-data">
                        <select class="form-select my-2" name="kategori">
                          <option selected>Kategori</option>
                          <?php
                          $ktgr = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY ktgr_id DESC");
                                      while($ktgrdata = mysqli_fetch_array($ktgr)) {
                                    ?>
                          <option value="<?php echo $ktgrdata['ktgr_id'] ?>"><?php echo $ktgrdata['ktgr_nama'] ?></option>
                          <?php } ?>
                        </select>
                        <input type="text" class="form-control my-2" name="produk" placeholder="Produk"> 
                        <input type="text" class="form-control my-2" name="ukuran" placeholder="Ukuran"> 
                        <input type="number" class="form-control my-2" name="harga"  placeholder="Harga"> 
                        <textarea type="text" class="form-control my-2" name="deskripsi" placeholder="Deskripsi"></textarea>
                        <input type="file" class="form-control my-2" name="gambar" placeholder="gambar"> 
                        <button type="submit" class="btn btn-primary" name="kirim-data-produk" value="kirim-data-produk">+ Data</button>
                        </form>

                <!-- isi start -->
<div class="container-fluid p-3 scroll">
    <table class="table table-dark table-striped text-center  ">
          <tbody class="border border-danger">
            <tr>
                <th style="width: 5em;">No</th>
                <th style="width: 15em;">Kategori</th>
                <th style="width: 15em;">Produk</th>
                <th style="width: 10em;">Ukuran</th>
                <th style="width: 10em;">Harga</th>
                <th style="width: 20em;">Deskripsi</th>
                <th style="width: 15em;">Gambar</th>
                <th style="width: 10em;">Aksi</th>
            </tr>
            <?php 
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM tb_data_produk LEFT JOIN tb_kategori USING (ktgr_id) ORDER BY pdk_data_id DESC");
            if(mysqli_num_rows($data) > 0){
            while($row = mysqli_fetch_assoc($data)){
            ?>
            <tr class="px-2">
              <td><?= $no++ ?></td>
              <td><?= $row['ktgr_nama'] ?></td>
              <td><?= $row['pdk_nama'] ?></td>
              <td><?= $row['pdk_ukuran'] ?></td>
              <td>Rp <?= number_format($row['pdk_harga']) ?></td>
              <td><?= $row['pdk_deskripsi'] ?></td>
              <td><img src="assets/images/produk/<?= $row['pdk_gambar'] ?>" style="object-fit: cover; height:10em; width:10em;"></td>
              <td><a href="assets/function/hapus-data-produk.php?iddp=<?php echo $row['pdk_data_id'] ?>"onclick="return confirm('Yakin ingin hapus?')" class="btn btn-danger">Hapus</a><a href="edit-data-produk.php?idpp=<?php echo $row['pdk_data_id'] ?>"onclick="return confirm('Yakin ingin edit?')" class="btn btn-primary ms-2">Edit</a></td>
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