<?php  
    include "koneksi.php";

                    

                    if(isset($_POST['kirim-data-produk'])){

                        $ktgr = ucwords($_POST['kategori']);
                        $pdk = ucwords($_POST['produk']);
                        $ukuran = ucwords($_POST['ukuran']);
                        $harga = ucwords($_POST['harga']);
                        $deskripsi = ucwords($_POST['deskripsi']);

                        $folder = "../images/produk/";
                        $nama_file = $_FILES['gambar']['name'];
                        $nama_file_tmp = $_FILES['gambar']['tmp_name'];
                        $namafiks = date("YmdHis").$nama_file;
                        move_uploaded_file($nama_file_tmp, $folder.$namafiks);
                        $insert = mysqli_query($conn, "INSERT INTO tb_data_produk 
                                                        VALUES('','$ktgr','$pdk','$ukuran','$harga','$deskripsi','$namafiks')");
                        if($insert){
                            echo "<script>alert('data produk Berhasil Disimpan');</script>";
                            echo "<script>location='../../index.php?hal=produk';</script>";
                        }else{
                            echo "<script>alert('data produk Gagal Disimpan');</script>";
                            echo "<script>location='../../index.php?hal=produk';</script>";
                        }
                    }
                    ?>