<!DOCTYPE html>
<html>
<head>
<meta charset ="utf-8">
<title>Formulaire Des station</title>
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
                  <h3 class="text-center">formulaire des station</h3>
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
			         <th>id station</th>
					 <th>nom station</th>
					 <td colspan="2" align="center">action</td>
			      </tr>
			    </thead>
			    <tbody>
				<?php
				//require_once 'conection.php';
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT * FROM station";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>
				<tr>
				<td><?php echo $row['IdStation'];?></td>
				<td><?php echo $row['StationLib'];?></td>

				<td><a href = "action4.php?delete=<?php echo $row['IdStation']?>" class="btn btn-danger">Supprimer</a></td>
				<td><a href ="action4.php?alter=<?php echo $row['IdStation']?>" class="btn btn-info">modifier</a></td>
				</tr>
				<?php
				}
				?>
				</tbody>
				</table>
	          </div>
			  <div class="col-md-4">
			  <h3 class="text-center">ajouter station</h3>
			  <hr>
			  <form  action="action4.php" method="POST">
			    <!-- <div class="form-group">
				   <label>Id station:</label>
				   <input type="text" name="idStation" class="form-control" placeholder="Taper id station" required="">
			     </div>-->
				 <div class="form-group">
			        <label style="color: white;">nom station:</label>
				    <input type="text" name="StationLib" class="form-control" placeholder="Taper nom station" required="">
			     </div>
	
				  <button type="submit" name="btn_Ajout" class="btn btn primary " >Enregistrer</button>
				  <hr>
				 
			  </form>
	          </div>
	    </div>
	</div>





</body>
</html>