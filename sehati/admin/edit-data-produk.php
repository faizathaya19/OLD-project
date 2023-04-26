<?php
    session_start();
    include 'assets/function/koneksi.php';

    $produkdata = mysqli_query($conn, "SELECT * FROM tb_data_produk JOIN tb_produk ON tb_data_produk.pdk_id=tb_produk.pdk_id JOIN tb_kategori ON tb_data_produk.ktgr_id=tb_kategori.ktgr_id WHERE pdk_data_id = '".$_GET['idpp']."' ");
    if(mysqli_num_rows($produkdata) == 0){
    }
    $p = mysqli_fetch_object($produkdata);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title></title>
  </head>
  <body>


<!-- hero start -->
<div class="container" style="margin:auto ;">
    <div class="top-area shadow p-3 mb-5 bg-body rounded">
  <div class="row align-items-center justify-content-center p-5">
    <div class="col-lg-6 col-md-12 col-12">
        <h3 class="mb-5">Edit Produk</h3>
        <form action="" method="POST" enctype="multipart/form-data">
        <h5>Saat ini : </h5>
        <h6>Kategori :<?php echo $p->ktgr_nama ?></h6>
        <h6>Produk :<?php echo $p->pdk_nama ?></h6>
        <h6>Ukuran :<?php echo $p->pdk_ukuran ?></h6>
        <h6>Harga : Rp.<?php echo number_format($p->pdk_harga) ?></h6>
        <h6>Deskripsi :<?php echo $p->pdk_deskripsi ?></h6>
        <img src="assets/images/produk/<?php echo $p->pdk_gambar ?>" alt="">
        <h5 class="mt-5">Ganti :</h5>
        <input type="text" class="form-control my-2" name="produk"  placeholder="Produk">
        <input type="text" class="form-control my-2" name="ukuran"  placeholder="ukuran">
        <input type="text" class="form-control my-2" name="harga"  placeholder="harga">
        <input type="text" class="form-control my-2" name="deskripsi"  placeholder="deskripsi">
        <input type="hidden" name="foto" value="<?php echo $p->pdk_gambar?>">
        <input type="file" class="form-control my-2"  name="gambar" placeholder="gambar"> 

        <button type="submit" name="submit" value="submit" class="btn btn-dark">Ganti</button>
        </form>
        <?php
                    if(isset($_POST['submit'])) {

                      $produk = ucwords($_POST['produk']);
                        $ukuran = ucwords($_POST['ukuran']);
                        $harga = ucwords($_POST['harga']);
                        $deskripsi = ucwords($_POST['deskripsi']);
                        $foto       = $_POST['foto'];
                         // data gambar yang baru
                         $filename = $_FILES['gambar']['name'];
                         $tmp_name = $_FILES['gambar']['tmp_name'];
                         
                         
     
 
                         // jika admin ganti gambar
                         if($filename != ''){
                             $type1 = explode('.', $filename);
                             $type2 = $type1[1];
         
                             $newname = 'produk_'.time().'.'.$type2;
 
                             //    menampung data format file yang diizinkan
                             $tipe_diizinikan = array('jpg','jpeg','png','gif');
 
                             //    validasi format file
                             if(!in_array($type2, $tipe_diizinikan)) {
                                 // jika format file tidak ada di dalam tipe yang diizinkan
                                 echo '<script>alert("Format file tidak diizinkan")</script>';
 
                             }else{
                                 unlink('assets/images/produk/'.$foto); 
                                 move_uploaded_file($tmp_name, 'assets/images/produk/'.$newname);
                                 $namagambar = $newname;
 
                             }
 
                         }else{
                             // jika admin tidak ganti gambar
                             $namagambar = $foto;
 
                         }

                        $update = mysqli_query($conn, "UPDATE tb_data_produk SET
                                                pdk_nama = '".$produk."' ,
                                                pdk_ukuran = '".$ukuran."' ,
                                                pdk_harga = '".$harga."' ,
                                                pdk_deskripsi = '".$deskripsi."' ,
                                                pdk_gambar = '".$namagambar."' 
                                                WHERE pdk_data_id = '".$p->pdk_data_id."' ");
                        if($update) {;
                            echo '<script>alert("Edit Data Produk berhasil")</script>';
                            echo '<script>window.location="index.php?hal=produk"</script>';
                        }else{
                            echo 'gagal '.mysqli_error($conn);
                        }

                    }
                ?>
    </div>
  </div>
  </div>
</div>
<!-- hero end -->


        


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