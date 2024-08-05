<?php


require_once 'conection.php';

if(isset($_POST["LIGNELIB"], $_POST["NLIGNE"]))
	
{
    $NLIGNE= htmlspecialchars($_POST['NLIGNE']);
	$LIGNELIB= htmlspecialchars($_POST['LIGNELIB']);
	
	
	 $check = $bd->prepare('select LIGNELIB From ligne WHERE NLIGNE=?');
        $check-> execute(array($NLIGNE));
        $data = $check->fetch();
        $row= $check->rowCount();
        if ($row == 0)
		{
			 if (strlen($LIGNELIB)<=100)
			 {
				 
					   
                        // $Password = hash('sha256',$Password);
                          $ip =	$_SERVER['REMOTE_ADDR'];					 
	                       $sql = ("INSERT INTO ligne (Nligne,LIGNELIB) VALUES (:NLIGNE,:LIGNELIB)");
						   $request = $bd->prepare($sql);
						   $request->execute(Array(
                                                'NLIGNE' => $NLIGNE,
                                                'LIGNELIB' => $LIGNELIB   ));
							 header ('location:FormligneP.php?reg_err = success');					   
			  
             }else header ('location:FormligneP.php?reg_err-lib');									
          }else header ('location:FormligneP.php?reg_err-alredy');                                      
                                         
           
}     
  
if(isset ($_GET['delete']))
		
		{
			$id = $_GET['delete'];
			//echo $id ;
			
			//echo "whaaaaaaaaaaaaaaaaaaaaaaaaaats ";
			$sql = "delete FROM `ligne` WHERE NLIGNE='$id'";
			$request  = $bd->prepare($sql);
			$okay = $request->execute();
			if ($okay)
			{
				 header ('location:FormligneP.php?reg_err-supprimerB');
			}
			else{
				 header ('location:FormligneP.php?reg_err-superreur');
			}
		
		}	
		
		if (isset($_GET['alter']))
	{
       $id = $_GET['alter'];
	   //echo $id ; 
	   echo "<br>";
	   
           $sql = "select * FROM `ligne` WHERE NLIGNE='$id'";
		//   echo $sql;
		   
			$request  = $bd->prepare($sql);
		$okay = $request->execute();
		/*
if	($okay)
			{ 
				 header ('location:FormStationP.php?reg_err-modifB');
			}
			else{
				 header ('location:FormligneP.php?reg_err-modif');
			
			} */
			$object =$request->fetch();
	   //var_dump($object);*/
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
	          </div>
			  <div class="col-md-4">
			  <h3 class="text-center">modifier ligne</h3>
			  <hr>
			  <form  action="ModifierL.php" method="POST">
			     <div class="form-group">
				   <label style="color: white;"> ligne libelle</label>
				   <input type="text" name="LIGNELIB" class="form-control" value="<?php echo $object['LIGNELIB'];?>" required="" >
			     </div>
				  <div class="form-group">
				    <label> </label>
				     <input type="hidden" name="NLIGNE" class="form-control" value="<?php echo $object['NLIGNE'];?>" >
			     </div>
				
				  
				  <button type="submit" name="btn_Ajout" class="btn btn primary " >Enregistrer les modification</button>
				  <hr>
				 
			  </form>
	          </div>
			  </body>
			  </html>
	

