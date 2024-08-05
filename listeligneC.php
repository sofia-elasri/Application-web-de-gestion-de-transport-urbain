<!DOCTYPE html>
<html>
<head>
	<title>liste des lignes</title>
	<link rel="stylesheet" type="text/css" href="style5.css">
</head>
<body style="background-image:url(images/tttttt.jpg);">
	
		<h2 style="color:black;font-size: 30px;margin-left: 100px;" >Voici votre liste de Lignes</h2>

       
     
          
      <table border='6'>
  <thead><tr><th colspan='2' class='C1'>Liste Des lLignes</th></tr> </thead> 
  <tbody>
       <tr><td class="TD">Numero de Ligne</td><td class="TD">Nom de ligne</td></tr>

  <?php 
      $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
  
     $sql ="select * from ligne";
     $result = mysqli_query($bd,$sql) or die ("bad query");  
      while ($row=mysqli_fetch_assoc($result))
{
 
    ?>

   <tr><td class="TD"><?php echo $row['NLIGNE'];?> </td><td class="TD"><?php echo $row['LIGNELIB'] ;?></td></tr>
  <?php
}
?>
</tbody>
  </table>

</body>
</html>