<?php 
    session_start();
    include '../assets/function/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Yoga</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<div class="login-content">
            <form action="" method="POST">
				<img src="../assets/image/kisspng-rishikesh-meditation-yoga-himalayas-clip-art-5b2c522cd3aab5.985864511529631276867.png">
				<h2 class="title">Yoga admin</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<input type="text" name="user" class="input" placeholder="Username" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="password" name="pass" class="input" placeholder="Password" required>
            	   </div>
            	</div>
            	<input type="Submit" name="submit" value="Login" class="btn">
				<!-- <div>
                        <span class="login__account">Silahkan Daftar Disini</span>
                        <span><a href="formregistrasi.php">Daftar</a></span>
                </div> -->
                </form>
                <?php 
						 if(isset($_POST['submit'])){
					
						// menangkap data yang dikirim dari form login
						$user = mysqli_real_escape_string($conn, $_POST['user']);
						$pass = mysqli_real_escape_string($conn, $_POST['pass']);
					
						// menyeleksi data pada tabel admin dengan username dan password yang sesuai
						$data = mysqli_query($conn, "SELECT * FROM admin WHERE username ='$user' and password='$pass'");
					
						// menghitung jumlah data yang ditemukan
						$cek = mysqli_num_rows($data);
					
						if($cek > 0){
							$_SESSION['username'] = $user;
							
							header("location:booking.php");
						}
						else{
							echo '<script>alert("Username atau Password Anda Salah!")</script>';
						}
					}
					?>
        </div>
    </div>

    <script type="text/javascript" src="../admin/js/main.js"></script>
	<script src="../user/sweetalert2/sweetalert2.min.js"></script>
</body>
</html>
