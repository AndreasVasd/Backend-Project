<?php 
	error_reporting(E_ALL);

  $title="UsedPhones - Results";
  require('part_header.php');
  require('part_leftsidebar.php');
  
?>

<script>
    function verify() {
      return confirm("Να διαγραφεί η αγγελία;");
    }
  </script>
  
    <div id="main">
       <h2>Results</h2> 
	   
	   <div id="results">

	   <?php
	   
	   require('db_params.php');

		try {
		
			 $pdoObject = new PDO("mysql:host=$dbhost; dbname=$dbname;", $dbuser, $dbpass);
			 $pdoObject -> exec('set names utf8');
	   
	   
	    $sql = 'SELECT * 
				FROM smartphones';
		
		
		
		
		$statement = $pdoObject->query($sql);
		
		 while ( $record = $statement -> fetch() ) {
		 
		  

			echo '<p class="result">'.$record['brand'].' - '.$record['model'].
				 ' <a href="sell_smartphone.php?mode=update&id='.$record['brandID'].'"><img src="edit.png"/></a>'.
			     ' <a href="con_delete.php?id='.$record['brandID'].'" onclick="return verify();"><img src="delete.gif"/></a></p>';
			  
		  
		  }
		   $statement->closeCursor();
    
		   $pdoObject = null;

		} catch (PDOException $e) {
     
		  echo 'PDO Exception: '.$e->getMessage();
     
   }

	   
	?> 
	
	<p class="right"><a href="index.php">Αρχική Σελίδα</a></p>

    </div>
	</div>

<?php require('part_footer.php'); ?>


