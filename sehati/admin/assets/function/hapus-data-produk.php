<?php 
    include 'koneksi.php';
    $ambil = $conn->query("SELECT * FROM tb_data_produk WHERE pdk_data_id='$_GET[iddp]'");
    $pecah = $ambil->fetch_assoc();
    $fotoproduk = $pecah['pdk_gambar'];
    if (file_exists("../images/produk/$fotoproduk"))
    {
        unlink("../images/produk/$fotoproduk");
    }

    $conn->query("DELETE FROM tb_data_produk WHERE pdk_data_id='$_GET[iddp]'");

    echo "<script>alert('produk terhapus');</script>";
    echo "<script>location='../../index.php?hal=produk';</script>";
?>

