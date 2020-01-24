<?php
include("header.html");
?>



  <!--Formulaire globale en index -->
<div id="formulaire_seul">
    <form  class="form_seul" method ="POST" Action ="Carte.php">
      <h1> Recherche </h1>
     <Label class= "label_authentification" ></label>
      <input type="text" name="search" />
        <input type="submit" value="valider">
    </form>
</div>
<footer>
        <p>©Thomas DUONG</p>
    </footer>
</body>

</html>
 <?php
include("footer.php");
?>
