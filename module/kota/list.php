<link rel="stylesheet" href="css/module.css">

<div id="frame-tambah">
	<a href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=form"; ?>" class="tombol-action">+ Tambah Kota</a>
</div>

<?php

	$queryKota = mysqli_query($koneksi, "SELECT * FROM kota ORDER BY kota ASC");
	
	if(mysqli_num_rows($queryKota) == 0){
		echo "<h3>Saat ini belum ada nama kota yang didalam database.</h3>";
	}
	else{
		echo "<table class='table-list-group-item'>";
		
			echo "<tr>
					<th>No</th>
					<th>Kota</th>
					<th>Tarif</th>
					<th>Status</th>
					<th>Action</th>
				 </tr>";
				 
			$no = 1;
			while($rowKota=mysqli_fetch_assoc($queryKota)){
				echo "<tr>
						<td>$no</td>
						<td>$rowKota[kota]</td>
						<td>".rupiah($rowKota['tarif'])."</td>
						<td>$rowKota[status]</td>
						<td>
							<a href='".BASE_URL."index.php?page=my_profile&module=kota&action=form&kota_id=$rowKota[kota_id]"."'>Edit</a>
						</td>
					 </tr>";
				
				$no++;
			}
		
		echo "</table>";
	}
?>