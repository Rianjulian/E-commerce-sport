<?php

    include_once("function/first.php");
    include_once("function/koneksi.php");

    $level = "customer";
    $status = "on";
    $nama_lengkap = $_POST['nama_lengkap'];
    $phone = $_POST['telepon'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_pass'];

// MENGANTISIPASI ADANYA BUG
    unset($_POST['password']);
    unset($_POST['re_pass']);
    $dataform = http_build_query($_POST);

    // VALIDASI KELENGKAPAN ISI FORM REGISTER
    if(empty ($username) || empty ($nama_lengkap) || empty ($phone) || empty ($email) || empty ($password)){
        header("location: ".BASE_URL."index.php?page=register&notif=require");
    }
    // PENGECEKAN ULANG PASSWORD
    elseif($password != $re_password){
        header("location: ".BASE_URL."index.php?page=register&notif=password&$dataform");
    }
    // PENGECEKAN EMAIL YANG SAMA
    elseif(mysqli_num_rows($mysqli_query) == 1){
        header("location:" .BASE_URL."index.php?page=register&notif=email&$dataform");
    }
    // SETELAH REGISTER MAKA AKAN DIARAHKAN
    else{
         mysqli_query($koneksi, "INSERT INTO user (level, nama, phone, email, password, status)
        VALUES('$level', '$nama_lengkap', '$phone', '$email', '$password', '$status')");

        header("location:" .BASE_URL."index.php?page=login");
    }
?>