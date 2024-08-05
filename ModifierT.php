<?php 	

require_once 'conection.php'; 
 
     $StationLib = htmlspecialchars($_POST['StationLib']);
	$Order= htmlspecialchars($_POST['Order']);
	$Nligne= htmlspecialchars($_POST['Nligne']);
	
		 //$test = "UPDATE  `kenibus`.`traget` SET    WHERE `traget`.`Nligne` = '$Nligne' AND `traget`.`Order` = '$Order'";
	
	
	 $sql= " UPDATE `traget` SET `StationLib`='".$StationLib."'   WHERE `Order` = '".$Order."' AND `Nligne` = ".$Nligne." "; 
	// echo $test;
	
		$request  = $bd->prepare($sql);
				$okay = $request->execute();
		
	echo $sql;		
			$request  = $bd->prepare($sql);
			$okay = $request->execute();
  if (!$okay)
  {
  echo "<br> erreur dans l'execution de requete</br>";
  
  }
  else {
 				 header ('location:FormTraget.php?reg_err-alterB');
  }
  ?>