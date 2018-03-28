<?php


if ( !isset($_SESSION['username']) && isset($_POST['username'], $_POST['password'], $_POST['email']) ) {

 
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email =    $_POST['email'];

     require('db_params.php');
	 
	 try {

    
        $pdoObject = new PDO("mysql:host=$dbhost; dbname=$dbname;", $dbuser, $dbpass);

    $pdoObject -> exec('set names utf8');

		$sql = "SELECT username
            FROM Users
			WHERE username='$username';";
			
          
	   
	   $statement = $pdoObject->prepare($sql);
		
		$statement->execute( array(':username'=>$username, ':password'=>$password)); 


		
	    if (mysql_num_rows($result)==0) { 
		
			session_start(); 
			
			$sql = "INSERT INTO Users (username, password, email)
                    VALUES (:username, :password, :email);";
					
				$salt = '$6$'.rand(10000000,99999999).'$'; 
				 
				$encryptedPass = crypt($password, $salt);  
			 
			 $statement = $pdoObject->prepare($sql);
			 
			 $statement->execute( array(':username '=>$username, ':password'=>$encryptedPass) ); 
			
			header("Location: index.php?msg=Επιτυχημένη διαπίστευση! Συνδεθείτε στον email λογαριασμό σας!");
			
			exit();
			
		}
		
	
		$statement->closeCursor();

		$pdoObject = null;
			   
	} 
	catch (PDOException $e) {
     
		echo 'PDO Exception: '.$e->getMessage();
     
   }
  

	}
	else { 
  session_start();   
  session_destroy(); 
  header("Location: index.php?msg=Πρόβλημα - Δοκίμασε ξανά!");
  exit();  

	}


?>