<?php
    include "koneksi.php";
                    if(isset($_POST['kirim-kategori'])) {

                        $nama = ucwords($_POST['nama']);

                        $insert = mysqli_query($conn, "INSERT INTO tb_kategori VALUES (
                                                '',
                                                '".$nama."') ");
                        if($insert) {;
                            echo '<script>alert("Tambah kategori berhasil")</script>';
                            echo '<script>window.location="../../index.php?hal=kategori"</script>';
                        }else{
                            echo 'gagal '.mysqli_error($conn);
                        }

                    }
                ?>