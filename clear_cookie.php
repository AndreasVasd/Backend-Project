<?php
  

  if (isset($_COOKIE['css']))
    setcookie ('css', '', time()-3600);

  header('Location: index.php');
  exit();

 ?>
 