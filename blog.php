<?php 
    require 'config/config.php';
    $article = mysqli_escape_string($koneksi, htmlspecialchars($_GET['article']));

    $ar = mysqli_query($koneksi, "SELECT * FROM article WHERE id_article = '$article'");

    $a = mysqli_fetch_assoc($ar);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo $a['judul'] ?> | Digyhomeschooling – Karakter, Kreatif, Inovasi Digital</title>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/aos.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="https://digyhomeschooling.id/"><img src="assets/img/logo.png" class="logo-navbar" alt=""></a>
            <button class="navbar-toggler" type="button" onclick="openNav()">
                <img src="assets/img/navbar.png" width="30" alt="">
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="https://digyhomeschooling.id/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="article.php">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://digyhomeschooling.id/">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://kelasvirtual.digyhomeschooling.id/">Kelas Zoom</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pembelajar
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="https://siswa.edulogy.id/">Siswa</a>
                            <a class="dropdown-item" href="https://guru.edulogy.id/">Guru</a>
                            <a class="dropdown-item" href="https://ujian.edulogy.id/">Ujian</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="http://product.digyhomeschooling.id/daftar-kelas/">Pendaftaran</a>
                    </li>
                </ul>
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a href="https://kelasvirtual.digyhomeschooling.id/" class="nav-link">
                            <img src="assets/img/icon/user.png" width="25" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#" class="nav-link text-left mb-3">
            <img src="assets/img/icon/user.png" width="25" alt="">
        </a>
        <a href="/">Home</a>
        <a href="article.php">Artikel</a>
        <a href="#">Tentang</a>
        <a href="#">Kelas Zoom</a>
        <a href="#" id="pemb">Pembelajar</a>
        <div class="dropdown-responsive">
            <div class="dropdown-r-item">
                <ul>
                    <li><a class="dropdown-i-r" href="https://siswa.edulogy.id/">Siswa</a></li>
                    <li><a class="dropdown-i-r" href="https://guru.edulogy.id/">Guru</a></li>
                    <li><a class="dropdown-i-r" href="https://ujian.edulogy.id/">Ujian</a></li>
                </ul>
            </div>
        </div>
        <a href="http://product.digyhomeschooling.id/daftar-kelas/">Pendaftaran</a>
    </div>

    <div class="container pb-5">
        <div class="judul-b-detail">
            <p data-aos="fade-up" data-aos-duration="900">Published <?php echo $a['tanggal_update'] ?></p>
            <h1 data-aos="fade-up" data-aos-duration="1000"><?php echo $a['judul'] ?></h1>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="tag" data-aos="fade-up" data-aos-duration="1200">
        <?php 
        
        
            $tags = explode(",", $a['tags']);
        
        ?>
            <ul class="d-flex text-center">
            <?php 
                foreach ($tags as $t){
            ?>
                <li class="col-sm">
                    <div class="tag-content">
                        <p><?php echo $t; ?></p>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
            </div>
        </div>
        

        <div class="img-blog2 text-center" data-aos="zoom-in" data-aos-duration="1300">
        <?php 

            $file = pathinfo($a['cover']);

            if ($file['extension'] == "png"){
                ?>
                <img src="assets/img/cover/<?php echo $a['cover'] ?>" class="img-fluid" alt="">
                <?php
            } elseif ($file['extension'] == "jpg"){
                ?>
                <img src="assets/img/cover/<?php echo $a['cover'] ?>" class="img-fluid" alt="">
                <?php
            } elseif ($file['extension'] == "jpeg"){
                ?>
                <img src="assets/img/cover/<?php echo $a['cover'] ?>" class="img-fluid" alt="">
                <?php
            } elseif ($file['extension'] == "mp4"){
                ?>
                <video src="assets/img/cover/<?php echo $a['cover'] ?>" class="img-fluid" autoplay controls></video>
                <?php
            } elseif ($file['extension'] == "m4v"){
                ?>
                <video src="assets/img/cover/<?php echo $a['cover'] ?>" class="img-fluid" autoplay controls></video>
                <?php
            } elseif ($file['extension'] == "wmv"){
                ?>
                <video src="assets/img/cover/<?php echo $a['cover'] ?>" class="img-fluid" autoplay controls></video>
                <?php
            } else {
                echo "File Tidak Mendukung";
            }
        
        ?>
            
        </div>

        <div class="row mt-3">
            <div class="col">
                <div class="text-blog" data-aos="fade-up" data-aos-duration="1400">
                    <?php echo $a['isi'] ?>
                </div>
            </div>
            <div class="col-1 social-blog-pos">
                <div class="social-blog">
                    <div class="img-social-b" data-aos="fade-left" data-aos-duration="900">
                        <a href="https://www.instagram.com/digy.homeschooling/" target="_blank" ><img src="assets/img/icon/ig-article.png" alt=""></a>
                    </div>
                    <div class="img-social-b" data-aos="fade-left" data-aos-duration="1000">
                        <a href="#"><img src="assets/img/icon/in-article.png" alt=""></a>
                    </div>
                    <div class="img-social-b" data-aos="fade-left" data-aos-duration="1100">
                        <a href="#"><img src="assets/img/icon/twitter-article.png" alt=""></a>
                    </div>
                    <div class="img-social-b" data-aos="fade-left" data-aos-duration="1200">
                        <a href="https://www.facebook.com/digy.homeschooling" target="_blank"><img src="assets/img/icon/fb-article.png" alt=""> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="content-footer">
                <div class="row">
                    <div class="col">
                        <div class="fo-c-1">
                            <div class="fo-logo">
                                <img data-aos="fade-up" src="assets/img/logo.png" alt="">
                            </div>
                            <div class="fo-list">
                                <ul>
                                    <li data-aos="fade-up" data-aos-duration="900"><a href="/">Home</a></li>
                                    <li data-aos="fade-up" data-aos-duration="900"><a href="article.php">Artikel</a>
                                    </li>
                                    <li data-aos="fade-up" data-aos-duration="900"><a href="/#tentang">Tentang</a></li>
                                    <li data-aos="fade-up" data-aos-duration="1100"><a href="#">Pembelajar</a></li>
                                    <li data-aos="fade-up" data-aos-duration="1200"><a
                                            href="http://product.digyhomeschooling.id/daftar-kelas/">Pendaftaran</a>
                                    </li>
                                    <li data-aos="fade-up" data-aos-duration="1300">
                                        <a href="https://product.digyhomeschooling.id/">Afiliasi</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="fo-c-2">
                            <p data-aos="fade-up" data-aos-duration="900">Contact us</p>
                            <div class="info-fo" data-aos="fade-up" data-aos-duration="1100">
                                <p>
                                    Jl. Saad No. 28 A Bandung <br>
                                    Kota Bandung <br>
                                    Indonesia.
                                </p>
                                <a href="tel:081222213921">
                                    0812 2221 3921
                                </a>
                                <br>
                                <a href="mailto:generasi.digital02@gmail.com">
                                    generasi.digital02@gmail.com
                                </a>
                            </div>

                            <div class="media-fo">
                                <div class="row no-gutters">
                                    <div data-aos="fade-up" data-aos-duration="1000" class="col">
                                        <a href="#">
                                            <img src="assets/img/icon/yt.png" class="img-f-social" alt="">
                                        </a>
                                    </div>
                                    <div data-aos="fade-up" data-aos-duration="1100" class="col">
                                        <a href="https://www.instagram.com/digy.homeschooling/" target="_blank">
                                            <img src="assets/img/icon/ig.png" class="img-f-social" alt="">
                                        </a>
                                    </div>
                                    <div data-aos="fade-up" data-aos-duration="1200" class="col">
                                        <a href="https://www.facebook.com/digy.homeschooling" target="_blank">
                                            <img src="assets/img/icon/fb.png" class="img-f-social" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/aos.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
        AOS.init({
            duration: 900,
        });
    </script>
    <script type="text/javascript">
    var lst = 0;
    nb = document.getElementById("navbar");
    window.addEventListener("scroll", function(){
        var st = window.pageYOffset || document
        .documentElement.st;
        if (st > lst) {
            nb.style.top="-80px";
        } else {
            nb.style.top="0px";
        }
        lst = st;
    })
    </script>
</body>

</html>