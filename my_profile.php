<link rel="stylesheet" href="<?php echo BASE_URL."/fontawesome-free-5.13.0-web/css/all.css";?>">
<link rel="stylesheet" href="css/profile.css">
<?php

// PENGECEKAN FILE DAN VARIABEL 
    if($user_id){
        $module = isset($_GET['module']) ? $_GET['module'] : false;
        $action = isset($_GET['action']) ? $_GET['action'] : false;
        $mode = isset($_GET['mode']) ? $_GET['mode'] : false;
       
    }
    // JIKA GAGAL MAKA
    else{
        header("location:".BASE_URL."index.php?page=login");
    }
?>



<div id="bg-page-profile">
    
<!-- lIST MENU PROFILE -->
    <div id="menu-profile">
        <ul>
            <h2 class="dashboard">Dashboard</h2>

        <?php
            if($level == "customer"){
        ?>

            <li <?php if($module == "kategori") {echo "class='main'";} ?>>
                <a href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=list";?>"><i class="fas fa-clipboard-list"></i><p>Kategori</p></a>
            </li>
            <li <?php if($module == "barang") {echo "class='main'";} ?>>
                <a href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=list";?>"><i class="fas fa-box"></i><p>Barang</p></a>
            </li>
            <li <?php if($module == "kota") {echo "class='main'";} ?>>
                <a href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=list";?>"><i class="fas fa-map-marker-alt"></i><p>Kota</p></a>
            </li>
            <li <?php if($module == "user") {echo "class='main'";} ?>>
                <a href="<?php echo BASE_URL."index.php?page=my_profile&module=user&action=list";?>"><i class="fas fa-user-alt"></i><p>User</p></a>
            </li>
            <li <?php if($module == "banner") {echo "class='main'";} ?>>
                <a href="<?php echo BASE_URL."index.php?page=my_profile&module=banner&action=list";?>"><i class="fas fa-image"></i><p>Banner</p></a>
            </li>
            <li <?php if($module == "pemesanan") {echo "class='main'";} ?>>
                <a href="<?php echo BASE_URL."index.php?page=my_profile&module=pemesanan&action=list";?>"><i class="fas fa-dolly"></i><p>Pemesanan</p></a>
            </li>
        </ul>    
        <?php
            }            
        ?>
        <!-- </ul> -->
    </div>       
       
        
    
    <!-- AKHIR LIST MENU PROFILE -->

    <div id="profile-content">
        <?php

        $queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");
        
        $file = "module/$module/$action.php";
        if(file_exists($file)){
            include_once($file);
        }
        elseif($level == "customer"){
            echo "<h3>Selamat Datang $nama, Silahkan pilih menu</h3>";
        }
        elseif($level == "superadmin"){
            echo "<h3>Hai $nama, Belanja apa hari ini ? Lihat Daftar pesanan</h3>";
            
            echo "<table class='profile'>";

            echo "<tr>
                    <th>Nama :</th>
                    <th>Email :</th>
                    <th>Handphone :</th>
                 </tr>";

            while($rowUser=mysqli_fetch_assoc($queryUser)){     
            echo "<tr>
                <td>$rowUser[nama]</td>
                <td>$rowUser[email]</td>
                <td>$rowUser[phone]</td>

            </tr>";
            }
            echo "</table>";
        }
        ?>
    </div>

</div>

