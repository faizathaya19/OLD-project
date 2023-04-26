<?php
    session_start();
    include '../function/koneksi.php';
    if(!isset($_SESSION['username'])){
        echo '<script>window.location="admin.php"</script>';
    }
?>
<!DOCTYPE html>
<html></html>
<head>
	<meta charset="utf-8">
	<meta name= "viewport" content= "width=device-width, initial-scale=1">
	<title>Admin [FYS]</title>
	<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<?php
        include 'navbar.php';
    ?>

	<!-- content -->
	<div class="section">
		<div class="container1">
			<h3>Data Produk</h3>
			<div class="box1">
                <a class="button" href="tambah-produk.php">Tambah Produk</a>
				<table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="100px">No</th>
                            <th width="95px">Kategori</th>
                            <th>Merek</th>
                            <th width="100px">Nama Produk</th>
                            <th>Harga</th>
                            <th width="50px">CC</th>
                            <th>Mesin</th>
                            <th width="80px">Transmisi</th>
                            <th width="60px">Tangki</th>
                            <th width="80px">Gambar</th>
                            <th>Aksi</th>
                            <th width="80px">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $produk = mysqli_query($conn, "SELECT * FROM tb_produk LEFT JOIN tb_kategori USING (kategori_id) ORDER BY pdk_id DESC");
                            if(mysqli_num_rows($produk) > 0){

                            
                            while($p = mysqli_fetch_array($produk)){
                             
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $p['kategori_nama'] ?></td>
                            <td><?php echo $p['pdk_merek'] ?></td>
                            <td><?php echo $p['pdk_nama'] ?></td>
                            <td>Rp. <?php echo number_format($p['pdk_harga']) ?></td>
                            <td><?php echo $p['pdk_cc'] ?></td>
                            <td><?php echo $p['pdk_mesin'] ?></td>
                            <td><?php echo $p['pdk_transmisi'] ?></td>
                            <td><?php echo $p['pdk_tangki'] ?></td>
                            <td><a href="../asset/foto_motor/ $p['pdk_gambar'] ?>" target="_blank"> <img src="../asset/foto_motor/<?= $p['pdk_gambar'] ?>" width="150"></a></td>
                            <td>
                                <a class="button-e" href="edit-produk.php?id=<?php echo $p['pdk_id'] ?>">Edit</a>
                                <br>
                                <br>
                                <a class="button-h" href="hapus-data.php?idp=<?php echo $p['pdk_id'] ?>" onclick="return confirm('Apakah ingin dihapus?')">Hapus</a>
                            </td>
                            <td>
                                <?php echo ($p['pdk_status']) == 1? 'populer':'tidak';  ?>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                            <tr>
                                <td colspan="7">Tidak ada data</td>
                            </tr>


                            <?php } ?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; FYS</small>
		</div>
	</footer>
</body>
</html>