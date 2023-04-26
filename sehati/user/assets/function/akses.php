<?php
ob_start();
session_start();
    include "koneksi.php";
    $id_user        = mysqli_real_escape_string($conn, $_POST['email']);
    $password        = mysqli_real_escape_string($conn, $_POST['password']);
    $op             = $_GET['op'];

    if($op=="in"){
        $sql = mysqli_query($conn, "SELECT * FROM tb_p_user WHERE id_p_user='$id_user' AND password='$password'");
        if(mysqli_num_rows($sql)==1){
            $qry = mysqli_fetch_array($sql);
            $_SESSION['id_user']    = $qry['id_user'];
            $_SESSION['nama_user']    = $qry['nama_user'];
            $_SESSION['hak_akses']    = $qry['hak_akses'];
            $_SESSION['id_p_user']    = $qry['id_p_user'];

            
            if($qry['hak_akses']=="user"){
                header("location:../../index.php");
            }
        }
        else{
            ?>
            <script language="JavaScript">
                alert('Oops! Login Failed. Username & password tidak sesuai ...');
                document.location='../../login.php';
            </script>
            <?php
        }
    }
    else if($op=="out"){
        unset($_SESSION['id_p_user']);
        unset($_SESSION['hak_akses']);
        unset($_SESSION["keranjang"]);
        header("location:../../index.php");
    }
?>