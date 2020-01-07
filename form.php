<?php 

include("Api.php");

?>
  <div id="formulaire" >
       <form   method ="POST" Action ="Recherche.php">
<h1>Recherche </h1>
     
  <p>Chercher une formation</p>
     <Label for ="annee">Année:<label>
     <select name="annee"> 
           <option value="blanc">Aucun filtre</option>';
         <?php
          for ($number = 0; $number <= count($facetsGrAnnee)  ; $number++)
         {
                 if(isset($facetsGrAnnee[$number]["path"])){
             echo'<option value='.$facetsGrAnnee[$number]["path"].'>'.$facetsGrAnnee[$number]["path"].'</option>';
                 }
        }
         ?>s
     </select>
       <Label for ="discipline">Discipline:<label>
     <select name="discipline"> 
         <option value="blanc">Aucun filtre</option>';
         <?php
         
        for ($number = 0; $number <= count($facetsGrDiscipline); $number++)
         {
                if(isset($facetsGrDiscipline[$number]["path"])){
             echo'   <option value='.$facetsGrDiscipline[$number]["path"].'>'.$facetsGrDiscipline[$number]["path"].'</option>';
                }
        }
         ?>
     </select>
         
    <Label for ="formation">Type de formation:<label>
     <select name="formation"> 
          <option value="blanc">Aucun filtre</option>';
         <?php
          for ($number =0; $number <= count($facetsGrFormation); $number++)
         {  
              if(isset($facetsGrFormation[$number]["path"])){
             echo'   <option value='.$facetsGrFormation[$number]["path"].'>'.$facetsGrFormation[$number]["path"].'</option>';
              }
        }
         ?>
          </select>
    <Label for ="region">Region:<label>
     <select name="region"> 
         <option value="blanc">Aucun filtre</option>';
         <?php
       
          for ($number = 0; $number <= count($facetsGrRegion); $number++)
         {
                if(isset($facetsGrRegion[$number]["path"])){
             echo'   <option value='.$facetsGrRegion[$number]["path"].'>'.$facetsGrRegion[$number]["path"].'</option>';
                }
        }
         ?>
          
     </select>
    <Label for ="departement">Departement:<label>
     <select name="departement"> 
       <option value="blanc">Aucun filtre</option>';
         <?php
         
          for ($number = 0; $number <= count($facetsGrDep); $number++)
         {    
              if(isset($facetsGrDep[$number]["path"])){
             echo' <option value='.$facetsGrDep[$number]["path"].'>'.$facetsGrDep[$number]["path"].'</option>';
              }
        }
         ?>
          
     </select>
    <Label for ="secteur">Secteur:<label>
     <select name="secteur"> 
           <option value="blanc">Aucun filtre</option>';
         <?php
        for ($number = 0; $number <= count($facetsGrSecteur); $number++)
         {
            if(isset($facetsGrSecteur[$number]["path"])){
             echo'<option value='.$facetsGrSecteur[$number]["path"].'>'.$facetsGrSecteur[$number]["path"].'</option>';
            }
        }
         ?>
         </select>
        <input type="submit" value="valider">
        </form>
             </div>
         

        
        