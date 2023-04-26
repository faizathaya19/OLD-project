<?php 
    include 'koneksi.php';

    $conn->query("DELETE FROM tb_kategori WHERE ktgr_id='$_GET[idk]'");

    echo "<script>alert('kategori terhapus');</script>";
    echo "<script>location='../../index.php?hal=kategori';</script>";
?>

