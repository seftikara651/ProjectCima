<?php

    include "koneksi.php";
    $id = $_GET['id'];
 
    $sql = "DELETE FROM add_schedule WHERE id=$id";
 
    if ($connect->query($sql) === TRUE) {
        header('location:schedule.php');
    } else {
        echo "Gagal Melakukan penghapusan data: " . $connect->error;
    }
 
    $connect->close();
?>