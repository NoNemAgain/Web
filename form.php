<?php

include("Api.php");
// fonction permettant de générer toutes les listes déroulantes
function generateDropDown($facetsGr){
     for ($number = 0; $number <= count($facetsGr)  ; $number++)
        {
        if(isset($facetsGr[$number]["path"])){
            echo '<option value="'.$facetsGr[$number]["path"].'">'.$facetsGr[$number]["path"].'</option>';
            }
        }
    }
?>
      <!--Filtres -->
  <div id="formulaire" >
       <form   method ="POST" Action ="Recherche.php">
<h1>Recherche </h1>
     <!--Filtre année  -->
  <p>Chercher une formation </p>
     <Label >Année: *</Label>
     <select name="annee">
           <option value="blanc">Aucun filtre</option>';
         <?php
        generateDropDown($facetsGrAnnee) ;
         ?>
     </select>
           <!--Filtre Discipline  -->
       <Label >Discipline: *</Label>
     <select name="discipline">
         <option value="blanc">Aucun filtre</option>';
         <?php
          generateDropDown($facetsGrDiscipline);
         ?>
     </select>
          <!--Filtre formation  -->
    <Label >Type de formation: *</Label>
     <select name="formation">
          <option value="blanc">Aucun filtre</option>';
         <?php
         generateDropDown($facetsGrFormation);
         ?>
          </select>
            <!--Filtre région  -->
    <Label >Region: *</Label>
     <select name="region">
         <option value="blanc">Aucun filtre</option>';
         <?php
                generateDropDown($facetsGrRegion);
         ?>

     </select>
            <!--Filtre Département -->
    <Label >Departement: *</Label>
     <select name="departement">
       <option value="blanc">Aucun filtre</option>';
         <?php
             generateDropDown($facetsGrDep);
         ?>
         </select>

        <input type="submit" value="valider">

        </form>
             </div>



        
