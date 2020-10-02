<?php    
    include_once("../../function/first.php");
    include_once("../../function/koneksi.php");

    $kategori_id = $_POST['kategori_id'];
    $nama_barang = $_POST['nama_barang'];
    $spesifikasi = $_POST['spesifikasi'];
    $status = $_POST['status'];
    $button = $_POST['button'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $update_gambar = "";

// MEMASUKAN GAMBAR PADA SERVER
    if(!empty($_FILES["file"]["name"])){

        $nama_file = $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/barang/" . $nama_file);

        $update_gambar = ", gambar='$nama_file'";
    }

    // MENAMBAHKAN PADA TABLE BARANG
    if($button == "Add"){
        mysqli_query($koneksi,"INSERT INTO barang (kategori_id, nama_barang, spesifikasi, gambar, harga, stok, status) 
                                            VALUES ('$kategori_id', '$nama_barang', '$spesifikasi', '$nama_file', '$harga', '$stok', '$status')");
    }
    // UPDATE PADA TABLE BARANG
    else if($button == "Update"){
        $barang_id = $_GET['barang_id'];

        mysqli_query($koneksi,"UPDATE barang SET kategori_id='$kategori_id', 
                                                 nama_barang='$nama_barang',
                                                 spesifikasi='$spesifikasi',
                                                 stok='$stok',
                                                 harga='$harga',
                                                 status='$status'
                                                 $update_gambar WHERE barang_id='$barang_id'");
    }

    header("location:".BASE_URL."index.php?page=my_profile&module=barang&action=list");

?>