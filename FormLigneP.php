<!DOCTYPE html>
<html>
<head>
<meta charset ="utf-8">
<title>Formulaire Des Lignes</title>
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
                  <h3 class="text-center">formulaire des lignes</h3>
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
			         <th>Numero de Ligne</th>
					 <th>Nom de ligne</th>
					 <td colspan="2" align="center">Action</td>
			      </tr>
			    </thead>
			    <tbody>
						<?php
				//require_once 'conection.php';
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT * FROM ligne";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>
				<tr>
				<td><?php echo $row['NLIGNE'];?></td>
				<td><?php echo $row['LIGNELIB'];?></td>
				<td><a href ="action3.php?delete=<?php echo $row['NLIGNE']?>" class="btn btn-danger">Supprimer</a></td>
				<td><a href ="action3.php?alter=<?php echo $row['NLIGNE']?>" class="btn btn-info">modifier</a></td>
			    </tr>
				<?php
				}
				?>
				</tbody>
				</table>
	          </div>
			  <div class="col-md-4">
			  <h3 class="text-center">Ajouter Ligne</h3>
			  <hr>
			  <form  action="action3.php" method="POST">
			     <div class="form-group">
				   <label style="color: white;">Numero de ligne:</label>
		         <input type="text" name="NLIGNE" class="form-control" placeholder="Taper nom de ligne" required="">
			     </div>
				 <div class="form-group">
			        <label style="color: white;">Nom de Ligne:</label>
				    <input type="text" name="LIGNELIB" class="form-control" placeholder="Taper nom de ligne" required="">
			     </div>		  
				  <button type="submit" name="btn_Ajout" class="btn btn primary " >Enregistrer</button>
				  <hr>
				 
			  </form>
	          </div>
	    </div>
	</div>





</body>
</html>