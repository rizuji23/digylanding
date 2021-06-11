<?php 


    require '../config/config.php';
    require '../system/alert.php';

    $id_artikel = mysqli_real_escape_string($koneksi, htmlspecialchars($_GET['i']));

    if (isset($id_artikel)){
        $sql = mysqli_query($koneksi, "DELETE FROM article WHERE id_article = '$id_artikel'");

        if ($sql){
            header('location: dashboard.php');
        } else {
            echo alert(mysqli_error($koneksi), "dashboard.php");
        }
    }


?>