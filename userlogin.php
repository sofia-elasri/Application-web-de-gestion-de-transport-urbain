<?php
session_start();
require_once 'conection.php';


$Email = $_POST['user'];
$Password = $_POST['Password'];


if(isset ($Email,$Password))
   {	
        $Email = stripcslashes($Email);
        $Password = stripcslashes($Password);

	    $check = $bd->prepare('select Email,Password From Utilisateurs WHERE Email=?');
        $check-> execute(array($Email));
        $data = $check->fetch();
        $row= $check->rowCount();
        if ($row == 1)
        {
	       
		      
		        if ($data ['Password'] === $Password)
		        {
			      
		           header('location:menuU.php');
		        }else header('location:user.PHP?login_err-password');
	       
		
        }else header('location:user.PHP?login_err-already');
    }else header('location :user.php');








?>