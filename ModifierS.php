<?php 	

require_once 'conection.php'; 
 
     $IdStation = htmlspecialchars($_POST['IdStation']);
	$StationLib= htmlspecialchars($_POST['StationLib']);
	
	
	 $sql= " UPDATE `station` SET `StationLib`='".$StationLib."' WHERE `IdStation` = ".$IdStation." ";
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
   header ('location:FormStationP.php?reg_err-alterB');
  }
  ?>