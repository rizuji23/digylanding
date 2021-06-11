<?php 

    require '../controller/admin.php';
    require '../config/config.php';

    if (empty($_SESSION['username'])){
        header('location: index.php');
    } else {

    $id_artikel = mysqli_escape_string($koneksi, htmlspecialchars($_GET['i']));

    $artikel = mysqli_query($koneksi, "SELECT * FROM article WHERE id_article = '$id_artikel'");
    $a = mysqli_fetch_assoc($artikel);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Edit Artikel | Digyhomeschooling</title>
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/summernote-lite.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-tagsinput.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="../assets/img/logo.png" class="logo-navbar" alt=""></a>
            <button class="navbar-toggler" type="button" onclick="openNav()">
                <img src="../assets/img/navbar.png" width="30" alt="">
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="dashboard.php" class="nav-link">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="tambahadmin.php" class="nav-link">
                            Tambah Admin
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="lihatadmin.php" class="nav-link">
                            Lihat Admin
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <a href="dashboard.php">Dashboard</a>
        <a href="tambahadmin.php">Tambah Admin</a>
        <a href="lihatadmin.php">Lihat Admin</a>
        <a href="logout.php">Logout</a>
    </div>


    <?php 
    
        if (isset($_POST['edit'])){
            editartikel($_POST, $id_artikel);
        }

    
    ?>

    <div class="container mt-5">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-judul">
                <div class="form-group">
                    <input type="text" value="<?php echo $a['judul'] ?>" name="judul" placeholder="Tulis judul disini.." class="form-control input-judul">
                </div>

                <div class="form-group">
                    <label for="">Tags</label>
                    <input type="text" name="tags" value="<?php echo $a['tags'] ?>" data-role="tagsinput" />
                    <small>* Ketik , untuk menambah tag.</small>
                </div>

                <div class="form-group">
                    <label for="">Cover</label><br>
                    <img src="../assets/img/cover/<?php echo $a['cover'] ?>" width="200" alt="">
                    <input type="file" name="cover">
                </div>
            </div>

            <textarea id="summernote" name="isi"><?php echo $a['isi'] ?></textarea>

            <div class="form-group mt-3">
                <input type="submit" class="btn btn-warning btn-orange btn-block" value="Edit" name="edit" />
            </div>
        </form>
    </div> 


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/summernote-lite.min.js"></script>
    <script src="../assets/js/moment.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/bootstrap-tagsinput.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>

</html>
<?php } ?>