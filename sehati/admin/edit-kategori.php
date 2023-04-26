<?php
    session_start();
    include 'assets/function/koneksi.php';

    $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori WHERE ktgr_id = '".$_GET['idk']."' ");
    if(mysqli_num_rows($kategori) == 0){
    }
    $k = mysqli_fetch_object($kategori);
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
        <h3 class="mb-5">Edit kategori</h3>
        <form action="" method="POST" enctype="multipart/form-data">
        <h5>Saat ini : <?php echo $k->ktgr_nama ?></h5>
        <h5>Ganti :</h5>
        <input type="text" class="form-control my-2" name="kategori"  placeholder="Kategori edit">
        <button type="submit" name="submit" value="submit" class="btn btn-dark">Ganti</button>
        </form>
        <?php
                    if(isset($_POST['submit'])) {

                        $kategori = ucwords($_POST['kategori']);

                        $update = mysqli_query($conn, "UPDATE tb_kategori SET
                                                ktgr_nama = '".$kategori."' 
                                                WHERE ktgr_id = '".$k->ktgr_id."' ");
                        if($update) {;
                            echo '<script>alert("Edit kategori berhasil")</script>';
                            echo '<script>window.location="index.php?hal=kategori"</script>';
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