<?php 

require '../config/config.php';
require '../controller/admin.php';

if (!empty($_SESSION['username'])){
    header('location: dashboard.php');
} else {
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Login Admin Article</title>
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
</head>

<body>

    <div class="logins">
        <div class="row no-gutters">
            <div class="col">
                <div class="container mt-4">
                    <div class="logo">
                        <img data-aos="zoom-in" src="../assets/img/logo.png" width="150" alt="">
                    </div>

                    <?php 

                       
                        
                        if (isset($_POST['login'])){
                            login($_POST);
                        }
                    
                    
                    ?>

                    <div class="login-box">
                        <h5 data-aos="fade-up" data-aos-duration="900">Log-In</h5>
                        <form method="POST">
                            <div class="form-login">
                                <div class="form-group" data-aos="fade-up" data-aos-duration="1100">
                                    <input type="text" name="username" placeholder="Username" class="form-control input-login" autofocus>
                                </div>
                                <div class="form-group" data-aos="fade-up" data-aos-duration="1200">
                                    <input type="password" name="password" placeholder="Password" class="form-control input-login">
                                </div>
                                <div class="form-group" data-aos="fade-up" data-aos-duration="1400">
                                    <input type="submit" name="login" value="Log-In" class="btn btn-login btn-block">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col d-none d-sm-block" data-aos="fade-left">
                <img src="../assets/img/bglogin.png" class="img-login" alt="">
            </div>
        </div>
    </div>



    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/aos.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script>
        AOS.init({
            duration: 900,
        });
    </script>
</body>

</html>
<?php } ?>