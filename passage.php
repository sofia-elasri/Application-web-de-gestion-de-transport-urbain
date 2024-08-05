<!DOCTYPE html>
<html>
<head>
	<title>passage</title>
	<link rel="stylesheet" type="text/css" href="style6.css">
</head>
<body>
	<form method="POST" action="lignePasseX.php" >
		<div class="D">
			<legend class="Cs">Trouvez la liste des lignes passe par votre station</legend>
			<h5>choisez votre station</h5>
			   
			        <select name ="STAT"  class="sel">
							<?php
				
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT * FROM station";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>

				    <option  type ="text" style="font-size: 15px;"><?php echo $row['StationLib'];?></option>
			       
				<?php
				} 
				
				?>
				     
			        </select>
			
			<br><br><br><br>
			
			<input type="submit" name="PasseX"  value="Rchercher" class="sel" style="margin-left: 5px;">
			
		</div>
	</form>
	

	

</body>
</html>