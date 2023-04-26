<?php 
    // membuat koneksi database
    $conn = mysqli_connect("localhost:8080", "root", "", "db_sehati");
    if(!$conn){
        echo "Koneksi tidak berhasil...!";
       }
       ?>