<?php 
include("header.html");
include("Api.php");
?>


  
    <?php
    include("form.php");
 include("LeafLet.php");
    ?>
      <script>
   <?php  
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
                          if(isset($recordsMap[$numberMap]["fields"]["coordonnees"][0])&&isset($recordsMap[$numberMap]["fields"]["coordonnees"][1])&&isset($recordsMap[$numberMap]["fields"]["element_wikidata"])){
                               echo'L.marker(['.$recordsMap[$numberMap]["fields"]["coordonnees"][0].','.$recordsMap[$numberMap]["fields"]["coordonnees"][1].'],).addTo(map).bindPopup("'.$recordsMap[$numberMap]                              ["fields"]["uo_lib"].':'.$recordsMap[$numberMap]["fields"]["element_wikidata"].'");';    
                            }
                         }
                     }
        }
    }
      //records 
    $annee= $_POST["annee"];
    $discipline =$_POST["discipline"];
    $formation =$_POST["formation"];
    $region=$_POST["region"];
    $departement=$_POST["departement"];  
    for ($number = 0; $number <= count($arraysRecordsComplet)-1; $number++){
        $boolAnnee=($annee==$arraysRecordsComplet[$number]["fields"]["niveau_lib"]||($annee=="blanc"));
        $boolDiscipline=($discipline==$arraysRecordsComplet[$number]["fields"]["discipline_lib"]||($discipline=="blanc"));
        $boolFormation=($formation==$arraysRecordsComplet[$number]["fields"]["typ_diplome_lib"]||($formation=="blanc"));
        $boolRegion=($region==$arraysRecordsComplet[$number]["fields"]["reg_ins_lib"]||($region=="blanc"));
        $boolDepartement=(($departement==$arraysRecordsComplet[$number]["fields"]["dep_ins_lib"])||($departement=="blanc"));
        $bool =$boolAnnee&&$boolDiscipline&&$boolFormation&&$boolRegion&&$boolDepartement;
       
        if ($bool){
                     for ($numberMap = 0; $numberMap <= count($arraysRecordsMap)-1; $numberMap++){
                          $boolSameName=($arraysRecordsMap[$numberMap]["fields"]["uo_lib"]==$arraysRecordsComplet[$number]["fields"]["etablissement_lib"]);
                          {
                   
                       if(isset($arraysRecordsMap[$number]["fields"]["coordonnees"][0])&&isset($arraysRecordsMap[$number]["fields"]["coordonnees"][1])&&isset($arraysRecordsMap[$number]["fields"]["element_wikidata"])){
                echo'L.marker(['.$arraysRecordsMap[$number]["fields"]["coordonnees"][0].','.$arraysRecordsMap[$number]["fields"]["coordonnees"][1].'], ).addTo(map).bindPopup("'.$arraysRecordsMap[$number]["fields"]["uo_lib"].' :                   '.$arraysRecordsMap[$number]["fields"]["element_wikidata"].'");';
                    }
                  }
                }
            }
    }
     
                               
     //facets 
    /*$facetsGrEtabl=$arrayMap["facet_groups"][3]["facets"];
    for ($numberID = 0; $numberID <= count($facetsGrMap)-1; $numberID++){
        $noms = array(ID);
            for ($numberCoor = 0; $numberCoor <= count($recordsMap)-1; $numberCoor++){
                $coordonnees = array();
        $ages = ['Mathilde' => 27, 'Pierre' => 29, 'Amandine' => 21];
            }*/
                              /*if(isset($facetsGrMap[$number]["fields"]["coordonnees"][0])&&isset($facetsGrMap[$number]["fields"]["coordonnees"][1])&&isset($facetsGrMap[$number]["fields"]["element_wikidata"])&&isset($facetsGrMap[$number]["fields"]["element_wikidata"])){
                echo'L.marker(['.$facetsGrMap[$number]["fields"]["coordonnees"][0].','.$facetsGrMap[$number]["fields"]["coordonnees"][1].'], ).addTo(map).bindPopup("'.$facetsGrMap[$number]["fields"]["uo_lib"].' :                   '.$facetsGrMap[$number]["fields"]["element_wikidata"].'");';
                    }*/
        
        
    //}
      

         ?>

              </script>
              </body>