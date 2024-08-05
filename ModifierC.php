<?php 	

require_once 'conection.php'; 
 
     $Nom = htmlspecialchars($_POST['Nom']);
	$Prenom= htmlspecialchars($_POST['Prenom']);
	$Numpermi = htmlspecialchars($_POST['Numpermi']);
	$MatBus= htmlspecialchars($_POST['MatBus']);
	
	 $sql= " UPDATE `conducteur` SET `Nom`='".$Nom."' ,`Prenom`='".$Prenom."' , `MatBus`= '".$MatBus."'  WHERE `Numpermi` = ".$Numpermi." ";
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
   header ('location:FormulairConducteur.php?reg_err-alterB');
  }
  ?>
  