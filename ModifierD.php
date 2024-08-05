<?php 	

require_once 'conection.php'; 
 
     $CneD = htmlspecialchars($_POST['CneD']);
	$Email= htmlspecialchars($_POST['Email']);
	$Prenom= htmlspecialchars($_POST['Prenom']);
	$Nom = htmlspecialchars($_POST['Nom']);
	
	
	
	 $sql= " UPDATE `decideur` SET `Nom`='".$Nom."' ,`Prenom`='".$Prenom."' , `Email`= '".$Email."'  WHERE `CneD` = '".$CneD."' ";
	 echo $sql;
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
 				 header ('location:FormDecidP.php?reg_err-alterB');
  }
  ?>