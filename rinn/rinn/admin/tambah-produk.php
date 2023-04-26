<?php
    session_start();
    include '../function/koneksi.php';
    if(!isset($_SESSION['username'])){
        echo '<script>window.location="admin.php"</script>';
    }


?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin [FYS]</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    
    <!-- CkEditor -->
</head>
<body>

    <!-- header -->
    <?php 
        include 'navbar.php';
    ?>

    <!-- Content -->
    <div class="section">
        <div class="container">
            <h3>Tambah Data </h3>
            <div class="box">
                <form action="" method="POST"       >
                  <select class="input-control" name="kategori" required>
                      <option value="">--Pilih--</option>
                      <?php
                        $category = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_id DESC");
                        while($r = mysqli_fetch_array($category)) {

                        
                      ?>
                         <option value="<?php echo $r['kategori_id'] ?>"><?php echo $r['kategori_nama'] ?></option>
                     <?php } ?>
                  </select>
                  <p>Brand<p>
                  <input type="text" name="merek" class="input-control" placeholder="merek" required>
                  <p>Motor</p>
                  <input type="text" name="nama" class="input-control" placeholder="Nama motor" required>
                  <p>Harga</p>
                  <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                  <p>Cc Motor</p>
                  <input type="text" name="cc" class="input-control" placeholder="cc" required>
                  <p>Mesin</p>
                  <input type="text" name="mesin" class="input-control" placeholder="mesin" required>
                  <p>Tranmisi</p>
                  <input type="text" name="tranmisi" class="input-control" placeholder="tranmisi" required>
                  <p>Tangki</p>
                  <input type="text" name="tangki" class="input-control" placeholder="tangki" required>
                  <input type="file" name="gambar" class="input-control"  required>
                  <select class="input-control" name="status">
                      <option value="">--Pilih--</option>
                      <option value="1">populer</option>
                      <option value="0">Tidak </option>
                  <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br>
                  <input type="submit" name="submit" value="Submit" class="btn btn-secondary">
                </form>
                <?php  
                    if(isset($_POST['submit'])){
                        $folder = "../asset/foto_motor/";
                        $nama_file = $_FILES['gambar']['name'];
                        $nama_file_tmp = $_FILES['gambar']['tmp_name'];
                        move_uploaded_file($nama_file_tmp, $folder.$nama_file);
                        $insert = mysqli_query($conn, "INSERT INTO tb_produk
                                                        VALUES('','$_POST[kategori]','$_POST[merek]','$_POST[nama]','$_POST[harga]','$_POST[cc]','$_POST[mesin]','$_POST[tranmisi]','$_POST[tangki]','$_POST[deskripsi]','$nama_file','$_POST[status]')");
                        if($insert){
                            echo "<script>alert('Data Berhasil Disimpan');</script>";
                            echo "<script>location='data-produk.php';</script>";
                        }else{
                            echo "<script>alert('Data Gagal Disimpan');</script>";
                            echo "<script>location='index.php?halaman=data-produk';</script>";
                        }
                    }
                    ?>
            </div>
        </div>
    </div>


    <script>
       CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</body>
</html>