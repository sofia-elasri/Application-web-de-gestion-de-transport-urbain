<!DOCTYPE html>
<html>
<head>
     <title>liste des lignes</title>
     <link rel="stylesheet" type="text/css" href="style8.css">
     <link rel="stylesheet" type="text/css" href="style5.css">
</head>
<body>
          <h2 style="color:black;font-size: 30px;margin-left: 100px;">Voici votre liste de voyages</h2>
    
   
     <table border='6' style="float: left; width: 400px;">
      <thead><tr><th colspan='6' class='C1'>Liste Des lLignes</th></tr></thead>
      <tbody>
      <tr><td class="TD">Numero de Ligne</td><td class="TD">station depart</td><td class="TD">station arriver</td><td class="TD">longLigne(km)</td><td class="TD">duree de voyage</td><td class="TD">tarif(dh)</td></tr>

<?php    
$bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
  
 $sql ="select * from voyages";
 $result = mysqli_query($bd,$sql) or die ("bad query"); 
 while ($row=mysqli_fetch_assoc($result))
 {

 ?>
 <tr><td class="TD"><?php echo $row['Nligne'];?></td>
 <td class="TD"><?php echo $row['Deppart'];?></td>
 <td class="TD"><?php echo $row['Arriver'];?></td>
 <td class="TD"><?php echo $row['LongLigne(Km)'];?></td>
 <td class="TD"><?php echo $row['duree'];?></td>
 <td class="TD"><?php echo $row['Tarif'];?></td></tr>
 <?php
  
}
?>
</tbody>
</table>

     <form method="GET" action="">
          <div class="D">
               <legend class="Cs" style="margin-top:0px;">Acheter un billet</legend>
               <label class="leb" style="margin-top:1px;">entrer le numero de ligne</label><br>
               <input type="text" name="départ" class="sel">
               <br>
               <label class="leb">entrer la date (jour)</label><br>
               <input type="text" name="arrivé" class="sel">
               <a href="ticket.html">
               <div class="D1">
               <input type="submit" value="Acheter" class="int" >
               </div>
               </a>
          </div>
     </form>
</body>
</html>