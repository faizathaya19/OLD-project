<?php
    include "koneksi.php";
                    if(isset($_POST['batal-orderan'])) {
                        $pemby = mysqli_query($conn,"SELECT * FROM tb_pembelian 
                        JOIN tb_pem_pdk ON tb_pembelian.pem_id = tb_pem_pdk.pem_id 
                        JOIN tb_data_area ON tb_pembelian.area_id = tb_data_area.area_id 
                        JOIN tb_p_user ON tb_pembelian.id_p_user = tb_p_user.id_p_user 
                            WHERE tb_pembelian.pem_id = '$_GET[idpem]'");
                            $depemby =  mysqli_fetch_assoc($pemby);

                        $delete = mysqli_query($conn, "DELETE FROM tb_pembelian WHERE pem_id = '$_GET[idpem]' ");
                        $delete = mysqli_query($conn, "DELETE FROM tb_pembayaran WHERE pem_id = '$_GET[idpem]' ");
                        $delete = mysqli_query($conn, "DELETE FROM tb_pem_pdk WHERE pem_id = '$_GET[idpem]' ");

                        if($delete) {;
                            echo '<script>alert("Orderan Dibatalkan")</script>';
                            echo '<script>window.location="../../index.php?hal=pembelian"</script>';
                        }else{
                            echo 'gagal '.mysqli_error($conn);
                        }

                    }
                ?>