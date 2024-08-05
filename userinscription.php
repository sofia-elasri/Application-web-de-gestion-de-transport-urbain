<?php

require_once 'conection.php';

if(isset($_POST["Email"], $_POST["Password"], $_POST["Password2"] , $_POST["CneU"]))
{
    $Email = htmlspecialchars($_POST['Email']);
	$Password = htmlspecialchars($_POST['Password']);
	$Password2 = htmlspecialchars($_POST['Password2']);
	$CneU = htmlspecialchars($_POST['CneU']);
	
	 $check = $bd->prepare('select Email,Password From Utilisateurs WHERE Email=?');
        $check-> execute(array($Email));
        $data = $check->fetch();
        $row= $check->rowCount();
        if ($row == 0)
		{
			 if (strlen($email)<=60)
			 {
				 if (strlen($Password)<=40)
				 {
					 if (filter_var($Email, FILTER_VALIDATE_EMAIL))
					 {
                       if ($Password ==$Password2)	
					   {
                        // $Password = hash('sha256',$Password);
                          $ip =	$_SERVER['REMOTE_ADDR'];					 
	                       $sql = "INSERT INTO utilisateurs(CneU,Email,Password) VALUES (:CneU,:Email,:Password)";
						   $request = $bd->prepare($sql);
						   $request->execute(Array(
                                                'CneU' => $CneU,
                                                'Email' => $Email,
                                                'Password' => $Password
                                            ));
                        header ('location:user.php?reg_err = success');
                       }else header ('location:user.php?reg_err-Password');
					 }else header ('location:user.php?reg_err-Email');	     
				 }else header ('location:user.php?reg_err-Email_lenght');
             }else header ('location:user.php?reg_err-Password_lenght');
        }else header ('location:user.php?reg_err-alredy');	 
/*$bd = new PDO('mysql:host=localhost;dbname=kenibus;charset-Utf8','root','');
$sql = "INSERT INTO utilisateurs(CneU,Email,Password) VALUES (:CneU,:Email,:Password)";
$request = $bd->prepare($sql);
$request->bindParam(':CneU', $CneU);
$request->bindParam(':Email', $Email);
$request->bindParam(':Password', $password)	;
$request->execute(Array(
'CneU' => $CneU,
'Email' => $Email,
'Password' => $Password


));
Header ("location:user.php");*/
	


}





?>