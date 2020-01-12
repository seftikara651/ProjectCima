<?php

include "koneksi.php";

session_start();
if(!isset($_SESSION['username'])) {
   header('location:../index.php'); 
} else { 
   $user = $_SESSION['username']; 
   $password = $_SESSION['password']; 
}

$user_id=$_SESSION['user_id'];
$cap = $_POST['caption'];
$tgl = $_POST['tanggal'];
$jam = $_POST['jam'];
$nama_file = $_FILES['gambar']['name'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];

$path = "../img/".$nama_file;

if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
	 if(move_uploaded_file($tmp_file, $path)){ 
		$query = "INSERT INTO add_schedule(id_pengguna,caption,nama,tanggal,jam)VALUES('".$user_id."','".$cap."','".$nama_file."','".$tgl."','".$jam."')";
		$sql=mysqli_query($connect,$query);
		
		if($sql){
			header("location: schedule.php");
		}else{
			echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database";
			echo "<br><a href='form.php'>Kembali ke form</a>";
		}	
	 }else{      // Jika gambar gagal diupload, Lakukan :      
	 echo "Maaf, Gambar gagal untuk diupload.";      
	 }
}else{
	// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :  
	echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";  
}
?>