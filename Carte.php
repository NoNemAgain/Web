<?php 
// API LIEN https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&sort=-rentree_lib&facet=etablissement_type_lib&facet=etablissement_lib&facet=diplome_lib&facet=typ_diplome_lib&facet=niveau_lib&facet=discipline_lib&facet=sect_disciplinaire_lib&facet=localisation_ins&facet=dep_etab_lib&facet=reg_etab_lib&facet=com_ins_lib&facet=dep_ins_lib&facet=reg_ins_lib&refine.rentree_lib=2017-18&refine.etablissement_type2=%C3%89coles+habilit%C3%A9es+%C3%A0+d%C3%A9livrer+un+dipl%C3%B4me+d%27ing%C3%A9nieur&refine.etablissement_type_lib=Autres+%C3%A9coles+d%27ing%C3%A9nieurs&refine.typ_diplome_lib=Formation+d%27ing%C3%A9nieur+classique
// $url="https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&sort=-rentree_lib&facet=etablissement_type_lib&facet=etablissement_lib&facet=diplome_lib&facet=typ_diplome_lib&facet=niveau_lib&facet=discipline_lib&facet=sect_disciplinaire_lib&facet=localisation_ins&facet=dep_etab_lib&facet=reg_etab_lib&facet=com_ins_lib&facet=dep_ins_lib&facet=reg_ins_lib&refine.rentree_lib=2017-18&refine.etablissement_type2=%C3%89coles+habilit%C3%A9es+%C3%A0+d%C3%A9livrer+un+dipl%C3%B4me+d%27ing%C3%A9nieur&refine.etablissement_type_lib=Autres+%C3%A9coles+d%27ing%C3%A9nieurs&refine.typ_diplome_lib=Formation+d%27ing%C3%A9nieur+classique";


include("header.html");
   
include("Api.php");
?>

    
   <?php
    include("form.php");
    include("LeafLet.php");
        ?>
 <script>
      <?php
    if (isset($_POST["search"])&&(!(empty($_POST["search"])))){
        $search= $_POST["search"];
        for ($number = 0; $number <= count($arraysRecordsComplet)-1; $number++){
        $boolAnnee=($search==$arraysRecordsComplet[$number]["fields"]["niveau_lib"]);
        $boolDiscipline=($search==$arraysRecordsComplet[$number]["fields"]["sect_disciplinaire_lib"]);
        $boolFormation=($search==$arraysRecordsComplet[$number]["fields"]["typ_diplome_lib"]);
        $boolRegion=($search==$arraysRecordsComplet[$number]["fields"]["reg_etab_lib"]);
        $boolDepartement=($search==$arraysRecordsComplet[$number]["fields"]["dep_ins_lib"]);
        $bool =$boolAnnee||$boolDiscipline||$boolFormation||$boolRegion||$boolDepartement;
        $name =$arraysRecordsComplet[$number]["fields"]["etablissement_lib"];
        if ($bool){
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
    if(empty($_POST["search"])){
               for ($numberMap = 0; $numberMap <= count($arraysRecordsMap)-1; $numberMap++){
                          $nameMap =$arraysRecordsMap[$numberMap]["fields"]["uo_lib"];  
                       if(isset($arraysRecordsMap[$numberMap]["fields"]["coordonnees"][0])&&isset($arraysRecordsMap[$numberMap]["fields"]["coordonnees"][1])&&isset($arraysRecordsMap[$numberMap]["fields"]["url"])&&isset($arraysRecordsMap[$numberMap]["fields"]["element_wikidata"])){
                           $string = $nameMap . "<br> <a href='" . $arraysRecordsMap[$numberMap]["fields"]["url"] . "'target='_blank'>" .$arraysRecordsMap[$numberMap]["fields"]["url"] . "</a>" . "<br> <a href='".$arraysRecordsMap[$numberMap]["fields"]["element_wikidata"]."'>En savoir plus</a>";
                echo'L.marker(['.$arraysRecordsMap[$numberMap]["fields"]["coordonnees"][0].','.$arraysRecordsMap[$numberMap]["fields"]["coordonnees"][1].'], ).addTo(map).bindPopup("'.$string.'");';
                  }
                }
    }
         ?>
         
         </script>
         
     </div>
    <?php
include("footer.php");
?>
