<?php 	

require_once 'conection.php'; 
 
     $MATBUS = htmlspecialchars($_POST['MATBUS']);
	$NLIGNE= htmlspecialchars($_POST['NLIGNE']);
	
	
	 $sql= " UPDATE `bus` SET `NLIGNE`='".$NLIGNE."' WHERE `MATBUS` = ".$MATBUS." ";
	//" UPDATE `conducteur` SET `Nom`=".$Nom." ,`Prenom`=".$Prenom." , `MatBus`= ".$MatBus."  WHERE `Numpermi` = ".$Numpermi." ";
		$request  = $bd->prepare($sql);
				$okay = $request->execute();
		
	//echo $sql;		
			//$request  = $bd->prepare($sql);
			//$okay = $request->execute();
  if (!$okay)
  {
  echo "erreur dans l'execution de requete</br>";
  
  }
  else {
 				 header ('location:FormBusP.php?reg_err-alterB');
  }
  ?>