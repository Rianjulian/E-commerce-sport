<?php

    include_once("../../function/first.php");
    include_once("../../function/koneksi.php");

    $kategori = $_POST['kategori'];
    $status = $_POST['status'];
    $button = $_POST['button'];
    $update = "";

    // MEMASUKAN GAMBAR PADA SERVER
    if(!empty($_FILES["file"]["name"])){

        $nama_file = $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/background/" . $nama_file);

        $update = ", gambar='$nama_file'";
    }

    // MEMASUKAN DATA
    if($button == "Add"){
        mysqli_query($koneksi ,"INSERT INTO kategori (kategori, gambar, status) 
                                                VALUES ('$kategori', '$nama_file', '$status')");
    }
    // UPDATE DATA
    else if($button == "Update"){
        $kategori_id = $_GET['kategori'];

        mysqli_query($koneksi,"UPDATE kategori SET kategori='$kategori', 
                                                    status='$status' $update WHERE kategori_id='$kategori_id'");
    }

    header("location:".BASE_URL."index.php?page=my_profile&module=kategori&action=list");

?>