<?php 
function sameEtablissement($arraysRecordsComplet,$search,$number){
    $annee =$arraysRecordsComplet[$number]["fields"]["niveau_lib"];
    $discipline=$arraysRecordsComplet[$number]["fields"]["sect_disciplinaire_lib"];
    $formation =$arraysRecordsComplet[$number]["fields"]["typ_diplome_lib"];
    $region =$arraysRecordsComplet[$number]["fields"]["reg_etab_lib"];
    $departement =$arraysRecordsComplet[$number]["fields"]["dep_ins_lib"];
         $boolAnnee=($search==$annee);
        $boolDiscipline=($search==$discipline);
        $boolFormation=($search==$formation);
        $boolRegion=($search==$region);
        $boolDepartement=($search==$departement);
        $bool =$boolAnnee||$boolDiscipline||$boolFormation||$boolRegion||$boolDepartement;
        return $bool ;
    }
    function boolSameName($name,$nameMap){
        return ($name==$nameMap);
    }
    function leafMark($numberMap,$arraysRecordsMap,$nameMap){
        /*$string=$nameMap . "<br> <a href='".$arraysRecordsMap[$numberMap]["fields"]["url"]."' onclick="javascript:countclick(".$arraysRecordsMap[$numberMap]["fields"]["url"].'");">" .$arraysRecordsMap[$numberMap]["fields"]["url"] . */ /*"</a>
               href='".$arraysRecordsMap[$numberMap]["fields"]["element_wikidata"]."'>En savoir plus</a>";
                echo'L.marker(['.$arraysRecordsMap[$numberMap]["fields"]["coordonnees"][0].','.$arraysRecordsMap[$numberMap]["fields"]["coordonnees"][1].'], ).addTo(map).bindPopup("'.$string.'");';*/
         $string = $nameMap . "<br> <a href='" . $arraysRecordsMap[$numberMap]["fields"]["url"] . "'target='_blank'>" .$arraysRecordsMap[$numberMap]["fields"]["url"] . "</a>" . "<br> <a href='".$arraysRecordsMap[$numberMap]["fields"]["element_wikidata"]."'>En savoir plus</a>";
                echo'L.marker(['.$arraysRecordsMap[$numberMap]["fields"]["coordonnees"][0].','.$arraysRecordsMap[$numberMap]["fields"]["coordonnees"][1].'], ).addTo(map).bindPopup("'.$string.'");';
    }
    function checkingCoor($arraysRecordsMap,$numberMap){
        return isset($arraysRecordsMap[$numberMap]["fields"]["coordonnees"][0])&&isset($arraysRecordsMap[$numberMap]["fields"]["coordonnees"][1])&&isset($arraysRecordsMap[$numberMap]["fields"]["url"])&&isset($arraysRecordsMap[$numberMap]["fields"]["element_wikidata"]) ;
    }
    

    function loopLeftMark($arraysRecordsMap,$name){
                         for ($numberMap = 0; $numberMap <= count($arraysRecordsMap)-1; $numberMap++){
                          $nameMap =$arraysRecordsMap[$numberMap]["fields"]["uo_lib"];  
                       if(checkingCoor($arraysRecordsMap,$numberMap)&&boolSameName($name,$nameMap)){
                           leafMark($numberMap,$arraysRecordsMap,$nameMap);
                  }
                }
    }
function sameEtablissementForm($arraysRecordsComplet,$search,$number,$annee,$discipline,$formation,$region,$departement){
        $boolAnnee=($annee==$arraysRecordsComplet[$number]["fields"]["niveau_lib"]||($annee=="blanc"));
        $boolDiscipline=($discipline==$arraysRecordsComplet[$number]["fields"]["sect_disciplinaire_lib"]||($discipline=="blanc"));
        $boolFormation=($formation==$arraysRecordsComplet[$number]["fields"]["typ_diplome_lib"]||($formation=="blanc"));
        $boolRegion=($region==$arraysRecordsComplet[$number]["fields"]["reg_etab_lib"]||($region=="blanc"));
        $boolDepartement=(($departement==$arraysRecordsComplet[$number]["fields"]["dep_ins_lib"])||($departement=="blanc"));
        $bool =$boolAnnee&&$boolDiscipline&&$boolFormation&&$boolRegion&&$boolDepartement;
        return $bool ;
    }


   ?>
