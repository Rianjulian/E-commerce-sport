<link rel="stylesheet" href="css/catalog.css">

<h2 class="title-area">Pilih sesuai keinginanmu</h2>
    <div class="card">
        <ul class="unlist">
            <?php

                $query=mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");

                while($row=mysqli_fetch_array($query)){
                    echo "<li class='border'><a href='".BASE_URL."index.php?page=listbarang&kategori_id=$row[kategori_id]'>
                                <img class='catalog' src='".BASE_URL."images/background/$row[gambar]' />
                                    <p class='image-box'>$row[kategori]</p>
                         </a></li>";
                }
            
            
            ?>
        </ul>
    
    </div>

