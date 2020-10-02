<?php
       
    $banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : "";
       
    $banner = "";
    $link = "";
    $gambar = "";
	$keterangan_gambar = "";
    $status = "";
       
    $button = "Add";
       
    if($banner_id != "")
    {
        $button = "Update";
		
        $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE banner_id='$banner_id'");
        $row=mysqli_fetch_array($queryBanner);
           
		$banner = $row["banner"];
		$link = $row["link"];
		$gambar = "<img src='".BASE_URL."images/slide/$row[gambar]'/>";
		$keterangan_gambar = "(klik 'Pilih Gambar' hanya jika ingin mengganti gambar)";
		$status = $row["status"];
    }   
?>
<link rel="stylesheet" href="css/module.css">

<form action="<?php echo BASE_URL."module/banner/action.php?banner_id=$banner_id"?>" method="post" enctype="multipart/form-data">
	
	<div class="element-form">
		<label>Banner</label>	
		<span><input type="text" name="banner" value="<?php echo $banner; ?>" /></span>
	</div>	

	<div class="element-form">
		<label>Link</label>	
		<span><input type="text" name="link" value="<?php echo $link; ?>" /></span>
	</div>	   

	<div class="element-form">
		<label class="top">Gambar <?php echo $keterangan_gambar; ?></label>	
		<span>
			<?php echo $gambar; ?><input type="file" name="file">
		</span>
	</div>	  

	<div class="element-form">
		<label>Status</label>	
		<span>
			<input type="radio" value="on" name="status" <?php if($status == "on"){ echo "checked"; } ?> /> On
			<input type="radio" value="off" name="status" <?php if($status == "off"){ echo "checked"; } ?> /> Off		
		</span>
	</div>	   
	   
	<div class="button-bar">
		<span><input type="submit" name="button" value="<?php echo $button; ?>" class="submit-my-profile" /></span>
	</div>	
</form>