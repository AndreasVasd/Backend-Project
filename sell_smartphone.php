<?php
  error_reporting(E_ALL);
  
  $title="UsedPhones - Sell Smartphone";
  require('db_params.php');
  require('part_header.php');
  require('part_leftsidebar.php');
  require('con_is_logged_in.php');

 
  if ( isset($_SESSION['username']))
  {
  
	$username=['username'];

   
 
	
	 try {
    
      $pdoObject = new PDO("mysql:host=$dbhost;dbname=$dbname;", $dbuser, $dbpass);
      $pdoObject -> exec('set names utf8');
      
      $sql = "SELECT * FROM smartphones WHERE username=:username";
	  
	  
      $statement = $pdoObject -> prepare($sql);

      $statement->execute( array(':username'=>$username));
     
      
	   
	   


	 if (mysql_num_rows($result)==0) 
	 {
    
	$title='Εισαγωγή';
	
	$brand=-1;
    $model='';
    $releaseDate='';
	$coresNumber='';
	$RamSize='';
	$storageSize='';
	$color='';
	$damage='';
	$OSVersion='';
	$price='';
	$adUpdateDate='';
			
  }
  
   else {
    $title='Μεταβολή';
    
	   $record = $statement -> fetch();
	   
	   
	
	
        $brand=$record['brand'];
        $model=$record['model'];
		$releaseDate=$record['releaseDate'];
		$coresNumber=$record['coresNumber'];
		$RamSize=$record['RamSize'];
		$storageSize=$record['storageSize'];
		$color=$record['color'];
		$damage=$record['damage'];
		$OSVersion=$record['OSVersion'];
		$price=$record['price'];
		$adUpdateDate=$record['adUpdateDate'];
		
	} 
     
	  $statement->closeCursor();
      $pdoObject = null;
    } 
	catch (PDOException $e) {
        
		
		 header('Location: index.php?msg=PDO Exception:'.$e->getMessage());
			exit();
    }
	

    
   
  
  ?>
      <div id="main">
	  
	      <h2>Sell Smartphone</h2>

			<form name="form1" action="con_dualform.php" method="post">
    <?php
     
      if ($_GET['mode'] == 'update') { ?>

        <p>Κωδικός: <input name="brandID" value="<?php echo $brandID; ?>" readonly="readonly" /></p>

    <?php
   
     } ?>

  
  
  
  <p>Brand:
        <select name="brandID">
        
          <?php load_options('Smartphones', $brandID) ?>
        </select>
      </p>
      
      <p>Model: <input type="text" name="model" value="<?php echo $model; ?>"/></p>
	  <p>ReleaseDate: <input type="text" name="releaseDate" value="<?php echo $releaseDate; ?>"/></p>
	  <p>CoresNumber: <input type="text" name="coresNumer" value="<?php echo $coresNumber; ?>"/></p>
	  <p>RamSize(GB): <input type="text" name="RamSize" value="<?php echo $RamSize; ?>"/></p>
      <p>StorageSize(GB): <input type="text" name="storageSize" value="<?php echo $storageSize; ?>"/></p>
      <p>Color: <input type="text" name="color" value="<?php echo $color; ?>"/></p>
      <p>Damage: <input type="text" name="damage" value="<?php echo $damage; ?>"/></p>
      <p>OSVersion: <input type="text" name="OSVersion" value="<?php echo $OSVersion; ?>"/></p>
      <p>Price(?): <input type="text" name="price" value="<?php echo $price; ?>"/></p>
      <p>adUpdateDate: <input type="text" name="adUpdateDate" value="<?php echo $adUpdateDate; ?>"/></p>

		<p><input type="submit"/> <input type="reset"/></p>
    
	</form>
	
	    	 <p class="center"><a href="index.php">Home</a></p>

		
		</div>
		
	<?php require('part_footer.php');
}
 else  { 
		header("Location: index.php?msg=Πρόβλημα - Δοκίμασε ξανά!"); 
		}
?>