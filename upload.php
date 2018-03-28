<?php

  function guid( $opt = false ){
    if( function_exists('com_create_guid') ){
        if( $opt ){ return com_create_guid(); }
            else { return trim( com_create_guid(), '{}' ); }
    } else {
      mt_srand( (double)microtime() * 10000 );
      $charid = strtoupper( md5(uniqid(rand(), true)) );
      $hyphen = chr( 45 );    // "-"
      $left_curly = $opt ? chr(123) : "";     //  "{"
      $right_curly = $opt ? chr(125) : "";    //  "}"
      $uuid = $left_curly
              . substr( $charid, 0, 8 ) . $hyphen
              . substr( $charid, 8, 4 ) . $hyphen
              . substr( $charid, 12, 4 ) . $hyphen
              . substr( $charid, 16, 4 ) . $hyphen
              . substr( $charid, 20, 12 )
              . $right_curly;
     return $uuid;
    }
  }


 
  if ( !isset($_FILES['imgFilename']) || $_FILES['imgFilename']['name']=='') {
    header('Location: up_images_form.php?msg=ERROR: Ελλιπή δεδομένα!');
    exit();
  } else $filename= $_FILES['imgFilename']['name'];

  
  $ext = strtolower(substr($filename, -3));
  
  if (($ext!=="jpg")) {
    header('Location: up_images_form.php?msg=ERROR: Μη αποδεκτός τύπος αρχείου!');
    exit();
  }

 
  $max_size=200;  
  $size=filesize($_FILES['imgFilename']['tmp_name']);
 
  if ($size > $max_size*1024) {
    header('Location: up_images_form.php?msg=ERROR: Το αρχείο είναι μεγαλύτερο από το όριο!');
    exit();
  }

  
  $new_filename = guid().'.'.$ext;

  
  $copyResult = copy($_FILES['imgFilename']['tmp_name'], 'images/'.$new_filename);
  
  if (!$copyResult) {
    header('Location: up_images_form.php?msg=ERROR: Η αντιγραφή του προσωρινού αρχείου απέτυχε!');
    exit();
  } else {
    header('Location: up_images_form.php?msg=Πετυχημένο upload!');
    exit();
  }
?>