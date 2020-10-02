<link rel="stylesheet" href="css/module.css">

<div id="frame-tambah">
	<a class="tombol-action" href="<?php echo BASE_URL."index.php?page=my_profile&module=banner&action=form"; ?>">+ Tambah Banner</a>
</div>

<?php
    $no=1;
        
    $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner ORDER BY banner_id DESC");
        
    if(mysqli_num_rows($queryBanner) == 0)
    {
        echo "<h3>Saat ini belum ada banner di dalam database</h3>";
    }
    else
    {
        echo "<table class='table-list-group-item'>";
            
            echo "<tr>
                    <th>No</th>
                    <th>Banner</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th>Action</th>
                 </tr>";
    
            while($rowBanner=mysqli_fetch_array($queryBanner))
            {
                echo "<tr>
                        <td>$no</td>
                        <td>$rowBanner[banner]</td>
                        <td><a target='blank' href='".BASE_URL."$rowBanner[link]'>$rowBanner[link]</a></td>
                        <td>$rowBanner[status]</td>
                        <td>
                            <a href='".BASE_URL."index.php?page=my_profile&module=banner&action=form&banner_id=$rowBanner[banner_id]"."'>Edit</a>
                        </td>
                     </tr>";
                
                $no++;
            }
            
        echo "</table>";
    }
?>