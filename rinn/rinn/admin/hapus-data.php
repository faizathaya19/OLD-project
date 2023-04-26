<?php 
    include '../function/koneksi.php';
    $ambil = $conn->query("SELECT * FROM tb_produk WHERE pdk_id='$_GET[idp]'");
    $pecah = $ambil->fetch_assoc();
    $fotoproduk = $pecah['pdk_gambar'];
    if (file_exists("../asset/foto_motor/$fotoproduk"))
    {
        unlink("../asset/foto_motor/$fotoproduk");
    }

    $conn->query("DELETE FROM tb_produk WHERE pdk_id='$_GET[idp]'");

    echo "<script>alert('produk terhapus');</script>";
    echo "<script>location='data-produk.php';</script>";
?>

