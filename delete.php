<?php
 
  if ( !isset( $_GET['file']) || $_GET['file']=='' ) {
    header('Location: index.php?msg=ERROR: Ανεπαρκή δεδομένα για διαγραφή!');
    exit();
  }

 
  $filePath='images/';
 
  if ( !file_exists($filePath.$_GET['file']) ) {
    header('Location: index.php?msg=ERROR: Δεν υπάρχει τέτοιο αρχείο στον φάκελο!');
    exit();
  }

 
  $fileDelResult=unlink($filePath.$_GET['file']);
  if ($fileDelResult==true)
    $msg= 'Έγινε διαγραφή';
  else
    $msg= 'ERROR: Το αρχείο δεν διαγράφηκε!';
  header('Location: index.php?msg='.$msg);
  exit();
?>