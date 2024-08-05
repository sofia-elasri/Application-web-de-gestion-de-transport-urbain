<?php 	


$bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); ;

if(isset($_POST['Deppart'], $_POST['Arriver'],$_POST["Tarif"],$_POST["LongLigne(Km)"],$_POST["Nligne"],$_POST["duree"],$_POST["IdVoyages"]))
	
{    $IdVoyages=htmlspecialchars($_POST["IdVoyages"]);
    $Deppart= htmlspecialchars($_POST['Deppart']);
	$Arriver= htmlspecialchars($_POST['Arriver']);
	 $Nligne= htmlspecialchars($_POST['Nligne']);
	$LongLigne= htmlspecialchars($_POST['LongLigne(Km)']);
	 $Tarif= htmlspecialchars($_POST['Tarif']);
	$duree= htmlspecialchars($_POST['duree']);
	
	
	 $sql= " UPDATE `voyages` SET `Deppart`='".$Deppart."' ,`Arriver`='".$Arriver."' , `Nligne`= '".$Nligne."', `LongLigne`= '".$LongLigne."', `duree`= '".$duree."', `Tarif`= '".$Tarif."'  WHERE `IdVoyages` = '".$IdVoyages."' ";
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
 				 header ('location:formVoyaagesP.php?reg_err-alterB');
}
}
  ?>