<?php 

    session_start();
    require '../config/config.php';

    if (empty($_SESSION['username'])){
        header('location: index.php');
    } else {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>List Artikel | Digyhomeschooling</title>
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
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


    <div class="container">
        <div class="judul-admin mt-5 pb-3">
            <div class="row">
                <div class="col-sm">
                    <h1>List Artikel</h1>
                </div>
                <div class="col-sm">
                    <div class="float-right mt-2">
                        <a href="tambahartikel.php" class="btn btn-warning btn-orange">Tambah Artikel</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
        <table class="table">
            <thead class="thead-custom">
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Judul Artikel</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody class="tbody-custom">
            <?php 
            
                $sql = mysqli_query($koneksi, "SELECT * FROM article ORDER BY id DESC");
                $no = 1;
                foreach ($sql as $s){
            
            ?>
                <tr>
                    <th scope="row" class="pt-4"><?php echo $no++; ?></th>
                    <td class="pt-4"><?php echo $s['judul'] ?></td>
                    <td class="pt-4"><?php echo $s['tags'] ?></td>
                    <td class="pt-4"><?php echo $s['tanggal_update'] ?></td>
                    <td class="mx-auto">
                        <a href="editartikel.php?i=<?php echo $s['id_article'] ?>" class="btn btn-primary">Edit</a>
                        <button id="<?php echo $s['id_article'] ?>" data-toggle="modal" data-target="#detailArtikel" type="button" class="btn btn-success detail">Detail</button>
                        <a onClick="return confirm('Apakah ingin dihapus?')" href="hapus.php?i=<?php echo $s['id_article'] ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>

    </div>


    <div class="modal fade bd-example-modal-lg" id="detailArtikel" tabindex="-1" role="dialog" aria-labelledby="detailArtikelLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailArtikelLabel">Detail Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalArtikel">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/ajax.js"></script>
</body>

</html>
<?php } ?>