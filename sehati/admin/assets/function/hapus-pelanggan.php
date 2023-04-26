<?php 
    include 'koneksi.php';

    $conn->query("DELETE FROM tb_p_user WHERE id_user='$_GET[idp]'");

    echo "<script>alert('pelanggan terhapus');</script>";
    echo "<script>location='../../index.php?hal=user';</script>";
?>

