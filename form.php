<?php 

include("Api.php");

?>
      <!--Filtres -->
  <div id="formulaire" >
       <form   method ="POST" Action ="Recherche.php">
<h1>Recherche </h1>
     <!--Filtre année  -->
  <p>Chercher une formation</p>
     <Label >Année:</Label>
     <select name="annee"> 
           <option value="blanc">Aucun filtre</option>';
         <?php
          for ($number = 0; $number <= count($facetsGrAnnee)  ; $number++)
         {
                 if(isset($facetsGrAnnee[$number]["path"])){
            echo '<option value="'.$facetsGrAnnee[$number]["path"].'">'.$facetsGrAnnee[$number]["path"].'</option>';
                 }
        }
         ?>
     </select>
           <!--Filtre Discipline  -->
       <Label >Discipline:</Label>
     <select name="discipline"> 
         <option value="blanc">Aucun filtre</option>';
         <?php
         
        for ($number = 0; $number <= count($facetsGrDiscipline); $number++)
         {
                if(isset($facetsGrDiscipline[$number]["path"])){
             echo'   <option value="'.$facetsGrDiscipline[$number]["path"].'">'.$facetsGrDiscipline[$number]["path"].'</option>';
                }
        }
         ?>
     </select>
          <!--Filtre formation  -->
    <Label >Type de formation:</Label> 
     <select name="formation"> 
          <option value="blanc">Aucun filtre</option>';
         <?php
          for ($number =0; $number <= count($facetsGrFormation); $number++)
         {  
              if(isset($facetsGrFormation[$number]["path"])){
             echo'   <option value="'.$facetsGrFormation[$number]["path"].'">'.$facetsGrFormation[$number]["path"].'</option>';
              }
        }
         ?>
          </select>
            <!--Filtre région  -->
    <Label >Region:</Label>
     <select name="region"> 
         <option value="blanc">Aucun filtre</option>';
         <?php
       
          for ($number = 0; $number <= count($facetsGrRegion); $number++)
         {
                if(isset($facetsGrRegion[$number]["path"])){
             echo'   <option value="'.$facetsGrRegion[$number]["path"].'">'.$facetsGrRegion[$number]["path"].'</option>';
                }
        }
         ?>
          
     </select>
            <!--Filtre Département -->
    <Label >Departement:</Label>
     <select name="departement"> 
       <option value="blanc">Aucun filtre</option>';
         <?php
         
          for ($number = 0; $number <= count($facetsGrDep); $number++)
         {    
              if(isset($facetsGrDep[$number]["path"])){
             echo' <option value="'.$facetsGrDep[$number]["path"].'">'.$facetsGrDep[$number]["path"].'</option>';
              }
        }
         ?>
         </select> 
  
        <input type="submit" value="valider">
         
        </form>
             </div>
         

        
        