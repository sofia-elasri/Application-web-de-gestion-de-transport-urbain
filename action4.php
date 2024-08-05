<?php


require_once 'conection.php';

if(isset($_POST["StationLib"]))
	
{
    $IdStation= htmlspecialchars($_POST['IdStation']);
	$StationLib= htmlspecialchars($_POST['StationLib']);
	
	
	 $check = $bd->prepare('select StationLib From station WHERE IdStation=?');
        $check-> execute(array($IdStation));
        $data = $check->fetch();
        $row= $check->rowCount();
        if ($row == 0)
		{
			 if (strlen($StationLib)<=100)
			 {
				 
					   
                        // $Password = hash('sha256',$Password);
                          $ip =	$_SERVER['REMOTE_ADDR'];					 
	                       $sql = ("INSERT INTO station (IdStation,StationLib) VALUES (:IdStation,:StationLib)");
						   $request = $bd->prepare($sql);
						   $request->execute(Array(
                                                'IdStation' => $IdStation,
                                                'StationLib' => $StationLib   ));
							 header ('location:FormStationP.php?reg_err = success');					   
			  
             }else header ('location:FormStationP.php?reg_err-lib');									
                                                
                                         
           
        }else header ('location:FormStationP.php?reg_err-alredy');	 
}		
if(isset ($_GET['delete']))
		
		{
			$id = $_GET['delete'];
			//echo $id ;
			
			//echo "whaaaaaaaaaaaaaaaaaaaaaaaaaats ";
			$sql = "delete FROM `station` WHERE IdStation='$id'";
			$request  = $bd->prepare($sql);
			$okay = $request->execute();
			if ($okay)
			{
				 header ('location:FormStationP.php?reg_err-supprimerB');
			}
			else{
				 header ('location:FormStationP.php?reg_err-superreur');
			}
			
		}
			if (isset($_GET['alter']))
	{
       $id = $_GET['alter'];
           $sql = "select * FROM `station` WHERE IdStation='$id'";
			$request  = $bd->prepare($sql);
				$okay = $request->execute();
			/*if ($okay)
			{
				 header ('location:FormStationP.php?reg_err-modifB');
			}
			else{
				 header ('location:FormStationP.php?reg_err-modif');
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
			  <h3 class="text-center">modifier Station</h3>
			  <hr>
			  <form  action="ModifierS.php" method="POST">
			     <div class="form-group">
				   <label style="color: white;"> station Libelle:</label>
				   <input type="text" name="StationLib" class="form-control" value="<?php echo $object['StationLib'];?>" required="" >
			     </div>
				  <div class="form-group">
				    <label> </label>
				     <input type="hidden" name="IdStation" class="form-control" value="<?php echo $object['IdStation'];?>" >
			     </div>
				
				  
				  <button type="submit" name="btn_Ajout" class="btn btn primary " >Enregistrer les modification</button>
				  <hr>
				 
			  </form>
	          </div>
			  </body>
			  </html>