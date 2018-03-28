<?php
  error_reporting(E_ALL);
 
  
  require('con_is_logged_in.php');
  require('db_params.php'); 
  try {
   
    $pdoObject = new PDO("mysql:host=$dbhost; dbname=$dbname;", $dbuser, $dbpass);
    $pdoObject -> exec('set names utf8');
    
    $sql = 'DELETE FROM Smartphones WHERE brandID= :brandID';
  
    $statement = $pdoObject->prepare($sql);
    
    $myResult= $statement->execute( array(':brnadID'=>$_GET['id']));
    
    $statement->closeCursor();
   
    $pdoObject = null;

    if ($myResult==true) {
      
      header('Location: index.php?msg=Επιτυχής Διαγραφή!');
      exit();
    } else {
     
      header('Location: index.php?msg=ΠΡΟΒΛΗΜΑ! Δεν έγινε διαγραφή!');
      exit();
    }
  } catch (PDOException $e) {
    
    echo 'PDO Exception: '.$e->getMessage();
   
  }
?>