<?php

function echo_msg() {
  if (isset($_GET['msg']))
    echo '<p style="color:blue;">'.$_GET['msg'].'</p>';
}


function load_options($table, $selected) {

  if ($selected == -1) 
    $extra_attribute='selected="selected"';
  else $extra_attribute='';
  
  echo '<option value="-1" '.$extra_attribute.'>--select--</option>';

  
  try {
   
    require('db_params.php');    
   
    $pdoObject = new PDO("mysql:host=$dbhost;dbname=$dbname;", $dbuser, $dbpass);   
    $pdoObject -> exec('set names utf8');
    $sql = "SELECT * FROM $table";
    
    $statement = $pdoObject->query($sql);
   
    while ( $record = $statement->fetch() ) {
     
      if ($record[0]==$selected)      
        $extra_attribute='selected="selected"';
      else $extra_attribute='';
     
      echo '<option value="'.$record[0].'" '.$extra_attribute.'>'.$record[1].'</option>';
      
    }
    
    $statement->closeCursor();
    $pdoObject=null;
  } catch (PDOException $e) {  
      header('Location: index.php?msg=Πρόβλημα στις Κατηγορίες: '. $e->getMessage());
      exit();
  } 
}

?>