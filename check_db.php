<?php

	require('db_params.php');
	 
	
	 
	 try {

    
        $pdoObject = new PDO("mysql:host=$dbhost; dbname=$dbname;", $dbuser, $dbpass);//standard

    $pdoObject -> exec('set names utf8');

	$sql = "SELECT username, password
			FROM users";
          
		 
	   
	   $statement = $pdoObject->prepare($sql);
		
		$statement->execute( array()); 

		
	    while ( $record = $statement -> fetch() ) {
			echo $record['username'];
			echo $record['password'];
 } 

	
		$statement->closeCursor();

		$pdoObject = null;
			   
	} 
	catch (PDOException $e) {
     
		echo 'PDO Exception: '.$e->getMessage();
     
   }
   
  ?>