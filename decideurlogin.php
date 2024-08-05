<?php

$Email = $_POST['user'];
$Password = $_POST['Password'];


//toprevent mysql injection


$Email = stripcslashes($Email);
$Password = stripcslashes($Password);
$Email =mysql_real_escape_string($Email);
$Password =mysql_real_escape_string($Password);



//connect to the server and select database
mysql_connect("localhost","root","");
mysql_select_db("kenibus");
//query the database for admin
$result = mysql_query("select *from decideur where Email ='$Email' and Password ='$Password'")
         or die ("failed to query database".mysql_error());
		 $row =mysql_fetch_array($result);
		 if($row['Email'] == $Email && $row['Password'] == $Password){
			 		          header('location:MenuD.php');
			 //echo "login seuccess!! welcome ".$row['Nom'];
		 }else {
			 echo "failed to login";
		 }






?>