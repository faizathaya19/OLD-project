<?php 
    include '../assets/function/koneksi.php';
    $ambil = $conn->query("SELECT * FROM tb_booking WHERE id_pelanggan='$_GET[idp]'");
    $pecah = $ambil->fetch_assoc();
    $fotoproduk = $pecah['bukti_booking'];
    if (file_exists("../assets/image/bukti_booking/$fotoproduk"))
    {

    }

    $conn->query("DELETE FROM tb_booking WHERE id_pelanggan='$_GET[idp]'");

    echo "<script>alert('produk terhapus');</script>";
    echo "<script>location='booking.php';</script>";
?>

