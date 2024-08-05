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
}
	if(isset ($_GET['delete']))
		
		{
			$id = $_GET['delete'];
			//echo $id ;
			$sql = "delete FROM `conducteur` WHERE Numpermi='$id'";
			$request  = $bd->prepare($sql);
			$okay = $request->execute();
			if ($okay)
			{
				 header ('location:FormulairConducteur.php?reg_err-supprimer');
			}
			else{
				 header ('location:FormulairConducteur.php?reg_err-superreur');
			}
			
		}
		
		///cette partie pour modification ici es bien marcher  le probleme dans la page ModifierC.php
	if (isset($_GET['alter']))
	{
       $id = $_GET['alter'];
           $sql = "select * FROM `conducteur` WHERE Numpermi='$id'";
			$request  = $bd->prepare($sql);
				$okay = $request->execute();
			/*if ($okay)
			{
				 header ('location:FormulairConducteur.php?reg_err-supprimerB');
			}
			else{
				 header ('location:FormulairConducteur.php?reg_err-superreur');
			}*/
			$object =$request->fetch();
	   //var_dump($object);
	}
?>




<!DOCTYPE html>
<html>
<head>
<meta charset ="utf-8">
<title>Formulaire Des conducteur></title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<style>
body{
background-color: #000;}
h1,h2,h3,h4,h5,h6{
color: #fff;}
hr{ border-color: #999;}
tr,th,td{
color: #fff;}
input[type="text"]{
background-color: #999;}
</style>



</head>

<body>
	          </div>
			  <div class="col-md-4">
			  <h3 class="text-center">modifier les infos Conducteur</h3>
			  <hr>
			  <form  action="ModifierC.php" method="POST">
			     <div class="form-group">
				   <label style="color: white;"> Nom:</label>
				   <input type="text" name="Nom" class="form-control" value="<?php echo $object['Nom'];?>" required="" >
			     </div>
				 <div class="form-group">
			        <label style="color: white;"> Prenom:</label>
				    <input type="text" name="Prenom" class="form-control" value="<?php echo $object['Prenom'];?>" required="">
			     </div>
				 <div class="form-group">
				    <label> </label>
				     <input type="hidden" name="Numpermi" class="form-control" value="<?php echo $object['Numpermi'];?>" >
			     </div>
				 <div class="form-group">
				     <label style="color: white;"> matreculle de bus:</label>
				     <input type="text" name="MatBus"Class="form-control" value="<?php echo $object['MatBus'];?>" required="">
			     </div>
				  
				  <button type="submit" name="btn_Ajout" class="btn btn primary " >Enregistrer les modification</button>
				  <hr>
				 
			  </form>
	          </div>





	
	
	
	
	
	
	
	
	

