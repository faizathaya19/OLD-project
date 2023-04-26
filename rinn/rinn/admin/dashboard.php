<?php 
// koneksi ke database
session_start();
    include '../function/koneksi.php';
    if(!isset($_SESSION['username'])){
        echo '<script>window.location="admin.php"</script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name= "viewport" content= "width=device-width, initial-scale=1">
	<title>admin [FYS]</title>
	<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<?php
		include 'navbar.php';
	?>


	<!-- content -->
	<div class = "section">
		<div class="container">
			<h3>Dashboard</h3>
			<div class="box">
				<h4>Selamat Datang </h4>
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