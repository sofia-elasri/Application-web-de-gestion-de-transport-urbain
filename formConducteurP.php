
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

     <div class="contrainer col-md-12">
         <div class="row justify-content-center">
             <div class="col-md-8">
			 <br>
                  <h3 class="text-center">     formulaire des conducteur</h3>
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
			         <th>Nom</th>
					 <th>Prenom</th>
					 <th>Numero de permi</th>
					 <th>matricule de bus</th>
					 <td colspan="2" align="center">action</td>
			      </tr>
			    </thead>
			    <tbody>
				<?php
				//require_once 'conection.php';
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT * FROM conducteur";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>
				<tr>
				<td><?php echo $row['Nom'];?></td>
				<td><?php echo $row['Prenom'];?></td>
				<td><?php echo $row['Numpermi'];?></td>
				<td><?php echo $row['MatBus'];?></td>
				<td><a href ="#" class="btn btn-danger">Supprimer</a></td>
				<td><a href ="#" class="btn btn-info">modifier</a></td>
				</tr>
				<?php
				}
				?>
				</tbody>
				</table>
	          </div>
			  <div class="col-md-4">
			  <h3 class="text-center">ajouter Conducteur</h3>
			  <hr>
			  <form  action="action2.php" method="Post">
			     <div class="form-group">
				   <label> Nom:</label>
				   <input type="text" name="Nom" class="form-control" placeholder="Taper votre nom" >
			     </div>
				 <div class="form-group">
			        <label> Prenom:</label>
				    <input type="text" name="Prenom" class="form-control" required="">
			     </div>
				 <div class="form-group">
				    <label> numero du permi:</label>
				     <input type="text" name="Numpermi" class="form-control"  required="">
			     </div>
				 <div class="form-group">
				     <label> matreculle de bus:</label>
				     <input type="text" name="MatBus"Class="form-control"  required="">
			     </div>
				  
				  <button type="submit" name="btn_Ajout" class="btn btn primary " >Enregistrer</button>
				  <hr>
				 
			  </form>
	          </div>
	    </div>
	</div>





</body>
</html>