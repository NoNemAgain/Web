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
function sameEtablissementForm($arraysRecordsComplet,$number,$annee,$discipline,$formation,$region,$departement){
        $boolAnnee=($annee==$arraysRecordsComplet[$number]["fields"]["niveau_lib"]||($annee=="blanc"));
        $boolDiscipline=($discipline==$arraysRecordsComplet[$number]["fields"]["sect_disciplinaire_lib"]||($discipline=="blanc"));
        $boolFormation=($formation==$arraysRecordsComplet[$number]["fields"]["typ_diplome_lib"]||($formation=="blanc"));
        $boolRegion=($region==$arraysRecordsComplet[$number]["fields"]["reg_etab_lib"]||($region=="blanc"));
        $boolDepartement=(($departement==$arraysRecordsComplet[$number]["fields"]["dep_ins_lib"])||($departement=="blanc"));
        $bool =$boolAnnee&&$boolDiscipline&&$boolFormation&&$boolRegion&&$boolDepartement;
        return $bool ;
    }
/*function arrayInfo($arraysRecordsComplet,$number,$etab_liste){
        $isAlreadyHere = 0; 
        $etab = new Etablissement; 
        $etab->id= $arraysRecordsComplet[$number]["fields"]["etablissement"];
        $etab->nom =$arraysRecordsComplet[$number]["fields"]["etablissement_lib"]; 
        $etab->formation =$arraysRecordsComplet[$number]["fields"]["typ_diplome_lib"]; 
        $etab->annee =$arraysRecordsComplet[$number]["fields"]["niveau_lib"]; 
        $etab->discipline=$arraysRecordsComplet[$number]["fields"]["sect_disciplinaire_lib"];  
        $etab->dep =$arraysRecordsComplet[$number]["fields"]["dep_ins_lib"]; 
        $etab->region =$arraysRecordsComplet[$number]["fields"]["reg_etab_lib"]; 
        
        foreach ($etab_liste as $e) { 
            if ($e==$etab) { 
                $isAlreadyHere = 1; } 
            } 
            if ($isAlreadyHere == 0) { 
                array_push($etab_liste,$etab); 
            }
        
}
function arrayMap($arraysRecordsMap,$numberMap,$etab_map){
     
            
        $isAlreadyHere = 0; 
        $loc = new Map; 
          $loc->nom =$arraysRecordsMap[$numberMap]["fields"]["uai"];    
        $loc->nom =$arraysRecordsMap[$numberMap]["fields"]["uo_lib"]; 
        $loc->coordonnees = $arraysRecordsMap[$numberMap]["fields"]["coordonnees"]; 
        $loc->url = $arraysRecordsMap[$numberMap]["fields"]["url"]; 
        
        
        foreach ($etab_map as $l) { 
            if ($l==$loc) { 
                $isAlreadyHere = 1; } 
            } 
            if ($isAlreadyHere == 0) { 
                array_push($etab_map,$loc); 
            } 
        
}*/
function addToTable($etab_liste, $etab_map) { 
    foreach ($etab_liste as $e) { 
       
        echo "<tr>"; 
        echo "<td>".$e->nom."</td>"; 
        echo "<td>".$e->formation."</td>"; 
        echo "<td>".$e->annee."</td>";
        echo "<td>".$e->discipline."</td>";    
        echo "<td>".$e->region."</td>";
        echo "<td>".$e->dep."</td>";
        echo "<td>"; 
         
        foreach ($etab_map as $l) { 
            if ( $l->nom==$e->nom ) { 
                
               echo '<a href="'.$l->url.'">Aller sur le site</a>';
            } 
        } 
        
        echo "</td>"; 
        echo "</tr>"; 
        
    }
}

   ?>
