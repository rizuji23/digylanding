<?php 

    require '../config/config.php';

    $password = password_hash('uji123', PASSWORD_DEFAULT);
    $s = mysqli_query($koneksi, "INSERT INTO admin VALUES(NULL, 'Rizki Fauzi', 'uji', '". $password ."', '" . $tanggal. "', '" . $tanggal. "')");
    echo $password;

    if ($s){
        echo "b";
    } else {
        echo "g";
    }

?>