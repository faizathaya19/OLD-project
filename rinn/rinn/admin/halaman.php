
<?php 
session_start();
    include '../function/koneksi.php';
    if(!isset($_SESSION['username'])){
        echo '<script>window.location="dashboard.php"</script>';
    }
?>