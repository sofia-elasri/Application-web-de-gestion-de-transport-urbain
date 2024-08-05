<?php


require_once 'conection.php';

if(isset($_POST['Deppart'], $_POST['Arriver'],$_POST["Tarif"],$_POST["LongLigne(Km)"],$_POST["Nligne"],$_POST["duree"]))
	
{
    $Deppart= htmlspecialchars($_POST['Deppart']);
	$Arriver= htmlspecialchars($_POST['Arriver']);
	 $Nligne= htmlspecialchars($_POST['Nligne']);
	$LongLigne= htmlspecialchars($_POST['LongLigne(Km)']);
	 $Tarif= htmlspecialchars($_POST['Tarif']);
	$duree= htmlspecialchars($_POST['duree']);


				 
		 echo "</br>";			   
                      
                          //$ip =	$_SERVER['REMOTE_ADDR'];
                            $sql = "INSERT INTO `kenibus`.`voyages`(`Deppart`,`Arriver`, `Tarif`, `LongLigne(Km)`, `Nligne`, `duree`) VALUES ('".$Deppart."' ,  '".$Arriver."' , '".$Tarif."'  , '".$LongLigne."' ,'".$Nligne."' , '".$duree."')";			
	                       // "INSERT INTO  (Deppart,Arriver,Tarif,LongLigne(Km),Nligne,duree) VALUES ('".$Deppart."' ,  '".$Arriver."' , '".$Nligne."' , '".$LongLigne."' , '".$Tarif."' , '".$duree."')";
						   $request = $bd->prepare($sql);
						  $query = mysql_query($sql);
						  // echo $sql;
						   echo "</br>";
						  //$request->execute();
						   
		                                      										
						
							if($query){
								header ('location:formVoyaagesP.php?reg_err = success');	
							//echo" bien fait";
							}
							else{
							echo mysql_error();
							}
												   
								//	}else echo "ereuuuuuur";
		
           							
                                                
                                         
           
 }
		
		if(isset ($_GET['delete']))
		{
			$id = $_GET['delete'];
			$sql = "DELETE  FROM voyages WHERE IdVoyages='$id'";
			$request = $bd->prepare($sql);
			$okay = $request->execute();
			if ($okay )
			{
					 header ('location:formVoyaagesP.php?reg_err-supprimer');
			}
			else{
				 header ('location:formVoyaagesP.php?reg_err-supprimererreur');
		       }
		}

		///cette partie pour modification ici es bien marcher  le probleme dans la page ModifierC.php
	if (isset($_GET['alter']))
	{
       $id = $_GET['alter'];
           $sql = "select * FROM `voyages` WHERE Idvoyages= '$id' ";
			$request  = $bd->prepare($sql);
				$okay = $request->execute();
			//if ($okay)
			//{
			//	 header ('location:ModifierV.php?reg_err-ModifierB');
			//}
			//else{
			//	 header ('location:ModifierV.php?reg_err-superreur');
	           // }
	
			$object =$request->fetch();
	  // var_dump($object);
	}
?>
	<!DOCTYPE html>
<html>
<head>
<meta charset ="utf-8">
<title>Formulaire Des Bus></title>
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
	          

  <div class="col-md-4">
			  <h3 class="text-center">    modifier voyages     </h3>
			  <hr>
			  <form  action="ModifierV.php" method="POST">
			     <div class="form-group">
				   <label style="color: white;">Station Déppart:</label>
				   <select name="Deppart" class="form-control">
				   			<?php
				//require_once 'conection.php';
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT * FROM station";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>

				    <option type="text" ><?php echo $row['StationLib'];?></option>
			       
				<?php
				}
				?>
				    
			        </select>
				   <!--<input type="text" name="Nom" class="form-control" placeholder="Taper votre nom" required="">-->
				   
			     </div>
				 <div class="form-group">
			        <label style="color: white;">Station arrive:</label>
			        <select name ="Arriver"  class="form-control">
							<?php
				//require_once 'conection.php';
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT * FROM station";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>

				    <option  type ="text" "><?php echo $row['StationLib'];?></option>
			       
				<?php
				}?>
				     
			        </select>
				    <!--<input type="text" name="Prenom" class="form-control" placeholder="Taper votre Prenom" required=""-->
			     </div>
				 <div class="form-group">
				     <label style="color: white;">Tarif:</label>
				     <input type="text" name="Tarif"Class="form-control" placeholder="entrer tarif" required="">
			     </div>
			     <div class="form-group">
				     <label style="color: white;">LongLigne(km):</label>
				     <input type="text" name="LongLigne(Km)"Class="form-control" placeholder="entrer Long de Ligne" required="">
			     </div>
				  <div class="form-group">
				     <label style="color: white;">Numéro ligne:</label>
				     <select  name ="Nligne" class="form-control">
					 		<?php
				//require_once 'conection.php';
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT * FROM ligne";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>

				    <option><?php echo $row['NLIGNE'];?></option>
			       
				<?php
				}?>
				     
			        </select>
				     <!--<input type="text" name="MatBus"Class="form-control" placeholder="matricule de bus" required="">-->
			     </div>
			     <div class="form-group">
				     <label style="color: white;">Duree:</label>
				     <input type="text" name="duree"Class="form-control" placeholder="entrer la duree" required="">
			     </div>
				 <div class="form-group">
				    
				     <input type="hidden" name="IdVoyages" Class="form-control" value="<?php echo $object['IdVoyages'];?>">
			     </div>
			     
				  <button type="submit" name="btn_Ajout" class="btn btn primary " >Enregistrer les modification</button>
				  <hr>
				 
			  </form>
	          </div>
	    </div>
   </body>	
  </html>

