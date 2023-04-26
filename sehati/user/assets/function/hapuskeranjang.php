<?php 
    session_start();
    $id_pdk = $_GET["id"];
    unset($_SESSION["keranjang"][$id_pdk]);

    echo "<script>alert('Produk dihapus dari keranjang');</script>";
    echo "<script>location='../../keranjang.php';</script>";
?>