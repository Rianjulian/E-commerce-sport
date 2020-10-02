<?php

    $barang_id = isset ($_GET['barang_id']) ? $_GET['barang_id'] : false;

    $nama_barang = "" ;
    $kategori_id = "" ;
    $spesifikasi = "" ;
    $gambar = "" ;
    $harga = "" ;
    $stok = "" ;
    $status = "" ;
    $button = "Add";



    if($barang_id){
        $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id'");
        $row = mysqli_fetch_assoc($query);

        $nama_barang = $row['nama_barang'];
        $kategori_id = $row['kategori_id'];
        $spesifikasi = $row['spesifikasi'];
        $gambar = $row['gambar'];
        $harga = $row['harga'];
        $stok = $row['stok'];
        $status = $row['status'];
        $button = "Update";

        $gambar = "<img src='". BASE_URL ."images/barang/$gambar'/>";

    }

    
?>

<script src="<?php echo BASE_URL."js/ckeditor/ckeditor.js";?>"></script>
<link rel="stylesheet" href="css/module.css">

<form action="<?php echo BASE_URL."module/barang/action.php?barang_id=$barang_id"; ?>" method="post" enctype="multipart/form-data">


    <h2>Tambahkan Kategori</h2>
        <div class="form-element">
            <label>Barang</label>
            <span>
                <select name="kategori_id">
                    <option disabled selected='true'>- Pilih Kategori Barang -</option>
                    <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='ON'");
                            while($row=mysqli_fetch_assoc($query)){
                                if($kategori_id == $row['kategori_id']){
                                    echo "<option value='$row[kategori_id]' selected='true'>$row[kategori]</option>";
                                }else{
                                    echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
                                }   
                         }
                         
                    ?>
                </select>
            </span>
        </div>
        <div class="form-element">
            <label>Nama barang</label>
            <span>
                <input type="text" name="nama_barang" value="<?php echo $nama_barang; ?>">
            </span>
        </div>

        <div class="form-element">
            <label>Spesifikasi</label>
            <span>
                <textarea name="spesifikasi" id="editor"><?php echo $spesifikasi; ?></textarea>
            </span>
        </div>

        <div class="form-element">
            <label>Harga</label>
            <span>
                <input type="text" name="harga" value="<?php echo $harga; ?>">
            </span>
        </div>

        <div class="form-element">
            <label>Stok</label>
            <span>
                <input type="number" name="stok" value="<?php echo $stok; ?>" min="1" max="30">
            </span>
        </div>
        
        <div class="form-element">
            <label class="top">Gambar Produk</label>
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

<script>
    CKEDITOR.replace("editor");
</script>