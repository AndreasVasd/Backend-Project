<?php
  $title="UsedPhones - Upload Images";
  require('part_header.php');
  require('part_leftsidebar.php');
  require('con_is_logged_in.php');

   
?>

	<div id="main">
       <h2>Upload Images</h2>
	   
	    <h5 class="center">Ανεβάστε εικόνες (ως 200KB αποκλειστικά σε jpg format!)</h5>
		<fieldset>
			<legend>Upload Image</legend>
			 
			  <form name="form1" method="post" action="upload.php" enctype="multipart/form-data">
				
				<p>Αρχείο:  <input type="file" name="imgFilename" size="42"/></p>
				<p class="center"><input name="submit" type="submit" value="Upload"/></p>
			  </form>
			</fieldset>

			
	
	<div id="filelist">
		<fieldset>
			<legend>Αρχεία στον server</legend>
				<?php
					
				   $fileArray= scandir('images');
				  
				   $filesInFolder= count($fileArray);
				   
				   if ( $filesInFolder>2 ) {
					 for ($i=2; $i<=$filesInFolder-1;  $i++) {
					   
					   if (!is_dir('images/'.$fileArray[$i])) {
						
						 echo "<p>$fileArray[$i] - [ <a href='delete.php?file=$fileArray[$i]'>Del</a> ] [ <a href='images/$fileArray[$i]'>View</a> ]</p>";
					   }
					 }
				   } else {
					 echo 'Δεν βρέθηκαν αρχεία!';
				   }
				 ?>
			</fieldset>
		  </div>	

		  
	 <p class="center"><a href="index.php">Home</a></p>
				  
		 </div> 
		 	<?php require('part_footer.php'); ?>

		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
