<?php


if ( !isset($_SESSION['username']) && isset($_POST['username'], $_POST['password']) ) {

 
  $username = $_POST['username'];
  $password = $_POST['password'];


  
  $authorised=false;

	
   
    require('db_params.php');
	 
	
	 
	 try {

    
        $pdoObject = new PDO("mysql:host=$dbhost; dbname=$dbname;", $dbuser, $dbpass);

    $pdoObject -> exec('set names utf8');

	$sql = "SELECT username, password
            FROM users
			WHERE username=:username";
          
		 
	   
	   $statement = $pdoObject->prepare($sql);
		
		$statement->execute( array(':username'=>$username)); 

		$record = $statement -> fetch();
		$username = $record['username'];
		
	    
		if ($statement->rowCount() == 1) { 
		
			$authorised= true;  
			session_start(); 
			$_SESSION['username']= $username;
			
			
		}

	
		$statement->closeCursor();

		$pdoObject = null;
			   
	} 
	catch (PDOException $e) {
     
		echo 'PDO Exception: '.$e->getMessage();
     
   }
  

  
  if ($authorised==true) {  
 
    header('Location: index.php');
    exit();
  } else {   
      header("Location: index.php?msg=Αποτυχημένη διαπίστευση χρήστη!".$username);
      exit();
  }

	
	
	
	}
	else {

  session_start();    
  session_destroy();  
  header("Location: index.php?msg=Πρόβλημα - Δοκίμασε ξανά!");
  exit();  

		}


?>