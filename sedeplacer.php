<!DOCTYPE html>
<html>
<head>
  <title>se deplacer</title>
  <link rel="stylesheet" type="text/css" href="style5.css">
</head>
<body>

   			
	<?php
  $params = array();

  parse_str($_POST['data'], $params);
  //$SDP=$params['SDP'];
  $deppart=$params['Deppart'];
$arrive=$params['Arriver'];
	  $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect");
	  
      if(isset ($params['Deppart'] ,$params['Arriver']))
	{ 

         $Deppart= htmlspecialchars($deppart);
	     $Arriver= htmlspecialchars($arrive);
	
         $sql = "select Nligne FROM `kenibus`.`traget` WHERE  StationLib = '".$Deppart."' ";
  

         $result = mysqli_query($bd,$sql) or die ("bad query");    
		

 
           echo "<table border='6' class=\"r\">";
            echo	"<tr><th colspan='4' class='C1'> la liste des ligne</th></tr>";
                echo   	"<tr><td class='TD'>Numero de ligne</td></tr>";


             while ($row=mysqli_fetch_assoc($result))
		{
              	$x=$row['Nligne'];
	
	
                    	$sql2 = "select * FROM `kenibus`.`traget` WHERE  StationLib =  '".$Arriver."'  And Nligne = '$x'";
                         	
	                   
                    $result2 = mysqli_query($bd,$sql2) or die ("bad query2");
 
             while ($row=mysqli_fetch_assoc($result2))
			 {
               $y=$row['StationLib'] ;
	
	 
                    if(strcasecmp($y,$Arriver !== 0))
                        {
                            
 
                     echo   "<tr> <td class='TD'>{$row['Nligne']}</td></tr>";
  
                        }
              } 
 
          } echo   "</table>"; 

	}

 	
		
		//ici metter le traitement de plus court chemin
 
 
?>
</body>
</html> 