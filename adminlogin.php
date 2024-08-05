<?php
if(isset($_POST['submit']))
{
$Email = $_POST['user'];
$Pasword = $_POST['Password'];


//toprevent mysql injection


$Email = stripcslashes($Email);
$Pasword = stripcslashes($Pasword);
$Email =mysql_real_escape_string($Email);
$Pasword =mysql_real_escape_string($Pasword);



//connect to the server and select database
mysql_connect("localhost","root","");
mysql_select_db("kenibus");
//query the database for admin
$result = mysql_query("select *from administrateur where Email ='$Email' and Pasword ='$Pasword'")
         or die ("failed to query database".mysql_error());
		 $row =mysql_fetch_array($result);
		 if($row['Email'] == $Email && $row['Pasword'] == $Pasword){
			 header ('location:MenuAdmin.php');
			 echo "login seuccess!! welcome ".$row['Nom'];
		 }else {
			 header ('location:welcomadmin.php? loginERROR');
		 }

}




?>