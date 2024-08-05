<!DOCTYPE html>
<html>
<head>
<meta charset ="utf-8">
<title>Formulaire Des Voyage</title>
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
                  <h3 class="text-center">formulaire des voyage
                  </h3>
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
			         <th>station départ</th>
					 <th>station d'arrive</th>
					 <th>Trif</th>
					 <th>long de ligne(km)</th>
					 <th>Numero de ligne</th>
					 <th>duree</th>
					 <th>idvoyage</th>
					 <td colspan="2" align="center">action</td>
			      </tr>
			    </thead>
				<tbody>
					<?php
				//require_once 'conection.php';
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT * FROM voyages";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>
				<tr>
				<td><?php echo $row['Deppart'];?></td>
				<td><?php echo $row['Arriver'];?></td>
				<td><?php echo $row['Tarif'];?></td>
				<td><?php echo $row['LongLigne(Km)'];?></td>
				<td><?php echo $row['Nligne'];?></td>
				<td><?php echo $row['duree'];?></td>
				<td><?php echo $row['IdVoyages'];?></td>
				<td><a href = "actionvoyage.php?delete=<?php echo $row['IdVoyages']?>" class="btn btn-danger">Supprimer</a></td>
				<td><a href ="actionvoyage.php?alter=<?php echo $row ['IdVoyages']?>" class="btn btn-info">modifier</a></td>
			    </tr>
				<?php
				}
				?>
				</tbody>
				</table>
	          </div>
			  
			  
			  
			  <div class="col-md-4">
			  <h3 class="text-center">    ajouter Voyage     </h3>
			  <hr>
			  <form  action="actionvoyage.php" method="POST">
			     <div class="form-group">
				   <label style="color: white;">Station Déppart:</label>
				   <select name="Deppart" class="form-control">
				   			<?php
				//require_once 'conection.php';
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT * FROM station";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>

				    <option type="text" ><?php echo $row['StationLib'];?></option>
			       
				<?php
				}
				?>
				    
			        </select>
				   <!--<input type="text" name="Nom" class="form-control" placeholder="Taper votre nom" required="">-->
				   
			     </div>
				 <div class="form-group">
			        <label style="color: white;">Station arrive:</label>
			        <select name ="Arriver"  class="form-control">
							<?php
				//require_once 'conection.php';
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT * FROM station";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>

				    <option  type ="text" "><?php echo $row['StationLib'];?></option>
			       
				<?php
				}?>
				     
			        </select>
				    <!--<input type="text" name="Prenom" class="form-control" placeholder="Taper votre Prenom" required=""-->
			     </div>
				 <div class="form-group">
				     <label style="color: white;">Tarif:</label>
				     <input type="text" name="Tarif"Class="form-control" placeholder="entrer tarif" required="">
			     </div>
			     <div class="form-group">
				     <label style="color: white;">LongLigne(km):</label>
				     <input type="text" name="LongLigne(Km)"Class="form-control" placeholder="entrer Long de Ligne" required="">
			     </div>
				  <div class="form-group">
				     <label style="color: white;">Numéro ligne:</label>
				     <select  name ="Nligne" class="form-control">
					 		<?php
				//require_once 'conection.php';
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT * FROM ligne";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>

				    <option><?php echo $row['NLIGNE'];?></option>
			       
				<?php
				}?>
				     
			        </select>
				     <!--<input type="text" name="MatBus"Class="form-control" placeholder="matricule de bus" required="">-->
			     </div>
			     <div class="form-group">
				     <label style="color: white;">Duree:</label>
				     <input type="text" name="duree"Class="form-control" placeholder="entrer la duree" required="">
			     </div>
			     
				  <button type="submit" name="btn_Ajout" class="btn btn primary " >Enregistrer</button>
				  <hr>
				 
			  </form>
	          </div>
	    </div>
	</div>





</body>
</html>