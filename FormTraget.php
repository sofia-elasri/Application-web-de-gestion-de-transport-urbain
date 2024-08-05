<!DOCTYPE html>
<html>
<head>
<meta charset ="utf-8">
<title>Formulaire Des trajet</title>
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

     <div class="contrainer col-md-12">
         <div class="row justify-content-center">
             <div class="col-md-8">
			 <br>
                  <h3 class="text-center">formulaire des trajet</h3>
				  <hr>
				  <br>
             </div>
         </div>
        <div class="row">
	          <div class="col-md-8">
			  <h3 class ="text-center">Afficher les donner de la BD</h3>
			  <hr>
			  <table class="table table-bordered">
			    <thead>
			      <tr>
					 <th>N<sup>°</sup>ligne</th>
					 <th>nom station</th>
					 <th>Order</th>
					 <td colspan="2" align="center">action</td>
			      </tr>
			    </thead>
			    <tbody>
							    	<?php
				//require_once 'conection.php';
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 

				$sql = "SELECT * FROM `traget` order by 'Nligne'";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>
				<tr>
				<td><?php echo $row['Nligne'];?></td>
				<td><?php echo $row['StationLib'];?></td>
				<td><?php echo $row['Order'];?></td>
				
				<td><a href="actionTraget.php?order=<?php echo $row['Order'];?>&Nligne=<?php echo $row['Nligne'];?>" class="btn btn-danger">suprimer</a></td>
				<td><a href ="actionTraget.php?order2=<?php echo $row['Order'];?>&Nligne2=<?php echo $row['Nligne'];?>" class="btn btn-info">modifier</a></td>
				</tr>
				<?php
				}
				?>
				</tbody>
				</table>
	          </div>
			  
			  <div class="col-md-4">
			  <h3 class="text-center">ajouter trajet</h3>
			  <hr>
			  <form  action="AjouterT.php" method="POST">
			     <div class="form-group">
				   <label style="color: white;">numero de ligne</label>
				   					   <select name ="Nligne"  class="form-control">
							<?php
				
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT * FROM ligne";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>

				    <option  type ="text" "><?php echo $row['NLIGNE'];?></option>
			       
				<?php
				}
				?>
				</select>
				
				 
			     </div>
				 <div class="form-group">
				 
				 <br>
			        <label style="color: white;">nombre de station</label>
				    <input type="text" name="Number" class="form-control" placeholder="combien de ligne contient ce trajet?" required="">
			     </div>
							 <button type="submit" name="btn_Ajout" class="btn btn primary " >Enregistrer</button>
			    
				  <hr>
				 
			  </form>
	          </div>
	    </div>
	</div>


 //<?php $Val=array($row['Nligne'],$row['StationLib']);?>


</body>
</html>
