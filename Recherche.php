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
    $records=$arrayComplet["records"];
    $recordsMap=$arrayMap["records"];   
    if (isset($_POST["search"])){
        $search= $_POST["search"];
        $boolVoid=($search=="blanc");
        for ($number = 0; $number <= count($records)-1; $number++){
         $boolDiscipline=($search==$records[$number]["fields"]["discipline_lib"]);
        $boolAnnee=($search==$records[$number]["fields"]["niveau_lib"]);
        $boolSecteur=($search==$records[$number]["fields"]["sect_disciplinaire_lib"]);
        $boolDepartement=($search==$records[$number]["fields"]["dep_ins_lib"]);
        $boolRegion=($search==$records[$number]["fields"]["reg_ins_lib"]);
        $boolFormation=($search==$records[$number]["fields"]["typ_diplome_lib"]);
        $boolEtablissement=($search==$records[$number]["fields"]["etablissement_lib"]);  
        if ($boolDiscipline||$boolAnnee||$boolSecteur||$boolDepartement||$boolRegion||$boolFormation||$boolEtablissement||$boolVoid){
                     for ($numberMap = 0; $numberMap <= count($recordsMap)-1; $numberMap++){
                          if(isset($recordsMap[$numberMap]["fields"]["coordonnees"][0])&&isset($recordsMap[$numberMap]["fields"]["coordonnees"][0])&&isset($recordsMap[$numberMap]["fields"]["element_wikidata"])){
                               echo'L.marker(['.$recordsMap[$numberMap]["fields"]["coordonnees"][0].','.$recordsMap[$numberMap]["fields"]["coordonnees"][1].'], {icon: greenIcon}).addTo(map).bindPopup("'.$recordsMap[$numberMap]                              ["fields"]["uo_lib"].':'.$recordsMap[$numberMap]["fields"]["element_wikidata"].'");';    
                            }
                         }
                     }
        }
    }
        
     if (isset($_POST["annee"])&&isset($_POST["discipline"])&&isset($_POST["formation"])&&isset($_POST["region"])&&isset($_POST["departement"])&&isset($_POST["departement"])){
    $annee= $_POST["annee"];
    $discipline =$_POST["discipline"];
    $formation =$_POST["formation"];
    $region=$_POST["region"];
    $departement=$_POST["departement"];
    $secteur=$_POST["departement"];  
    
    
   
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
                               echo'L.marker(['.$recordsMap[$numberMap]["fields"]["coordonnees"][0].','.$recordsMap[$numberMap]["fields"]["coordonnees"][1].'], {icon: greenIcon}).addTo(map).bindPopup("'.$recordsMap[$numberMap]                              ["fields"]["uo_lib"].':'.$recordsMap[$numberMap]["fields"]["element_wikidata"].'");';    
                            }
                         }
                     }
        }
    }
                                /* echo'<option value='.$recordsMap[$numberMap]["fields"]["coordonnees"][0].'>'.$recordsMap[$numberMap]["fields"]["coordonnees"][0].'</option>';
                            echo'<option value='.$recordsMap[$numberMap]["fields"]["coordonnees"][1].'>'.$recordsMap[$numberMap]["fields"]["coordonnees"][1].'</option>';
                             echo'<option value='.$recordsMap[$numberMap]["fields"]["element_wikidata"].'>'.$recordsMap[$numberMap]["fields"]["element_wikidata"].'</option>'; */

     
      

         ?>

              </script>
              </body>