
<!DOCTYPE html>
<html>
<head>
<meta charset ="utf-8">
<title>Formulaire Des bus</title>
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
                  <h3 class="text-center">formulaire des bus</h3>
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
			         <th>Matricule bus</th>
					 <th>Numero ligne</th>
					 <td colspan="2" align="center">action</td>
			      </tr>
			    </thead>
				<tbody>
			    	<?php
				//require_once 'conection.php';
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT * FROM bus";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>
				
				<tr>
				<td><?php echo $row['MATBUS'];?></td>
				<td><?php echo $row['NLIGNE'];?></td>
				<td><a href ="action5.php?delete=<?php echo $row['MATBUS']?>" class="btn btn-danger">Supprimer</a></td>
				<td><a href ="action5.php?alter=<?php echo $row['MATBUS']?>" class="btn btn-info">modifier</a></td>
			    </tr>
				<?php
				}
				?>
				</tbody>
				</table>
	          </div>
			  <div class="col-md-4">
			  <h3 class="text-center">ajouter bus</h3>
			  <hr>
			  <form  action="action5.php" method="POST">
			     <div class="form-group">
				   <label style="color: white;">Matricule bus:</label>
				   <input type="text" name="MATBUS" class="form-control" placeholder="Entrer le matricule de bus" required="">
			     </div>
				 <div class="form-group">
			        <label style="color: white;">Numero ligne:</label>
					   <select name ="NLIGNE"  class="form-control">
							<?php
				
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT * FROM ligne";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>

				    <option  type ="text" "><?php echo $row['NLIGNE'];?></option>
			       
				<?php
				}?>
				     
			        </select>
			        
				    
			     </div>
				 <button type="submit" name="btn_Ajout" class="btn btn primary " >Enregistrer</button>
				  <hr>
				 
			  </form>
	          </div>
	    </div>
	</div>





</body>
</html>