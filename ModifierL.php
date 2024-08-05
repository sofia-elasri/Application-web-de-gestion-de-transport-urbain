<?php 	

require_once 'conection.php'; 
 
     $LIGNELIB= htmlspecialchars($_POST['LIGNELIB']);
	$NLIGNE= htmlspecialchars($_POST['NLIGNE']);
	
	
	 $sql= " UPDATE `ligne` SET `LIGNELIB`='".$LIGNELIB."' WHERE `NLIGNE` = ".$NLIGNE." ";
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
 				 header ('location:FormligneP.php?reg_err-alterB');
  }
  ?>