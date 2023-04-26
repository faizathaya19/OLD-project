
<?php

include "koneksi.php";
if(isset($_POST['submit'])) {
    function valid_email($email){
        return !!filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    $email = ucwords($_POST['email']); // menggunakan method POST email
    $nama = ucwords($_POST['nama']);
    $password = ucwords($_POST['password']);

    if(valid_email($email)){
        //Cek terlebih dulu di Mysqli
        $cek_email    ="SELECT * FROM tb_p_user WHERE id_p_user='$email'";
        $hasil        =mysqli_query($conn, $cek_email) or die (mysqli_error($conn));
            if (mysqli_num_rows($hasil) > 0){
                echo "Oops! Email ini telah digunakan sebelumnya. Email sudah pernah digunakan ...";
                echo "<br><button type='button' onclick=location.href='../../daftar.php'>Back</button>";
            }
            else{
                $insert = mysqli_query($conn, "INSERT INTO tb_p_user VALUES (
                    '',
                    '$nama','$password','user','$email') ");
                        if($insert){
                            echo "<script>alert('daftar berhasil');</script>";
                            echo "<script>location='../../login.php';</script>";
                        }else{
                            echo "<script>alert('daftar gagal');</script>";
                            echo "<script>location='../../daftar.php';</script>";
                        }
            }
    }
    else{
        echo "Oops! Email tidak ter-validasi !";
    }
}
?>