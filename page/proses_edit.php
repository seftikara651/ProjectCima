<?php
    
    include "koneksi.php";

    $id = $_POST['id'];
    $cap = $_POST['caption'];
    $tgl = $_POST['tanggal'];
    $jm = $_POST['jam'];

    $nama_file = $_FILES['gambar']['name'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];

    $path = "img/".$nama_file;

    $sql = "UPDATE add_schedule SET caption = '$cap', nama = '$nama_file', tanggal = '$tgl', jam = '$jm' WHERE id=$id";
        if ($connect->query($sql) === TRUE) {
            header ("Location: schedule.php");
        } else {
            echo "Gagal Melakukan Perubahan: " . $connect->error;
        }

    $connect->close();
?>