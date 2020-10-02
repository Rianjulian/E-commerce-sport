<?php

$barang_id = $_GET['barang_id'];

$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id' AND Status='on'");
$row = mysqli_fetch_assoc($query);

echo "<div id='detail-barang'>
            <img class='detail-gambar' src='".BASE_URL."images/barang/$row[gambar]'/>

            <div class='description'>
                <h2>$row[nama_barang]</h2>
                <p class='price'>".rupiah($row['harga'])."</p>
                <span>
                    <p class='stok'>Stok : $row[stok]</p>
                    <a class='button-cart' href='".BASE_URL."cart.php?barang_id=$row[barang_id]'>+ Keranjang</a>
                </span>
                <p>$row[spesifikasi]</p>  
            </div>
      </div>";


?>