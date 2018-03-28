<?php session_start(); ?>
<?php
  $title="UsedPhones - Login Page";
  require('part_header.php');
  require('part_leftsidebar.php');
   
?>


	
    <div id="main">
       <h2>Login Page</h2>

       <?php  echo_msg(); ?>

      
       <?php  if ( !isset($_SESSION['username']) ) { ?>
       
         <p>Παρακαλώ συμπληρώστε τα στοιχεία σας:</p>
         <form name="form2" method="post" action="con_login.php" onsubmit="return validateForm();">
           <p>username: <input type="text" name="username" size="25" maxlength="25"/> </p>
           <p>password: <input type="password" name="password" size="25" maxlength="25"/> </p>
           <p><input name="submit" type="submit"></p>
         </form>

       <?php  } else echo '<p>Hello '.$_SESSION['username'].'!</p>'; ?>
       
    </div>

<?php require('part_footer.php'); ?>
