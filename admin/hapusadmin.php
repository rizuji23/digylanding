<?php 


    require '../config/config.php';
    require '../system/alert.php';

    $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_GET['ih']));

    if (isset($id)){
        $sql = mysqli_query($koneksi, "DELETE FROM admin WHERE id = '$id'");

        if ($sql){
            header('location: lihatadmin.php');
        } else {
            echo alert(mysqli_error($koneksi), "lihatadmin.php");
        }
    }


?>