<?php


require_once 'conection.php';

if(isset($_POST["Nligne"], $_POST["Numbr"]))
	
{
    $Nligne = htmlspecialchars($_POST['Nligne']);
	$Number= htmlspecialchars($_POST['Number']);
	
	
 
}
	if (isset($_GET['order'], $_GET['Nligne']))
	{
       $id1= $_GET['order'];
	   $id2=$_GET['Nligne'];
	 $test = "DELETE FROM `kenibus`.`traget` WHERE `traget`.`Nligne` = '$id2' AND `traget`.`Order` = '$id1'";
          
			$request  = $bd->prepare($test);
			$okay = $request->execute();
			if ($okay)
			{ 
				 header ('location:FormTraget.php?reg_err-supprimerB');
			}
			else{ 
		
				 header ('location:FormTraget.php?reg_err-superreur');
			}
	
	}
		if (isset($_GET['order2'],$_GET['Nligne2']))
	{  $id11= $_GET['order2'];
	   $id22=$_GET['Nligne2'];
	  // echo "$id11 </br> $id22";
	 $test = "SELECT *FROM `kenibus`.`traget` WHERE `traget`.`Nligne` = '$id22' AND `traget`.`Order` = '$id11'";
       
			$request  = $bd->prepare($test);
				$okay = $request->execute();
				//echo $test;
			/*if ($okay)
			{
				 header ('location:FormulairConducteur.php?reg_err-supprimerB');
			}
			else{
				 header ('location:FormulairConducteur.php?reg_err-superreur');
			}*/
			$object =$request->fetch();
	 // var_dump($object);
	}
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
	          
			  <div class="col-md-4">
			  <h3 class="text-center">modifier traget station</h3>
			  <hr>
			  <form  action="ModifierT.php" method="POST">
			     <div class="form-group">
				   
				   <input type="hidden" name="Nligne" class="form-control" value="<?php echo $object['Nligne'];?>" required="" >
			     </div>
				 <div class="form-group">
			        <label style="color: white;"> StationLib:</label>
					   <select name ="StationLib"  class="form-control">
							<?php
				
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT * FROM station";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>

				    <option  type ="text" "><?php echo $row['StationLib'];?></option>
			       
				<?php
				}
				?>
				     
			        </select>
				    
			     </div>
				 <div class="form-group">
				    <label> </label>
				     <input type="hidden" name="Order" class="form-control" value="<?php echo $object['Order'];?>" >
			     </div>
				
				  <button type="submit" name="btn_Ajout" class="btn btn primary " >Enregistrer les modification</button>
				  <hr>
				 
			  </form>
	          </div>

     </body>
	 
</html>



	
	
	
	
	
	
	
	
	





