<h2>Selamat datang Admin</h2>
<?php 
ob_start();
session_start();
include "assets/function/koneksi.php";

if(!isset($_SESSION['id_admin'])){
    echo '<script>window.location="login.php"</script>';
}
if($_SESSION['hak_akses']!="admin"){
    die("<b>Oops!</b> Access Failed.
        <p>Anda Bukan admin.</p>
        <button type='button' onclick=location.href='login.php'>Back</button>");
} 
?>