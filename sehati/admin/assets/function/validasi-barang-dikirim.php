<?php
    include "koneksi.php";
                    if(isset($_POST['barang-dikirim'])) {
                        $pemby = mysqli_query($conn,"SELECT * FROM tb_pembelian 
                        JOIN tb_pem_pdk ON tb_pembelian.pem_id = tb_pem_pdk.pem_id 
                        JOIN tb_data_area ON tb_pembelian.area_id = tb_data_area.area_id 
                        JOIN tb_p_user ON tb_pembelian.id_p_user = tb_p_user.id_p_user 
                            WHERE tb_pembelian.pem_id = '$_GET[idpem]'");
                            $depemby =  mysqli_fetch_assoc($pemby);

                        $update = mysqli_query($conn, "UPDATE tb_pembelian SET pem_status_pengiriman = 'Barang Dikirim' WHERE pem_id = '$_GET[idpem]' ");

                        if($update) {;
                            echo '<script>alert("Barang diKirim")</script>';
                            echo '<script>window.location="../../index.php?hal=pembelian"</script>';
                        }else{
                            echo 'gagal '.mysqli_error($conn);
                        }

                    }
                ?>