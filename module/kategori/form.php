<?php

// MENGECEK APAKAH ADA VAR DIBAWAH
    $kategori_id = isset ($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

    // VAR MENAMBAHKAN VAR 
    $kategori = "";
    $gambar = "";
    $status = "" ;
    $button = "Add";

    // MEMANGGIL KEMBALI VAR DI ATAS
    if($kategori_id){
        $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id='$kategori_id'");
        $row = mysqli_fetch_assoc($queryKategori);
     // VAR MENG UPDATE 
        $kategori = $row['kategori'];
        $gambar = $row['gambar'];
        $status = $row['status'];
        $button = "Update";

        $gambar = "<img src='".BASE_URL."images/background/$gambar'/>";
    }
?>

<link rel="stylesheet" href="css/module.css">

<form action="<?php echo BASE_URL."module/kategori/action.php?kategori=$kategori_id"; ?>" method="post" enctype="multipart/form-data">

    <h2>Tambahkan Kategori</h2>
        <div class="form-element">
            <label>Kategori</label>
            <span>
                <input type="text" name="kategori" value="<?php echo "$kategori"; ?>">
            </span>
        </div>
        <div class="form-element">
            <label class="top">Gambar Kategori</label>
            <span>
                <?php echo $gambar; ?><input type="file" name="file">
            </span>
        </div>
        <div class="form-element">
            <label>Status</label><br>
            <span>
                <input type="radio" name="status" value="ON" <?php if($status == "ON"){ echo "checked='true'";}?> />ON
                <input type="radio" name="status" value="OFF" <?php if($status == "OFF"){ echo "checked='true'";}?> />OFF
            </span>
        </div>
        <div class="button-bar">
            <span><input type="submit" name="button" value="<?php echo "$button"; ?>"></span>
        </div>

</form>