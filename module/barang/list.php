<link rel="stylesheet" href="css/module.css">

<div id="frame-tambah">
        <a href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=form";?>" class="tombol-action">+Tambah Barang</a>
</div>

<?php


    $query = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id=kategori.kategori_id");

    if(mysqli_num_rows($query) == 0){
        echo "<h3>Saat ini belum ada nama dalam table barang</h3>";
    }
    else{
        echo "<table class='table-list-group-item'>";
        
        echo "<tr>

                <th>No</th>
                <th>Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Action</th>
            
            </tr>";
        $no=1;
        while($row=mysqli_fetch_assoc($query)){
           echo "<tr>
                    <td>$no</td>
                    <td>$row[nama_barang]</td>
                    <td>$row[kategori]</td>
                    <td>".rupiah($row["harga"])."</td>
                    <td>$row[status]</td>
                    <td>
                    <a href='".BASE_URL."index.php?page=my_profile&module=barang&action=form&barang_id=$row[barang_id]'>Edit</a>
                    </td>
                </tr>" ;

                $no++;
        }

        echo "</table>";

        
    }


?>