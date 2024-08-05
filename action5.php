<?php


require_once 'conection.php';

if(isset($_POST["MATBUS"], $_POST["NLIGNE"]))
	
{
    $NLIGNE= htmlspecialchars($_POST['NLIGNE']);
	$MATBUS= htmlspecialchars($_POST['MATBUS']);
	
	
	 $check = $bd->prepare('select NLIGNE From bus WHERE MATBUS=?');
        $check-> execute(array($MATBUS));
        $data = $check->fetch();
        $row= $check->rowCount();
        if ($row == 0)
		{
			 //if (strlen($LIGNELIB)<=100)
			 //{
				 
					   
                        // $Password = hash('sha256',$Password);
                          $ip =	$_SERVER['REMOTE_ADDR'];					 
	                       $sql = ("INSERT INTO bus (NLIGNE,MATBUS) VALUES (:NLIGNE,:MATBUS)");
						   $request = $bd->prepare($sql);
						   $request->execute(Array(
                                                'NLIGNE' => $NLIGNE,
                                                'MATBUS' => $MATBUS   ));
							 header ('location:FormBusP.php?reg_err = success');					   
			  
            // }else header ('location:FormulairBus.php?reg_err-lib');									
                                                
                                         
           
        }else header ('location:FormBusP.php?reg_err-alredy');	 
}
if(isset ($_GET['delete']))
		
		{
			$id = $_GET['delete'];
			//echo $id ;
			
			//echo "whaaaaaaaaaaaaaaaaaaaaaaaaaats ";
			$sql = "delete FROM `bus` WHERE MATBUS='$id'";
			$request  = $bd->prepare($sql);
			$okay = $request->execute();
			if ($okay)
			{
				 header ('location:FormBusP.php?reg_err-supprimerB');
			}
			else{
				 header ('location:FormBusP.php?reg_err-superreur');
			}
		}
if (isset($_GET['alter']))
	{
       $id = $_GET['alter'];
           $sql = "select * FROM `bus` WHERE MATBUS='$id'";
			$request  = $bd->prepare($sql);
				$okay = $request->execute();
		/*	if ($okay)
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
			  <h3 class="text-center">modifier Bus</h3>
			  <hr>
			  <form  action="ModifierB.php" method="POST">
			     <div class="form-group">
				   <label style="color: white"> Numero del igne:</label>
				   <select name ="NLIGNE"  class="form-control">
							<?php
				
				 $bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT * FROM ligne";
				$result= mysqli_query($bd,$sql)or die("bad query");
				while($row = mysqli_fetch_assoc($result))
				{
				?>

				    <option  type ="text" "><?php echo $row['NLIGNE'];?></option>
			       
				<?php
				}?>
				     
			        </select>
			     </div>
				  <div class="form-group">
				    <label> </label>
				     <input type="hidden" name="MATBUS" class="form-control" value="<?php echo $object['MATBUS'];?>" >
			     </div>
				
				  
				  <button type="submit" name="btn_Ajout" class="btn btn primary " >Enregistrer les modification</button>
				  <hr>
				 
			  </form>
	          </div>
			  </body>
			  </html>