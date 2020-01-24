<?php
include("header.html");
include("Api.php");
?>



    <?php
    include("form.php");
 include("LeafLet.php");
    ?>
</div>

      <script>
   <?php

      //records
    //Requête effectué lors du remplissage du formulaire
    if (isset($_POST["discipline"])&&isset($_POST["formation"])&&isset($_POST["region"])&&isset($_POST["departement"])&&isset($_POST["annee"])){
    if ($_POST["annee"]!="Non détaillé"||$_POST["annee"]!="blanc"){
    $annee= $_POST["annee"]+" année";
    }
    else{
      $annee= $_POST["annee"];
    }
    $discipline =$_POST["discipline"];
    $formation =$_POST["formation"];
    $region=$_POST["region"];
    $departement=$_POST["departement"];
         //Parcours des l'API des écoles avec leurs données
    for ($number = 0; $number <= count($arraysRecordsComplet)-1; $number++){
        $urlFiltreComplet="https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=800&facet=niveau_lib&facet=sect_disciplinaire_lib&facet=typ_diplome_lib&facet=reg_etab_lib&facet=dep_ins_lib&facet=etablissement_lib&refine.rentree_lib=2017-18";
        $boolAnnee=($annee==$arraysRecordsComplet[$number]["fields"]["niveau_lib"]||($annee=="blanc"));
        $boolDiscipline=($discipline==$arraysRecordsComplet[$number]["fields"]["sect_disciplinaire_lib"]||($discipline=="blanc"));
        $boolFormation=($formation==$arraysRecordsComplet[$number]["fields"]["typ_diplome_lib"]||($formation=="blanc"));
        $boolRegion=($region==$arraysRecordsComplet[$number]["fields"]["reg_etab_lib"]||($region=="blanc"));
        $boolDepartement=(($departement==$arraysRecordsComplet[$number]["fields"]["dep_ins_lib"])||($departement=="blanc"));
        $bool =$boolAnnee&&$boolDiscipline&&$boolFormation&&$boolRegion&&$boolDepartement;
        $name =$arraysRecordsComplet[$number]["fields"]["etablissement_lib"];
        if ($bool){
            //Parcours des l'API des maps
                     for ($numberMap = 0; $numberMap <= count($arraysRecordsMap)-1; $numberMap++){
                          $nameMap =$arraysRecordsMap[$numberMap]["fields"]["uo_lib"];
                          $boolSameName=($name==$nameMap);
                       if(isset($arraysRecordsMap[$numberMap]["fields"]["coordonnees"][0])&&isset($arraysRecordsMap[$numberMap]["fields"]["coordonnees"][1])&&isset($arraysRecordsMap[$numberMap]["fields"]["url"])&&isset($arraysRecordsMap[$numberMap]["fields"]["element_wikidata"])&&$boolSameName){
                           $string = $nameMap . "<br> <a href='" . $arraysRecordsMap[$numberMap]["fields"]["url"] . "'target='_blank'>" .$arraysRecordsMap[$numberMap]["fields"]["url"] . "</a>" . "<br> <a href='".$arraysRecordsMap[$numberMap]["fields"]["element_wikidata"]."'>En savoir plus</a>";
                echo'L.marker(['.$arraysRecordsMap[$numberMap]["fields"]["coordonnees"][0].','.$arraysRecordsMap[$numberMap]["fields"]["coordonnees"][1].'], ).addTo(map).bindPopup("'.$string.'");';
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
 <?php
include("footer.php");
?>
