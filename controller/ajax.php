<?php 

    require '../config/config.php';
    require '../system/readmore.php';
                
    if (isset($_POST['articleall'])){
        $key = mysqli_escape_string($koneksi, htmlspecialchars($_POST['articleall']));

        if ($key == 'all'){
            $sql = mysqli_query($koneksi, "SELECT * FROM article ORDER BY id DESC");
        } elseif (!empty($key)){
            $sql = mysqli_query($koneksi, "SELECT * FROM article WHERE judul LIKE '%$key%' ORDER BY id DESC");
        } else {
            $sql = mysqli_query($koneksi, "SELECT * FROM article ORDER BY id DESC");
        }

        foreach ($sql as $s){
        
            ?>

            <div class="col-sm-4">
                <a href="blog.php?article=<?php echo $s['id_article'] ?>" class="a-blog">
                    <div class="blog-box">
                        <div class="content-blog">
                            <div class="img-blog">
                            <?php
                                $file = pathinfo($s['cover']);

                                    if ($file['extension'] == "png"){
                                        ?>
                                            <img src="assets/img/cover/<?php echo $s['cover'] ?>" class="img-thumbnail" data-aos="fade-up" data-aos-duration="1200" alt="">
                                        <?php
                                    } elseif ($file['extension'] == "jpg"){
                                        ?>
                                            <img src="assets/img/cover/<?php echo $s['cover'] ?>" class="img-thumbnail" alt="">
                                        <?php
                                    } elseif ($file['extension'] == "jpeg"){
                                        ?>
                                            <img src="assets/img/cover/<?php echo $s['cover'] ?>" class="img-thumbnail" alt="">
                                        <?php
                                    } elseif ($file['extension'] == "mp4"){
                                        ?>
                                            <video src="assets/img/cover/<?php echo $s['cover'] ?>" class="img-thumbnail"></video>
                                        <?php
                                    } elseif ($file['extension'] == "m4v"){
                                        ?>
                                            <video src="assets/img/cover/<?php echo $s['cover'] ?>" class="img-thumbnail"></video>
                                        <?php
                                    } elseif ($file['extension'] == "wmv"){
                                        ?>
                                            <video src="assets/img/cover/<?php echo $s['cover'] ?>" class="img-thumbnail"></video>
                                        <?php
                                    } else {
                                        echo "File Tidak Mendukung";
                                    }
                            ?>           
                            </div>
                            <div class="text-blog">
                                <small><?php echo $s['tags'] ?></small>
                                <h3 ><?php echo $s['judul'] ?></h3>
                                <p>
                                    <?php echo readmore(100, $s['isi']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
                
                <?php }
                } elseif (isset($_POST['detailArtikel'])){
                    $id_artikel = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['detailArtikel']));

                    $sql = mysqli_query($koneksi, "SELECT * FROM article WHERE id_article = '$id_artikel'");

                    $s = mysqli_fetch_assoc($sql);

                    ?>

                    <div>

                    <?php
                                $file = pathinfo($s['cover']);

            if ($file['extension'] == "png"){
                ?>
                <img src="../assets/img/cover/<?php echo $s['cover'] ?>" class="img-thumbnail" alt="">
                <?php
            } elseif ($file['extension'] == "jpg"){
                ?>
                <img src="../assets/img/cover/<?php echo $s['cover'] ?>" class="img-thumbnail" alt="">
                <?php
            } elseif ($file['extension'] == "jpeg"){
                ?>
                <img src="../assets/img/cover/<?php echo $s['cover'] ?>" class="img-thumbnail" alt="">
                <?php
            } elseif ($file['extension'] == "mp4"){
                ?>
                <video src="../assets/img/cover/<?php echo $s['cover'] ?>" class="img-thumbnail"></video>
                <?php
            } elseif ($file['extension'] == "m4v"){
                ?>
                <video src="../assets/img/cover/<?php echo $s['cover'] ?>" class="img-thumbnail"></video>
                <?php
            } elseif ($file['extension'] == "wmv"){
                ?>
                <video src="../assets/img/cover/<?php echo $s['cover'] ?>" class="img-thumbnail"></video>
                <?php
            } else {
                echo "File Tidak Mendukung";
            }
            ?>
                    
                    </div>

                    <h2><?php echo $s['judul'] ?></h2>

                    <div class="form-group">
                        <label for="">Tags</label>
                        <input type="text" class="form-control" readonly value="<?php echo $s['tags'] ?>">
                    </div>

                    <div class="form-group">
                       <?php echo $s['isi'] ?>
                    </div>
                        <hr>
                    <div class="p-detail">
                        <p for="">Tanggal Upload : </p>
                        <?php echo $s['tanggal'] ?>
                        <p for="">Tanggal Update : </p>
                        <?php echo $s['tanggal_update'] ?>
                    </div>

                    <?php
                } 
                
                
                ?>