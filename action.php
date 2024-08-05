<?php
require_once 'conection.php';

if(isset($_POST["Nom"], $_POST["Prenom"], $_POST["Numpermi"] , $_POST["MatBus"]))

{	
    $Nom =htmlspecialchars	($_POST["Nom"]);
    $Prenom =htmlspecialchars	($_POST["Prenom"]);
    $Numpermi =htmlspecialchars	($_POST["Numpermi"]);
    $MatBus =htmlspecialchars	($_POST["MatBus"]);
    $check =$bd->prepare('SELECT Nom,Prenom,Numpermi,MatBus from conducteur where Numpermi=?');
    $data=$chek->fetch();
    $row=$check->rowCount();
  if ($row == 0)
   {
	 if (strlen($Nom)<=30)
	 {
		if (strlen($Prenom)<=30)	
			{
		      if (strlen($Numpermi<=10)
			   {
				  if(strlen($MatBus<=10)
				   {                                                                                                                                                                                                                                                                                                                                                                                                                                       
					$ip=$_SERVER['Remote_ADDR'];
					$insert=$bd->prepare('INSERT INTO conducteur(Nom,Prenom,Numpermi,MatBus)VALUES(:Nom,:Prenom,:MatBus,:Numpermi');
					$inser->execute(array(
					'Nom' =>$Nom,
					'Prenom'=>$Prenom,
					'Numpermi'=>$Numpermi,
					'MatBus'=>$MatBus));
					header("location:FormulairConducteur.php?reg_err=sucess");
					
			    	}else header("location:FormulairConducteur.php?reg_err=matriculelenght");
				
			}else header("location:FormulairConducteur.php?reg_err=Numpermilenght");
			
		}else header("location:FormulairConducteur.php?reg_err=lastnamelenght");
	
	}else header("location:FormulairConducteur.php?reg_err=namelenght");
				
   }else header("location:FormulairConducteurphp?reg_err=already');




}
	
	
	
	
	
	
	
	
	
	
	
	
	
?>