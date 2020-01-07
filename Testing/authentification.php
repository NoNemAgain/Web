<?php 
include("header.html");
?>

<div id="formulaire_seul">
<form  class="form_seul" method ="POST" Action ="authentification.php">
  <h1> Authentification </h1>
 <Label class= "label_authentification" for ="prenom">Login:</label>
  <input type="text" name="login" />
  <Label class= "label_authentification" for ="prenom">Mot de passe:</label>
  <input type="password" name="password"/> 
    <input type="submit" value="valider">
</form>  
</div>


<?php

if (isset($_POST["login"])&&isset($_POST["password"])){
		$login= $_POST["login"];
		$password =$_POST["password"];
		include("connexion.inc.php");
		$req ='SELECT * FROM Login where login = "'.$login.'"';
		$execute=$bd->query($req);
		$result = $execute -> fetch();
		if (!$result){
			echo "Les champs entrés sont faux ";
			header('refresh:1; authentification.php');
		}
		else {
			if ($result["password"]==md5($password)){
				session_start();
				$_SESSION["login"]=$result["login"];
				$_SESSION["password"]=$result["password"];
				header('refresh:1; index.html');
			


			}
			else{
				echo "Mot de passe faux .";
				header('refresh:3; authentification.php');
			}
		}
}

?>