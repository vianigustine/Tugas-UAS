<?php
$host	="localhost";
$user	="root";
$pass	="12345";
$db		="project";

$conn	=mysqli_connect($host,$user,$pass,$db);
	if ($conn==false) {
		echo "koneksi server gagal";
    die();
	}else{
		//echo "koneksi server berhasil";
	}

 ?>
