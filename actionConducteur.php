<?php


require_once 'conection.php';

if(isset($_POST["Nom"], $_POST["Prenom"], $_POST["Numpermi"] , $_POST["MatBus"]))
	
{
    $Nom = htmlspecialchars($_POST['Nom']);
	$Prenom= htmlspecialchars($_POST['Prenom']);
	$Numpermi = htmlspecialchars($_POST['Numpermi']);
	$MatBus= htmlspecialchars($_POST['MatBus']);
	
	 $check = $bd->prepare('select Nom,Prenom,MatBus From conducteur WHERE Numpermi=?');
        $check-> execute(array($Numpermi));
        $data = $check->fetch();
        $row= $check->rowCount();
        if ($row == 0)
		{
			 if (strlen($Nom)<=30)
			 {
				 if (strlen($Prenom)<=30)
				 {
					 if (strlen($Numpermi)<=10)
					 {
                       if (strlen($MatBus)<=10)
					   {
                        // $Password = hash('sha256',$Password);
                          $ip =	$_SERVER['REMOTE_ADDR'];					 
	                       $sql = ("INSERT INTO conducteur (Nom,Prenom,Numpermi,MatBus) VALUES (:Nom,:Prenom,:Numpermi,:MatBus)");
						   $request = $bd->prepare($sql);
						   $request->execute(Array(
                                                'Nom' => $Nom,
                                                'Prenom' => $Prenom,
                                                'Numpermi' => $Numpermi,
												'MatBus' => $MatBus
                                            ));
                        header ('location:FormulairConducteur.php?reg_err = success');
                       }else header ('location:FormulairConducteur.php?reg_err-MatBus');
					 }else header ('location:FormulairConducteur.php?reg_err-Numpermi');	     
				 }else header ('location:FormulairConducteur.php?reg_err-Prenom');
             }else header ('location:FormulairConducteur.php?reg_err-Nom');
        }else header ('location:FormulairConducteur.php?reg_err-alredy');