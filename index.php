<?php

    session_start();
    include_once("function/koneksi.php");
    include_once("function/first.php");
    $page = isset($_GET['page']) ? $_GET['page'] : false;
    $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
    $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
    $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;

?>    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Todayis | Online Market</title>
    <link rel="stylesheet" href="<?php echo BASE_URL."/fontawesome-free-5.13.0-web/css/all.css";?>">
    <link rel="stylesheet" href="<?php echo BASE_URL."css/style.css";?>">
    <link rel="stylesheet" href="<?php echo BASE_URL."js/OwlCarousel2-2.3.4/dist/assets/owl.carousel.css";?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo BASE_URL."js/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css";?>" type="text/css" />
    

</head>
<body>
    
    <!-- Awal Navbar -->

    <div id="container">
        <div id="brand">
            <a href="<?php echo BASE_URL."index.php?page=product";?>">
                Todayis
            </a> 
        </div>

        <!-- menu  -->
        <nav> 
            <ul id="page">
                <li <?php if($page == "product") {echo "class='active'";} ?>><a href="<?php echo BASE_URL."index.php?page=product";?>" class="nav-link">Produk</a></li>
                <li <?php if($page == "catalog") {echo "class='active'";} ?>><a href="<?php echo BASE_URL."index.php?page=catalog";?>" class="nav-link">Catalog</a></li>
                <li <?php if($page == "cart") {echo "class='active'";} ?>><a href="<?php echo BASE_URL."index.php?page=cart";?>" class="nav-link">Daftar Pesanan</a></li>


                <?php
                 
                //  JIKA BERHASIL LOGIN MAKA AKAN MUNCUL 
                if($user_id){
                    echo "
                    <li><i class='fas fa-user-circle'></i><a href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=list' class='dropdown-toggle'>$nama</a></li>
                    <a href='".BASE_URL."logout.php' class='dropdown'>Logout</a>"; 
                 }      
                 //  JIKA TIDAK LOGIN MAKA AKAN MUNCUL
                else{
                    echo "
                          <li><a class='login' href='".BASE_URL."index.php?page=login'>Login</a></li>
                          <li><a class='regis' href='".BASE_URL."index.php?page=register'>Register</a></li>";
                        }
                        
                        ?>


            </ul>
            
        </nav>
        
                        <i class="fas fa-bars"></i>
        <!-- akhir menu -->
    </div>

    <!-- akhir navbar -->


     <!-- content -->
    <div id="content">
        <?php
            $filename = "$page.php";
            
            if(file_exists($filename)){
                include_once($filename);

                switch ($filename) {
                    case 'product':
                        include "product.php";
                        break;
                    case 'catalog':
                        include "catalog.php";
                        break;
                    case 'cart':
                        include "cart.php";
                        break; 			
                }
            }
            else{
                include_once "product.php";
            }
        
        ?>
    </div>
    <!-- akhir content -->


    <footer>
        <div class="footer">
            <div class="brand">
                <a>
                    Todayis
                </a> 
                <p>Online market perlengkapan olahraga</p>
            </div>    
            <div class="social-media">
                <h2>Social</h2>
                <a href="https://www.instagram.com/rianjuliant_/" target="_blank"><i class="fab fa-instagram"></i>Instagram</a>
                <a href="https://www.linkedin.com/in/rian-julianto-9a0299192/" target="_blank"><i class="fab fa-linkedin-in"></i>Linkedin</a>
                <a href="https://dribbble.com/Rian_Julianto9" target="_blank"><i class="fab fa-dribbble"></i>Dribbble</a>
            </div>
            <div class="etc">
                <h2>Lainnya</h2>
                <a href="<?php echo BASE_URL."index.php?page=about";?>">About me</a>
                <a href="<?php echo BASE_URL."index.php?page=contact";?>">Contact</a>
            </div>
        </div>
        <div class="copyright">
           <h5>Copyright &copy; Todayis | All right reserved</>
        </div>   
    </footer>


</body>

<script src="<?php echo BASE_URL."js/jquery-3.4.1.min.js";?>"></script>
<script src="<?php echo BASE_URL."js/dropdown.js";?>"></script>
<script src="<?php echo BASE_URL."js/velocity.min.js";?>"></script>
<script src="<?php echo BASE_URL."js/OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js";?>"></script>
<script src="<?php echo BASE_URL."js/OwlCarousel2-2.3.4/dist/owl.carousel.min.js";?>"></script>

</html>