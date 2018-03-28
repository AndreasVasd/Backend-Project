<?php
   error_reporting(E_ALL);
   
   if ( isset($_POST['brandID']) )  
		$mode='update'; 
	else $mode='insert';
	
	
  if ($mode=='update') { 
   
    if ( !isset($_POST['brandID'], $_POST['brand'], $_POST['model'], $_POST['releaseDate'], $_POST['coresNumber'], $_POST['RamSize'],
			 $_POST['storageSize'],  $_POST['color'],  $_POST['damage'],  $_POST['OSVersion'],  $_POST['price'],  $_POST['adUpdateDate']))	{ 
      header('Location: index.php?msg=ERROR: missing data (trying update)');
      exit();
    }  
  }  
  
  if ($mode=='insert') {
   
    if ( !isset($_POST['brand'], $_POST['model'], $_POST['releaseDate'], $_POST['coresNumber'], $_POST['RamSize'],
			 $_POST['storageSize'],  $_POST['color'],  $_POST['damage'],  $_POST['OSVersion'],  $_POST['price'],  $_POST['adUpdateDate'])) { 
      header('Location: index.php?msg=ERROR: missing data (trying insert)');
      exit();
    }  
  }
  
  
  if ($_POST['brandID']=='-1') {     
    header('Location: index.php?msg=ERROR: invalid categoryID (-1)');
    exit();
  }
  
   
   
   $model= trim($_POST['model']);
   $releaseDate= trim($_POST['releaseDate']);
   $coresNumber= trim($_POST['coresNumber']);
   $RamSize= trim($_POST['RamSize']);
   $storageSize= trim($_POST['storageSize']);
   $color= trim($_POST['color']);
   $damage= trim($_POST['damage']);
   $OSVersion= trim($_POST['OSVersion']);
   $price= trim($_POST['price']);
   $adUpdateDate= trim($_POST['adUpdateDate']);
   
   
  if ( $model =='' ) {
    header('Location: index.php?msg=ERROR: invalid model (empty string)');
    exit();
  }
  

  if ( $releaseDate =='' ) {
    header('Location: index.php?msg=ERROR: invalid releaseDate (empty string)');
    exit();
  }
  
  if ( $coresNumber =='' ) {
    header('Location: index.php?msg=ERROR: invalid coresNumber (empty string)');
    exit();
  }
  
  if ( $RamSize =='' ) {
    header('Location: index.php?msg=ERROR: invalid RamSize (empty string)');
    exit();
  }
  
  if ( $storageSize =='' ) {
    header('Location: index.php?msg=ERROR: invalid StorageSize (empty string)');
    exit();
  }
  
  if ( $color =='' ) {
    header('Location: index.php?msg=ERROR: invalid color (empty string)');
    exit();
  }
  
  if ( $damage =='' ) {
    header('Location: index.php?msg=ERROR: invalid damage (empty string)');
    exit();
  }
  
  if ( $OSVersion =='' ) {
    header('Location: index.php?msg=ERROR: invalid OSVersion (empty string)');
    exit();
  }
  
  if ( $price =='' ) {
    header('Location: index.php?msg=ERROR: invalid price (empty string)');
    exit();
  }
  
  if ( $adUpdateDate =='' ) {
    header('Location: index.php?msg=ERROR: invalid adUpdateDate (empty string)');
    exit();
  }
  
   
   
  $myResult=false;

  require('db_params.php'); 
  try {
    $pdoObject = new PDO("mysql:host=$dbhost; dbname=$dbname;", $dbuser, $dbpass);
    $pdoObject -> exec('set names utf8');
	
	
    if ($mode=='insert') {
      $sql='INSERT INTO Smartphones (brand, model, releaseDate, coresNumber, RamSize, storageSize, color, damage, OSVersion, price, adUpdateDate)
            VALUES (:brand, :model, :releaseDate, :coresNumber, :RamSize, :storageSize, :color, :damage, :OSVersion, :price, :adUpdateDate)';
      $statement = $pdoObject->prepare($sql);
      
      $myResult= $statement->execute( array(     ':brand'=>$brand,
                                                 ':model'=>$model,
												 ':releaseDate'=>$releaseDate,
												 ':coresNumber'=>$coresNumber,
												 ':RamSize'=>$RamSize,
												 ':storageSize'=>$storageSize,
												 ':color'=>$color,
												 ':damage'=>$damage,
												 ':OSVersion'=>$OSVersion,
												 ':price'=>$price,
												 ':adUpdateDate'=>$adUpdateDate ) );
	}
						
	if ($mode=='update') {
        $sql='UPDATE Smartphones
              SET brandID=:brandID, brand=:brand, model=:model, releaseDate=:releaseDate, coresNumber=:coresNumber, RamSize=:RamSize, storageSize=:storageSize, color=:color,
				  damage=:damage, OSVersion=:OSVersion, price=:price, adUpdateDate=:adUpdateDate
              WHERE brandID=:brandID';
        $statement = $pdoObject->prepare($sql);
      
		 $myResult= $statement->execute( array(     ':brandID'=>$_POST['brandID'],
                                                    ':brand'=>$brand,
												    ':model'=>$model,
													':releaseDate'=>$releaseDate,
													':coresNumber'=>$coresNumber,
													':RamSize'=>$RamSize,
													':storageSize'=>$storageSize,
													':color'=>$color,
													':damage'=>$damage,
													':OSVersion'=>$OSVersion,
													':price'=>$price,
													':adUpdateDate'=>$adUpdateDate ) );
		}
		
		 
    $statement->closeCursor();
    $pdoObject = null;
  } catch (PDOException $e) {
     
      header('Location: index.php?msg=PDO Exception: '.$e->getMessage());
      exit();
  }
  
  
  if ( !$myResult ) {  
    header('Location: index.php?msg=ERROR: failed to execute sql query');
    exit();
  } else {   
    header('Location: index.php?msg=ALL right!!!');
    exit();
  }

?>
  
  
  
  
  
  
  
  
  