<h1>Todayis</h1>
<div id="container-user-akses">

        <h1>LOGIN</h1>
    <form action="<?php echo BASE_URL."proses_login.php"; ?>" method="post">
    <?php
    
    $notif = isset($_GET['notif']) ? $_GET['notif'] : false;

    if ($notif == true){
        echo "<h6>Email atau password salah</h6>";
    }

    ?>

        <div class="form">
            <label>Email</label>
            <input type="email" name="email">
        </div>
        <div class="form">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="button">
            <input type="submit" value="Login">
        </div>
        <div class="signup-link">
            Not a member? <a href="<?php echo BASE_URL."index.php?page=register";?>">Signup</a> here
        </div>

    </form>

</div>