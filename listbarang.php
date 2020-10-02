<link rel="stylesheet" href="css/catalog.css">
<ul class="unlisted">
        <?php

            $query=mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND kategori_id='$kategori_id'");

            while ($row=mysqli_fetch_assoc($query)) {
                echo "<li class='border-barang'>
                            <a class='decoration' href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>
                                <img class='barang' src='".BASE_URL."images/barang/$row[gambar]' />
                            </a>
                                <p class='price'>".rupiah($row['harga'])."</p>
                            <a class='nama' href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>$row[nama_barang]</a>                              
                      </li>";
            }


         ?>
</ul>
