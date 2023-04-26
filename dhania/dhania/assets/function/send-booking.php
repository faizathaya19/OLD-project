<?php  

include 'koneksi.php'; 



if(isset($_POST['submit'])){


  $notelp = trim(mysqli_real_escape_string($conn, $_POST['notelepon']));


  $query = mysqli_query($conn, "SELECT id_pelanggan FROM tb_yoga WHERE id_pelanggan = '$notelp'");

  if(mysqli_num_rows($query) > 0){
    echo "<script>alert('Nomer sudah terdaftar');</script>";
    echo "<script>location='../../daftar-booking.php';</script>";
  }else{

    $insert = mysqli_query($conn, "INSERT INTO tb_booking
                              VALUES('$notelp','$_POST[nama]','$_POST[tempat]','$_POST[tanggallahir]','$_POST[jeniskelamin]','$_POST[email]','$_POST[kelas]','$_POST[pembayaran]','$_POST[tgl_booking]','belum_transfer.png',NOW(),NOW())");
                           
                           $query = "INSERT INTO tb_yoga set  id_pelanggan = '$notelp'";
                           $insert2 = mysqli_query( $conn, $query);
if($insert.$insert2){
  echo "<script>alert('Berhasil Booking');</script>";
  echo "<script>location='../../daftar-booking.php';</script>";
}else{
  echo "<script>alert('gagal Booking');</script>";
  echo "<script>location='../../index.php';</script>";
}
}
}
                    ?>