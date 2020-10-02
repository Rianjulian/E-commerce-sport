<h1>Todayis</h1>
<div id="container-user-akses">

        <h2>Form Register</h2>
    <form action="<?php echo BASE_URL."proses_register.php"; ?>" method="post">
    <?php
    
    $notif = isset($_GET['notif']) ? $_GET['notif'] : false;

    if ($notif == "require"){
        echo "<h6>Maaf, anda harus melengkapi form</h6>";
    }
    elseif($notif == "password"){
        echo "<h6>Password yang dimasukan tidak sama</h6>";
    }
    elseif($notif == "email"){
        echo "<h6>Email yang anda masukan sudah ada</h6>";
    }

    ?>

        <div class="form">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap">
        </div>
        <div class="form">
            <label>No HP/Whatsapp</label>
            <input type="tel" name="telepon">
        </div>
        <div class="form">
            <label>Email</label>
            <input type="email" name="email">
        </div>
        <div class="form">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="form">
            <label>Re-type Password</label>
            <input type="password" name="re_pass">
        </div>
        <div class="button">
            <input type="submit" value="Register">
        </div>

    </form>

</div>