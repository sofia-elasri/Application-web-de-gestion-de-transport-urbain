<?php


$user = 'root';
$pass = '';

try {
$bd = new PDO('mysql:host=localhost;dbname=kenibus;charset-Utf8',$user,$pass);
}catch(PDOException $e)
{
	print "Erreur:" . $e->getMessage() . "<br/>";
	die;

}
?>