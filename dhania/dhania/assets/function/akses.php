<?php
ob_start();
session_start();
    include "koneksi.php";
    $id_pelanggan       = mysqli_real_escape_string($conn, $_POST['ponsel']);
    $op             = $_GET['id'];

        if($op=="in"){
        $sql = mysqli_query($conn, "SELECT * FROM tb_yoga WHERE id_pelanggan='$id_pelanggan' ");
        if(mysqli_num_rows($sql)==1){
            $qry = mysqli_fetch_array($sql);
            $_SESSION['id_user']    = $qry['id_user'];
            $_SESSION['id_pelanggan']    = $qry['id_pelanggan'];

            

                header("location:../../booking-page.php");

        }
        else{
            ?>
            <script language="JavaScript">
                alert('Oops! nomor belum terdaftar ...');
                document.location='../../daftar-booking.php';
            </script>
            <?php
        }
    }
    else if($op=="out"){
        unset($_SESSION['id_pelanggan']);

        header("location:../../index.php");
    }
?>