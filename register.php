<?php session_start(); ?>
<?php
  $title="UsedPhones - Register";
  require('part_header.php');
  require('part_leftsidebar.php');
?>
    <div id="main">
       <h2>Register</h2>
	 

		 <?php  echo_msg(); ?>

       
	   
				<p>Παρακαλώ συμπληρώστε τα στοιχεία σας:</p>
			 <form name="form1" method="post" action="con_register.php" onsubmit="return validateForm()"> 
			   <p>username: <input type="text" name="username" id="username" size="25" maxlength="25"/> </p>
			   <p>password: <input type="password" name="password" id="password" size="25" maxlength="25"/> </p>
			   <p>email: <input type="email" name="email" id="email" size="25" maxlength="65"/> </p>
			   <div class="g-recaptcha" data-sitekey="6LeFxyMUAAAAAGmEsZtkawHRI-QJbpLFPHEBTf56"></div>
			   <p><input name="submit" type="submit"></p>
			   
			 </form>

              
		

       
    </div>

<?php require('part_footer.php'); ?>
