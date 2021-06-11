<?php 

    session_start();
    require '../config/config.php';
    require '../system/alert.php';

    function login($data){
        global $koneksi;

        $username = mysqli_real_escape_string($koneksi, htmlspecialchars($data['username']));
        $password = mysqli_real_escape_string($koneksi, htmlspecialchars($data['password']));

        $login = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username'");
        $l = mysqli_fetch_assoc($login);

        if (empty($username) || empty($password)){
            echo alert("Username dan password harus diisi!", "index.php");
        }
        if ($l['username'] == $username && password_verify($password, $l['password'])) {
            $_SESSION['username'] = $username;
            header('Location:dashboard.php');
        } else {
           echo alert("Username Atau Password Salah!!", "index.php");
        }

    }


    function uploadartikel($data){
        global $koneksi;
        global $tanggal;

        $judul = mysqli_real_escape_string($koneksi, htmlspecialchars($data['judul']));
        $tags = mysqli_real_escape_string($koneksi, htmlspecialchars($data['tags']));
        $cover = $_FILES['cover']['name'];
        $isi = mysqli_real_escape_string($koneksi, $data['isi']);

       
        $cover_tmp = $_FILES['cover']['tmp_name'];

        $id_article = uniqid();

        $extensions = explode('.', $cover);
        $extensions = strtolower(end($extensions));

        if ($cover_tmp != ""){
            $newName = uniqid();
            $newName .= '.';
            $newName .= $extensions;
            $dir = "/home/runcloud/webapps/digylandingpage/assets/img/cover/" . $newName;

            if (move_uploaded_file($cover_tmp, $dir)){
                $sql = mysqli_query($koneksi, "INSERT INTO article VALUES(NULL, '$id_article','$judul', '$tags', '$newName', '$isi', '$tanggal', '$tanggal')");

                if ($sql){
                    echo alert("Artikel disimpan...", "dashboard.php");
                } else {
                    echo alert("SQL INSERT gagal!", "");
                }
            } else {
                echo alert("Gagal memindahkan cover!!", "");
            }
            
        }
    }

    function editartikel($data, $id_article){
        global $koneksi;
        global $tanggal;

        $judul = mysqli_real_escape_string($koneksi, htmlspecialchars($data['judul']));
        $tags = mysqli_real_escape_string($koneksi, htmlspecialchars($data['tags']));
        $isi = mysqli_real_escape_string($koneksi, $data['isi']);

        if (!empty($data['cover'])){
            $cover = $_FILES['cover']['name'];
            $cover_tmp = $_FILES['cover']['tmp_name'];

            $extensions = explode('.', $cover);
            $extensions = strtolower(end($extensions));

            if ($cover_tmp != ""){
                $newName = uniqid();
                $newName .= '.';
                $newName .= $extensions;
                $dir = "/home/runcloud/webapps/digylandingpage/assets/img/cover/" . $newName;

                if (move_uploaded_file($cover_tmp, $dir)){
                    $sql = mysqli_query($koneksi, "UPDATE article SET judul = '$judul', tags = '$tags', cover = '$newName', isi = '$isi', tanggal_update = '$tanggal' WHERE id_article = '$id_article'");

                    if ($sql){
                        echo alert("Artikel disimpan...", "dashboard.php");
                    } else {
                        echo alert("SQL INSERT gagal!", "");
                    }
                } else {
                    echo alert("Gagal memindahkan cover!!", "");
                }
            }
        } else {
            $sql2 = mysqli_query($koneksi, "UPDATE article SET judul = '$judul', tags = '$tags', isi = '$isi', tanggal_update = '$tanggal' WHERE id_article = '$id_article'");
            
            if ($sql2){
                echo alert("Artikel diedit...", "dashboard.php");
            } else {
                echo alert(mysqli_error($koneksi, "editartikel.php?i=$id_article"));
            }
        }

    }


    function tambahadmin($data){
        global $koneksi;
        global $tanggal;

        $nama_admin = mysqli_real_escape_string($koneksi, htmlspecialchars($data['nama_admin']));
        $username = mysqli_real_escape_string($koneksi, htmlspecialchars($data['username']));
        $password = mysqli_real_escape_string($koneksi, htmlspecialchars($data['password']));

        $pass = password_hash($password, PASSWORD_DEFAULT);
        $s = mysqli_query($koneksi, "INSERT INTO admin VALUES(NULL, '$nama_admin', '$username', '". $pass ."', '" . $tanggal. "', '" . $tanggal. "')");
    
        if ($s){
            echo alert('Berhasil ditambah...', 'lihatadmin.php');
        } else {
            echo alert(mysqli_error($koneksi), 'lihatadmin.php');
        }

    }


    function editadmin($data, $id){
        global $koneksi;
        global $tanggal;

        $nama_admin = mysqli_real_escape_string($koneksi, htmlspecialchars($data['nama_admin']));
        $username = mysqli_real_escape_string($koneksi, htmlspecialchars($data['username']));
        $password = mysqli_real_escape_string($koneksi, htmlspecialchars($data['password']));

        if (empty($password)){
            $s = mysqli_query($koneksi, "UPDATE admin SET nama_admin = '$nama_admin', username = '$username' WHERE id = '$id'");
        
            if ($s){
                echo alert('Berhasil diedit...', 'lihatadmin.php');
            } else {
                echo alert(mysqli_error($koneksi), 'lihatadmin.php');
            }
        } else {

            $pass = password_hash($password, PASSWORD_DEFAULT);
            $s = mysqli_query($koneksi, "UPDATE admin SET nama_admin = '$nama_admin', username = '$username', password = '$pass' WHERE id = '$id'");
        
            if ($s){
                echo alert('Berhasil diedit...', 'lihatadmin.php');
            } else {
                echo alert(mysqli_error($koneksi), 'lihatadmin.php');
            }
        }
    }
?>