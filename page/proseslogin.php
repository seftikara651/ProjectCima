<?php
include 'koneksi.php';
$username   = $_POST['username'];
$password   = $_POST['password'];
$cek        = mysqli_query($connect, "select * from pengguna where username='$username' and password='$password'");
$result   = mysqli_num_rows($cek);
if($result>0){
    $user = mysqli_fetch_array($cek);
    session_start();
    $_SESSION['username'] = $user['username'];
    $_SESSION['password'] = $user['password'];
    $_SESSION['user_id'] = $user['id'];
    header("location:home.php");
}else{
    header("location:login.php");
}
?>