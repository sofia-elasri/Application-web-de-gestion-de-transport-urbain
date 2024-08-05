<!DOCTYPE html>

<html>
<head>
<title>liste  des  station </title>
	<link rel="stylesheet" type="text/css" href="style5.css">
</head>
<body style="background-image:url(images/tttttt.jpg);">
	
		<h2 style="color:black;font-size: 30px;margin-left:22px;">Voici votre liste de station </h2>

   <table border='6'>
   	<thead>
     <tr><th colspan='2' class='C1'>Liste Des stations</th></tr></thead>
    <tbody>
      <tr><td class="TD">statio_nnum</td><td class="TD">Nom de station</td></tr>

<?php	
  $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
  
 $sql ="select * from station";
$result = mysqli_query($bd,$sql) or die ("bad query"); 
while ($row=mysqli_fetch_assoc($result))
{
	?>
 
   <tr><td class="TD"><?php echo $row['IdStation'];?></td>
   	<td class="TD"><?php echo $row['StationLib'];?></td></tr>
 <?php  	
 }
 ?>
</tbody>
 </table>
</body>
</html>