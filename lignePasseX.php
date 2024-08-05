<!DOCTYPE html>
<html>
<head>
	<title>lignePasseX</title>
	<link rel="stylesheet" type="text/css" href="style5.css">
</head>
<body>




	<?php
	
	
		 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect");
		 
		 
	     if(isset ($_POST ["PasseX"])){

 
            if(isset ($_POST ["STAT"] )){
				$STAT = htmlspecialchars($_POST ["STAT"] );


               $sql = "select Nligne FROM `kenibus`.`traget` WHERE  StationLib = '".$STAT."' ";
  

$result = mysqli_query($bd,$sql) or die ("bad query");    
		
echo "<table border='6'>";
 echo	"<tr><th colspan='4' class='C1'>voici la liste des ligne que vous cherchez</th></tr>";
  echo   	"<tr><td class='TD'>Numero de ligne</td></tr>";


while ($row=mysqli_fetch_assoc($result)){
 $x=$row['Nligne'];
    echo   "<tr> <td class='TD'>{$x}</td></tr>";
  
}
		
		}
 echo   "</table>";
 
		 }
  ?>
  </body>
</html>