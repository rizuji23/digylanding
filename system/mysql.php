<?php 


function connectmysql($host, $user, $pass, $db){
    mysqli_connect($host, $user, $pass, $db);
}

function query($koneksi, $query){
    mysqli_query($koneksi, $query);
}

?>