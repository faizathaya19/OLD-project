<?php   
session_start();

include '../assets/function/koneksi.php';


if(!isset($_SESSION['username'])){
    echo '<script>window.location="admin.php"</script>';}
?>


<!DOCTYPE html>
<html></html>
<head>
	<meta charset="utf-8">
	<meta name= "viewport" content= "width=device-width, initial-scale=1">
	<title>Admin [Yoga]</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="booking.php">yoga</a></h1>
			<ul>
				<li>
                    <a href="booking.php">booking data</a>
                </li>
				<li>
                    <a href="Logout.php">Logout</a>
                </li>
			</ul>
		</div>
</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Data Booking</h3>
			<div class="box1">
             
				<table border="1" cellspacing="0" class="table ">
                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th width="150px">Nama Pelanggan</th>
                            <th width="50px">jenis kelamin</th>
                            <th width="200px">tempat tanggal lahir pelanggan</th>
                            <th width="200px">email</th>   
                            <th width="80px">No telepon</th>                      
                            <th width="80px">kelas</th>
                            <th width="130px">Harga kelas</th>
                            <th width="120px">pembayaran</th>
                            <th width="120px">Total yang di bayar</th>
                            <th width="150px">tanggal booking</th>
                            <th>bukti transfer</th>
                            <th width="80px">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $produk = mysqli_query($conn, "SELECT * FROM tb_booking LEFT JOIN tb_kelas USING (kelas_id) ORDER BY id_pelanggan DESC");
                            if(mysqli_num_rows($produk) > 0){

                            
                            while($p = mysqli_fetch_array($produk)){
                             
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $p['nama_pelanggan'] ?></td>
                            <td><?php echo ($p['jk_pelanggan']) == 1? 'laki-laki':'perempuan';  ?></td>
                            <td><?php echo $p['tempat_pelanggan'] ?>,<?php echo $p['tl_pelanggan'] ?></td>
                            <td><?php echo $p['email_pelanggan'] ?></td>
                            <td><?php echo $p['id_pelanggan'] ?></td>
                            <td><?php echo $p['kelas_nama'] ?></td>
                            <td>Rp. <?php echo number_format($p['kelas_harga']) ?></td>  
                            <td><?php echo ($p['pembayaran_pelanggan']) == 1? 'full' :'(DP 50%)';  ?></td>
                            <td>Rp. <?php echo number_format($p['kelas_harga']/$p['pembayaran_pelanggan']) ?></td>
                            <td><?php echo $p['tgl_booking'] ?></td>
                            <td><a href="../assets/image/bukti_booking/<?php $p['bukti_booking'] ?>" target="_blank"> <img src="../assets/image/bukti_booking/<?= $p['bukti_booking'] ?>" width="250"></a></td>
                            <td>
                                <br>
                                <br>
                                <a class="button-h" href="hapus-data.php?idp=<?php echo $p['id_pelanggan'] ?>" onclick="return confirm('Apakah ingin dihapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                            <tr>
                                <td colspan="7">Tidak ada data</td>
                            </tr>
                            <?php }?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; Yoga</small>
		</div>
	</footer>
</body>
</html>