<?php 
include('parametreB.inc.php');

try {
$con='mysql:host='.$host.';dbname='.$db;
$bd = new PDO($con,$user,$pwd,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e){
	die('Connexion impossible à la base de données !'.$e->getMessage());
}
?>
