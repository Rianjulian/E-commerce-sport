<link rel="stylesheet" href="css/module.css">

<?php
    $no=1;
      
    $queryAdmin = mysqli_query($koneksi, "SELECT * FROM user ORDER BY nama ASC");
      
    if(mysqli_num_rows($queryAdmin) == 0)
    {
        echo "<h3>Saat ini belum ada data user yang dimasukan</h3>";
    }
    else
    {
        echo "<table class='table-list-group-item'>";
          
            echo "<tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Action</th>
                 </tr>";
  
            while($rowUser=mysqli_fetch_array($queryAdmin)){
                echo "<tr>
                        <td>$no</td>
                        <td>$rowUser[nama]</td>
                        <td>$rowUser[email]</td>
                        <td>$rowUser[level]</>
                        <td>$rowUser[status]</td>
                        <td>
                            <a href='".BASE_URL."index.php?page=my_profile&module=user&action=form&user_id=$rowUser[user_id]"."'>Edit</a>
                        </td>
                     </tr>";
              
                $no++;
            }
          
        //AKHIR DARI TABLE
        echo "</table>";
    }
?>