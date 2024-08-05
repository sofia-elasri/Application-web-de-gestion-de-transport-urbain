<!DOCTYPE html>
<html>
<head>
	<title>User Login And Registration</title>
	
</head>
<body>
   <div class="container">
   	<div class="login-box">
   	   <div class="row">
   	   	<div class="col-md-6 login-left">
	
           	    <link rel="stylesheet" type="text/css" href="style2.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
   	   		<h2> Login Here </h2>
		
   	   		<form action="userlogin.php" method="Post">
   	   			<div class="form-group">
   	   				<label>email</label>
   	   				<input type="text" name="user" class="form-control" required="">	
   	   			</div>
   	   			<div class="form-group">
   	   				<label>Password</label>
   	   				<input type="Password" name="Password" class="form-control" required="">	
   	   			</div>
   	   			<button type="submit" class="btn btn-primary">Login</button>
				
   	   		</form>
   	   		
   	   	</div>

          	<div class="col-md-6 login-right">
   	   		<h2> Register Here </h2>

   	   		<form action="userinscription.php" method="Post">
   	   			<div class="form-group">
   	   				<label>email</label>
   	   				<input type="text" name="Email" class="form-control" required="">	
   	   			</div>
                  <div class="form-group">
                     <label>CNE</label>
                     <input type="text" name="CneU" class="form-control" required="">   
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="Password" name="Password" class="form-control" required="">   
                  </div>
                  <div class="form-group">
                     <label>conferme Password</label>
                     <input type="Password" name="Password2" class="form-control" required="">   
                  </div>
   	   			<button type="submit" class="btn btn-primary">Register </button>
   	   		</form>
   	   		
   	   	</div>

   	   </div>

   	   </div>
   	
   </div>
</body>
</html>