    <div id="leftsidebar">
      <ul class="menu">
	    

		<li><a href="register.php">Register</a></li>
		<li><a href="index.php">Login Page</a></li>
		<li><a href="sell_smartphone.php">Sell Smartphone</a></li> 
		<li><a href="up_images_form.php">Upload Images</a></li> 
		<li><a href="results.php">Results</a></li>

        
        

        <?php if ( isset($_SESSION['username']) ) { ?>

         
           <li><a href="con_logout.php">logout</a></li> 
           
        <?php } ?>

      </ul>

    </div>
