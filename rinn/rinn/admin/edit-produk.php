<?php
    session_start();
    include '../function/koneksi.php';
    if(!isset($_SESSION['username'])){
        echo '<script>window.location="admin.php"</script>';
    }

    $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE pdk_id = '".$_GET['id']."' ");
    if(mysqli_num_rows($produk) == 0 ){
        echo '<script>window.location="data-produk.php"</script>';
    }
    $p = mysqli_fetch_object($produk);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Edit [FYS]</title>
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
</head>
<body>
    
    <!-- Header -->
    <?php 
    include 'navbar.php';
    ?>

    <!-- Konten -->
    <div class="section">
        <div class="container">
        <h3>Edit Data</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">                   
                    <select class="input-control" name="kategori" required>
                        <option value="">--Pilih--</option>
                            <?php 
                                $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_id DESC");
                                while($r = mysqli_fetch_array($kategori)){ 
                            ?>
                            <option value="<?php echo $r['kategori_id'] ?>" <?php echo($r['kategori_id'] == $p->kategori_id)? 'selected':''; ?>><?php echo $r['kategori_nama'] ?></option>
                            <?php } ?>
                    </select>

                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p->pdk_nama ?>" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php echo $p->pdk_harga ?>" required>

                    <img src="../asset/foto_motor/<?php echo $p->pdk_gambar ?>" width="300px">
                    <input type="hidden" name="foto" value="<?php echo $p->pdk_gambar ?>">
                    <input type="file" name="gambar" class="input-control">
                    <textarea class="input-control" name="deskripsi" placeholder="deskripsi"><?php echo $p->pdk_deskripsi ?></textarea><br><br>
                    <select class="input-control" name="status">
                        <option value="">--Pilih--</option>
                        <option value="1" <?php echo ($p->pdk_status == 1)? 'selected':''; ?> >Populer</option>
                        <option value="0" <?php echo ($p->pdk_status == 0)? 'selected':''; ?> >Tidak</option>
                    </select>



                    <input type="submit" name="submit" value="Submit">
                </form>
                <?php 
                    if(isset($_POST['submit'])){
                        
                        // data inputan dari form
                        $kategori   = $_POST['kategori'];
                        $nama       = $_POST['nama'];
                        $harga      = $_POST['harga'];
                        $deskripsi  = $_POST['deskripsi'];
                        $status     = $_POST['status'];
                        $foto       = $_POST['foto'];

                        // data gambar baru
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        

                        // jika admin ganti gambar
                        if($filename != ''){

                            $type1 = explode('.', $filename);
                            $type2 = $type1[1];

                            $newname = 'produk'.time().'.'.$type2;

                            // menampung data format file yang diizinkan
                            $tipe_diizinkan = array('jpg','jpeg','png','gif');

                            // validasi format file
                            if(!in_array($type2, $tipe_diizinkan)){
                                // jika format file tidak ada di array
                                echo '<script>alert("Format file tidak diizinkan")</script>';
                            }else{
                                unlink('../asset/foto_motor/'.$foto);
                                move_uploaded_file($tmp_name, '../asset/foto_motor/'.$newname);
                                $namagambar = $newname;
                            }

                        }else{
                            // jika admin tidak ganti bayar
                            $namagambar = $foto;

                        }

                        // query update data produk
                        $update = mysqli_query($conn, "UPDATE tb_produk SET 
                                                    kategori_id = '".$kategori."',
                                                    pdk_nama = '".$nama."',
                                                    pdk_harga = '".$harga."',
                                                    pdk_deskripsi = '".$deskripsi."',
                                                    pdk_gambar = '".$namagambar."',
                                                    pdk_status = '".$status."'
                                                    WHERE pdk_id = '".$p->pdk_id."' ");

                        if($update){
                            echo '<script>alert("Tambah data berhasil")</script>';
                            echo '<script>window.location="data-produk.php"</script>';
                        }else{
                            echo 'gagal '.mysqli_error($conn);
                        }

                    }
                ?>
                
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy: 2022 - FYS</small>
        </div>
    </footer>
    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>