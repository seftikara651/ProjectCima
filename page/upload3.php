<?php 
	
include "koneksi.php";

	set_time_limit(0);
	date_default_timezone_set('Asia/Jakarta');

	require __DIR__.'/../vendor/autoload.php';

	 $query_user = "SELECT * FROM user";
	 echo $query_user;
	 $user_array = array();
	 $sql_user = mysqli_query($connect, $query_user);
	 print_r($sql_user);
	 while ($row = mysqli_fetch_assoc($sql_user)) {
	   	$user_array[$row['id']]=['username' => $row['username'],'password' => $row['password']];
	   }  
     $query = "SELECT * FROM tabel_posting where tanggal='".date("Y-m-d")."' and jam like '".date("H:i")."%'"; 
     echo $query;
     echo "\n";
     $sql = mysqli_query($connect, $query);
     print_r($sql) ;
     // $row = mysqli_num_rows($sql);
     while ($row = mysqli_fetch_assoc($sql)) {

     	$cap = $row['caption'];
		$tgl = $row['tanggal'];
		$jm = $row['jam'];
		$nama = $row['nama'];

		$id_user = $row['id_user'];
		$username = $user_array[$id_user]['username'];
		$password = $user_array[$id_user]['password'];
		$debug = true;
		$truncatedDebug = false;

		$photoFilename =__DIR__.'/../img/'.$row['nama'];
		$captionText = $cap;

     	\InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
		$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);

		try {
		    $ig->login($username, $password);
		} catch (\Exception $e) {
		    echo 'Something went wrong: '.$e->getMessage()."\n";
		    exit(0);
		}
		try {
		    $photo = new \InstagramAPI\Media\Photo\InstagramPhoto($photoFilename);
		    $ig->timeline->uploadPhoto($photo->getFile(), ['caption' => $captionText]);
		    
		    $query = "INSERT INTO tabel_history(id_pengguna,caption,nama,tanggal,jam)VALUES('".$id_user."','".$cap."','".$nama."','".$tgl."','".$jm."')";
			$sql=mysqli_query($connect,$query);
			
			if($sql){
				echo "berhasil";
			}else{
				echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database";
			}	
			} catch (\Exception $e) {
			    echo 'Something went wrong: '.$e->getMessage()."\n";
			}
     }

?>