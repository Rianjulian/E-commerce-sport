<?php
require_once('function/koneksi.php');
$query=mysqli_query($koneksi, "SELECT * FROM user WHERE 1");
?>
<link rel="stylesheet" href="css/catalog.css">
<ul class="unlisted">


       <?php foreach($query as $row):?>

        <li class='border-barang'>
                <a class='decoration' href='".BASE_URL."index.php?page=detail&barang_id=<?= $row['nama']?>'>
                    <img class='barang' src='".BASE_URL."images/barang/$row[gambar]' />
                </a>
                    <p class='price'>"<?= $row['email']?>"</p>
                <a class='nama' href=''><?= $row['level']?></a>                              
          </li>
      
       <?php endforeach;?>




</ul>