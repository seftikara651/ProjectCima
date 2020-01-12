<?php
include "koneksi.php";

$nama   = $_POST['nama'];
$email   = $_POST['email'];
$username   = $_POST['username'];
$password   = $_POST['password'];

$query = "INSERT INTO pengguna(nama,email,username,password)VALUES('".$nama."','".$email."','".$username."','".$password."')";

		try {
			$sql=mysqli_query($connect,$query);
		} catch (exception $ex) {
			echo "
			<script>
				console.log(anjay '".$ex."');
			</script>
			";
		}

		echo "
		<script>
			console.log('".$nama." ".$email."".$username."".$password."');
		</script>
		";
		
		echo "the fuck";
		echo $sql;
		echo $query;

		if($sql){
			header("location: login.php");
		}else{
			echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database";
			echo "<br><a href='form.php'>Kembali ke form</a>";
		}
?>