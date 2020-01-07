<?php 
include("header.html");
include("Api.php");
?>
<body>
    <!--Nav bar-->   
 <nav>

    
    <!--Formulaire-->
  
    <?php
    include("form.php");
 include("leaflet.php");
    ?>
      <script>
   <?php  
     
    $annee= $_POST["annee"];
    $discipline =$_POST["discipline"];
    $formation =$_POST["formation"];
    $region=$_POST["region"];
    $departement=$_POST["departement"];
    $secteur=$_POST["secteur"];  
    
    $records=$arrayComplet["records"];
    $recordsMap=$arrayMap["records"];
   
    for ($number = 0; $number <= count($records)-1; $number++){
        $boolDiscipline=($discipline==$records[$number]["fields"]["discipline_lib"]||($discipline=="blanc"));
        $boolAnnee=($annee==$records[$number]["fields"]["niveau_lib"]||($annee=="blanc"));
        $boolSecteur=($secteur==$records[$number]["fields"]["sect_disciplinaire_lib"]||($secteur=="blanc"));
        $boolDepartement=(($departement==$records[$number]["fields"]["dep_ins_lib"])||($departement=="blanc"));
        $boolRegion=($region==$records[$number]["fields"]["reg_ins_lib"]||($region=="blanc"));
        $boolFormation=($formation==$records[$number]["fields"]["typ_diplome_lib"]||($formation=="blanc"));
        
        if ($boolDiscipline&&$boolAnnee&&$boolSecteur&&$boolDepartement&&$boolRegion&&$boolFormation){
                     for ($numberMap = 0; $numberMap <= count($recordsMap)-1; $numberMap++){
                         $boolSameName=($recordsMap[$numberMap]["fields"]["uo_lib"]==$records[$number]["fields"]["etablissement_lib"]);
                          if(isset($recordsMap[$numberMap]["fields"]["coordonnees"][0])&&isset($recordsMap[$numberMap]["fields"]["coordonnees"][0])&&isset($recordsMap[$numberMap]["fields"]["element_wikidata"])&&$boolSameName){
                           /* echo'<option value='.$recordsMap[$numberMap]["fields"]["coordonnees"][0].'>'.$recordsMap[$numberMap]["fields"]["coordonnees"][0].'</option>';
                            echo'<option value='.$recordsMap[$numberMap]["fields"]["coordonnees"][1].'>'.$recordsMap[$numberMap]["fields"]["coordonnees"][1].'</option>';
                             echo'<option value='.$recordsMap[$numberMap]["fields"]["element_wikidata"].'>'.$recordsMap[$numberMap]["fields"]["element_wikidata"].'</option>'; */
                               echo'L.marker(['.$recordsMap[$numberMap]["fields"]["coordonnees"][0].','.$recordsMap[$numberMap]["fields"]["coordonnees"][1].'], {icon: greenIcon}).addTo(map).bindPopup("'.$recordsMap[$numberMap]                              ["fields"]["uo_lib"].':'.$recordsMap[$numberMap]["fields"]["element_wikidata"].'");';    
                            }
                         }
                     }
    }

     
      

         ?>

              </script>
              </body>