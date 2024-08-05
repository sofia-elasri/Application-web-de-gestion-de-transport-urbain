<?php


require_once 'conection.php';

if(isset($_POST["Nom"], $_POST["Prenom"], $_POST["Email"] , $_POST["Password"],$_POST['CneD']))
	
{
    $Nom = htmlspecialchars($_POST['Nom']);
	$Prenom = htmlspecialchars($_POST['Prenom']);
	$Email = htmlspecialchars($_POST['Email']);
	$Password = htmlspecialchars($_POST['Password']);
	$CneD = htmlspecialchars($_POST['CneD']);
	
	 $check = $bd->prepare('select Nom,Prenom,Email,Password From decideur WHERE CneD=?');
        $check-> execute(array($CneD));
        $data = $check->fetch();
        $row= $check->rowCount();
        if ($row == 0)
		{
			 if (strlen($Nom)<=30)
			 {
				 if (strlen($Prenom)<=30)
				 {
					  if (strlen($CneD)<=10)
					   {
					      if (filter_var($Email, FILTER_VALIDATE_EMAIL))
						  {
							  if (strlen($Password)<=40)
					               {
                        // $Password = hash('sha256',$Password);
                          $ip =	$_SERVER['REMOTE_ADDR'];					 
	                       $sql = ("INSERT INTO decideur (Nom,Prenom,Password,Email,CneD) VALUES (:Nom,:Prenom,:Password,:Email,:CneD)");
						   $request = $bd->prepare($sql);
						   $request->execute(Array(
                                                'Nom' => $Nom,
                                                'Prenom' => $Prenom,
                                                'Password' => $Password,
												'Email' => $Email,
												'CneD' => $CneD
                                            ));
                        header ('location:FormDecidP.php?reg_err = success');
                       }else header ('location:FormDecidP.php?reg_err-Passwordlenght');
					 }else header ('location:FormDecidP.php?reg_err-Emailincorrect');	     
				 }else header ('location:FormDecidP.php?reg_err-CneDinvalide');
             }else header ('location:FormDecidP.php?reg_err-Prenom');
		 }else header ('location:FormDecidP.php?reg_err-Nom');
      }else header ('location:FormDecidP.php?reg_err-alredy');
}
if(isset ($_GET['delete']))
		
		{
			$id = $_GET['delete'];
			//echo $id ;
			$sql = "delete FROM `decideur` WHERE CneD='$id'";
			$request  = $bd->prepare($sql);
			$okay = $request->execute();
			if ($okay)
			{
				 header ('location:FormDecidP.php?reg_err-supprimer');
			}
			else{
				 header ('location:FormDecidP.php?reg_err-superreur');
			}
			
		}
			///cette partie pour modification ici es bien marcher  le probleme dans la page ModifierC.php
	if (isset($_GET['alter']))
	{
       $id = $_GET['alter'];
           $sql = "select * FROM `decideur` WHERE CneD='$id'";
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
			  <h3 class="text-center">modifier les infos  de decideur</h3>
			  <hr>
			  <form  action="ModifierD.php" method="POST">
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
				     <input type="hidden" name="CneD" class="form-control" value="<?php echo $object['CneD'];?>" >
			     </div>
				 <div class="form-group">
				     <label style="color: white;"> Email:</label>
				     <input type="text" name="Email"Class="form-control" value="<?php echo $object['Email'];?>" required="">
			     </div>
				  
				  <button type="submit" name="btn_Ajout" class="btn btn primary " >Enregistrer les modification</button>
				  <hr>
				 
			  </form>
	          </div>
