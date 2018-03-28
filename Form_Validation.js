// έλεγχος email
	
  function looks_like_email(str) {
  
  var result=true; 
  
  var ampersatPos = str.indexOf("@");    
  
  var dotPos = str.indexOf(".");         
  
  var dotPosAfterAmpersat = str.indexOf(".", ampersatPos); 
  
  
 
  if (ampersatPos<=0) result = false; 
  
 
  if (dotPos<0) result = false; 
  
  
  if (dotPosAfterAmpersat-ampersatPos==1) result = false; 
  
  
  if ( str.indexOf(".")==0  ||  str.lastIndexOf(".")==str.length-1 ) result = false; 
  
 
  return result;
  
}




function validateForm()  {

	var result=true;  


	// έλεγχος αποδεκτού username 
	
	var username=document.getElementById("username").value;

	// έλεγχος επιτρεπτών χαρακτήων
	
		var illegalChars = new RegExp("/\W/");
		
	// έλεγχος username για ύπαρξη μη επιτρεπτών χαρακτήρων 
	
		if (illegalChars.test(username)) {
		
				result=false;
				
				alert("Κάτι πήγε στραβά");
		
  
  }
  
	// έλεγχος του password 
	
		var password=document.getElementById("password").value;
		
		if (password.length<8) {
		
			result=false;
			
			alert("Το password πρέπει να έχει πάνω από 8 χαρακτήρες");
			
		
			
	}
	
	
	//email

		var email=document.getElementById("email").value;
	
	    if ( !looks_like_email(email) ) {
    
			result=false;
  
			alert("Το email δεν είναι αποδεκτό!");
	
	
	} 
	
	
	//έλεγχος περίπτωσης κενών πεδίων
	
	 var x = document.forms["form1"]["username"].value;
    
	 if (x == "") {
        
		alert("Username must be filled out");
        
		return false;
    }
	
	
	 var x = document.forms["form1"]["password"].value;
    
	 if (x == "") {
        
		alert("Password must be filled out");
        
		return false;
    }
	
	
	 var x = document.forms["form1"]["email"].value;
    
	 if (x == "") {
        
		alert("Email must be filled out");
        
		return false;
    }
	
	 var x = document.forms["form2"]["username"].value;
    
	 if (x == "") {
        
		alert("Username must be filled out");
        
		return false;
    }
	
	 var x = document.forms["form2"]["password"].value;
    
	 if (x == "") {
        
		alert("Password must be filled out");
        
		return false;
    }
	
 
	
	return result;  
} 

			

			
			
			
			
			
			
			
