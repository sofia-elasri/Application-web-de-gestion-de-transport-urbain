<?php 
require_once 'conection.php';
$nmbr= htmlspecialchars($_POST['Number']);
$lnmbr=htmlspecialchars($_POST['Nligne']);

?>
<!DOCTYPE html>

<html>
<head>
<meta charset ="utf-8">
<title>Formulaire Des conducteur></title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<style>
body{
background-color: #000;}
h1,h2,h3,h4,h5,h6{
color: #fff;}
hr{ border-color: #999;}
tr,th,td{
color: #fff;}
input[type="text"]{
background-color: #999;}
</style>



</head>
<body>
	          </div>
			  <div class="col-md-4">
			  <h3 class="text-center">ajouter traget</h3>
			  <hr>
			  <form  action="ajouterT2.php" method="POST">
			     <div class="form-group">
				   
				   <input type="hidden" name="Nligne" class="form-control" value="<?php echo $lnmbr;?> ">
			     </div>
				 <div class="form-group">
				    <label> </label>
				     <input type="hidden" name="Number" class="form-control" value="<?php echo $nmbr;?>" >
			     </div>
				 <div class="form-group">
			        <label style="color: white;"> StationLib:</label>
				  <?php	
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				
				$sql = "SELECT * FROM ligne";
				$result= mysqli_query($bd,$sql)or die("bad query");
				for( $cont = 1; $cont <=$nmbr ;$cont++ )
					
				{?>

				    <input type="text" name="<>" class="form-control" value="<?php echo"entrer station d'order". $cont;?>" required="">
			
				
				<?php
				}
				?>
					
			     </div>
				 <div class="form-group">

				  
				  <button type="submit" name="btn_Ajout" class="btn btn primary " >ajouter</button>
				  <hr>
				 
			  </form>
	          </div>
			
			  
			  </body>
			  </html>