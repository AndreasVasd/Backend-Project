<?php require('functions.php'); ?>

<?php function getCSS() {
     
    if ( !isset($_COOKIE['css'] )   )
       $css='mycss.css';
    else
      
      $css= $_COOKIE['css'];
    return $css;
  } ?>
 
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="author" content="Andreas Vasdekis"/>
  <meta name="description" content="Project 2017"/>  
 
  <title><?php echo $title; ?></title>
    
	<link href="<?php echo getCSS();  ?>" rel="stylesheet" type="text/css" />
	<script src="Form_Validation.js" type="text/javascript" />
  

</script>
</head>
<body>

  <div id="container">
  
  <h2 class="center">Επιλογή CSS!</h2>
  
   <p class="center">
  <?php
  
    if (!isset($_COOKIE['css'])) {
      echo 'Τρέχουσα Επιλογή: default';
    } else {
      echo 'Τρέχουσα Επιλογή: '.getCSS();
    }  
  ?>
  </p>
  
   <p class="center">
   
    [<a href="store_css.php?style=1">CSS1</a>] - 
    [<a href="store_css.php?style=2">CSS2</a>] -
    [<a href="clear_cookie.php">Clear Cookie</a>]
  
  </p>

  </div>

    <div id="header">
      <h1>UsedPhones</h1>
    </div>
	
</body>
</html>
