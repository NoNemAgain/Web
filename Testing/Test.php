 <?php
//api https://data.enseignementsup-recherche.gouv.fr/explore/dataset/fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics/table/?refine.rentree_lib=2017-18&sort=-rentree_lib&refine.etablissement_type2=%C3%89coles+habilit%C3%A9es+%C3%A0+d%C3%A9livrer+un+dipl%C3%B4me+d%27ing%C3%A9nieur&refine.etablissement_type_lib=Autres+%C3%A9coles+d%27ing%C3%A9nieurs&refine.typ_diplome_lib=Formation+d%27ing%C3%A9nieur+classique

    // indiqué le chemin de votre fichier JSON, il peut s'agir d'une URL

    //var_dump($array["facet_groups"]);//[0]["facets"][0]["path"]);
    //exit;
    //$array[0]["fields"]["spec_dut"];
   
    /*for ($number = 1; $number <= count($array); $number++)
    {
        echo ($array[$number]["fields"]["etablissement_lib"]) ;
        echo "<br>";
    }*/
include("Api.php");
 //var_dump($facetsGrMap[0]["fields"]["coordonnees"][0]);
    //exit;
    ?>
  
    
    <Label for ="level">Niveau Actuel:</label>
     <select name="level"> 
    <?php
            
          for ($number = 0; $number <= count($facetsGrMap)-1; $number++)
         {
                 
             
             echo'   <option value='.$facetsGrMap[$number]["fields"]["coordonnees"][0].'>'.$facetsGrMap[$number]["fields"]["coordonnees"][0].'</option>';
        }
?>
         </select>
         <Label for ="level">Niveau Actuel:</label>
     <select name="level"> 
      <?php
          for ($number = 0; $number <= count($facetsGrMap)-1; $number++)
         {
                 
             
              echo'   <option value='.$facetsGrMap[$number]["fields"]["coordonnees"][1].'>'.$facetsGrMap[$number]["fields"]["coordonnees"][1].'</option>';
        }
?>
         </select>
   
         <Label for ="level">Niveau Actuel:</label>
     <select name="level"> 
         
      <?php
          for ($number = 0; $number <= count($facetsGrMap)-1; $number++)
         {
                 
             
              echo'   <option value='.$facetsGrMap[$number]["fields"]["element_wikidata"].'>'.$facetsGrMap[$number]["fields"]["element_wikidata"].'</option>';
        }
?>
         </select>
   <Label for ="level">Niveau Actuel:</label>
     <select name="level"> 
         
      <?php
          for ($number = 0; $number <= count($facetsGrMap)-1; $number++)
         {
                 
             
              echo'   <option value='.$facetsGrMap[$number]["fields"]["uo_lib"].'>'.$facetsGrMap[$number]["fields"]["uo_lib"].'</option>';
        }
/* echo' L.marker(['.$facetsGrMap[$number]["fields"]["coordonnees"][0].', '.$facetsGrMap[$number]["fields"]["coordonnees"][1].']).addTo(map);';
                 //  if (($facetsGrMap[$number]["fields"]["coordonnees"][0] != null)&&($facetsGrMap[$number]["fields"]["coordonnees"][1]!= null)){
                        //echo'L.marker(['.$facetsGrMap[$number]["fields"]["coordonnees"][0].','.$facetsGrMap[$number]["fields"]["coordonnees"][1].'], {icon: greenIcon}).addTo(map);';
                       $X=$facetsGrMap[$number]["fields"]["coordonnees"][0];
                        $Y=$facetsGrMap[$number]["fields"]["coordonnees"][1];
                       //echo'L.marker(['.$X.','.$Y.'], {icon: greenIcon}).addTo(map);';
                       echo'L.marker(['.$number.','.$number.'], {icon: greenIcon}).addTo(map);';
                   }*/
?>
         </select>
  <Label for ="level">Niveau Actuel:</label>
     <select name="level"> 
         
      <?php
        for ($number = 0; $number <= count($facetsGrNom)-1; $number++){
               for ($numberMap = 0; $numberMap <= count($facetsGrMap)-1; $numberMap++){
                   if ($facetsGrMap[$numberMap]["fields"]["uo_lib"]==$facetsGrNom[$number]["path"]){
                       echo'   <option value='.$facetsGrMap[$numberMap]["fields"]["coordonnees"][0].'>'.$facetsGrMap[$numberMap]["fields"]["coordonnees"][0].'</option>';
                   }
               }
        }
          /*for ($number = 0; $number <= count($facetsGrNom)-1; $number++)
         {
                 
             
              echo'   <option value='.$facetsGrNom[$number]["fields"]["uo_lib"].'>'.$facetsGrNom[$number]["fields"]["uo_lib"].'</option>';
        }
              /* for ($number = 0; $number <= count($facetsGrNom)-1; $number++)
               {
                   //if iss
                       //if(isset($facetsGrMap[$number]["fields"]["Maps"][0])&&isset($facetsGrMap[$number]["fields"]["Maps"][1])&&isset($facetsGrMap[$number]["fields"]["element_wikidata"])){
                //echo'L.marker(['.$facetsGrMap[$number]["fields"]["coordonnees"][0].','.$facetsGrMap[$number]["fields"]["coordonnees"][1].'], {icon: greenIcon}).addTo(map).bindPopup("'.$facetsGrMap[$number]["fields"]["uo_lib"].' :                   '.$facetsGrMap[$number]["fields"]["element_wikidata"].'");';
                    }
                  }*/
         
         
        
          /*for ($number = 0; $number <= count($facetsGrNom)-1; $number++){
               for ($numberMap = 0; $numberMap <= count($facetsGrMap)-1; $numberMap++){
                 
             //if ($facetsGrMap[$numberMap]["fields"]["uo_lib"]==$facetsGrNom[$number]["path"]){
                    if(isset($facetsGrMap[$numberMap]["fields"]["coordonnees"][0])&&isset($facetsGrMap[$numberMap]["fields"]["coordonnees"][1])&&isset($facetsGrMap[$number]["fields"]["element_wikidata"])){
                 echo'L.marker(['.$facetsGrMap[$numberMap]["fields"]["coordonnees"][0].','.$facetsGrMap[$numberMap]["fields"]["coordonnees"][1].'], {icon: greenIcon}).addTo(map).bindPopup("'.$facetsGrMap[$numberMap]["fields"]["uo_lib"].' :                   '.$facetsGrMap[$numberMap]["fields"]["element_wikidata"].'");';
                 }
                var_dump($facetsGrMap[$numberMap]["fields"]["uo_lib"]);
             //}
                /*if(isset($facetsGrMap[$number]["fields"]["coordonnees"][0])&&isset($facetsGrMap[$number]["fields"]["coordonnees"][1])&&isset($facetsGrMap[$number]["fields"]["element_wikidata"])){
                 echo'L.marker(['.$facetsGrMap[$number]["fields"]["coordonnees"][0].','.$facetsGrMap[$number]["fields"]["coordonnees"][1].'], {icon: greenIcon}).addTo(map).bindPopup("'.$facetsGrMap[$number]["fields"]["uo_lib"].' :                   '.$facetsGrMap[$number]["fields"]["element_wikidata"].'");';
             // echo'   <option value='.$facetsGrMap[$number]["fields"]["uo_lib"].'>'.$facetsGrMap[$number]["fields"]["uo_lib"].'</option>';
                  // echo'   <option value='.$facetsGrNom[$number]["path"].'>'.$facetsGrNom[$number]["path"].'</option>'; 
        }
                
        }*/

?>
         </select>


