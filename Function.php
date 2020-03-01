<?php
//Fonction permettant la vérification que les noms sont similaire 
function boolSameName($name,$nameMap){
        return ($name==$nameMap);
    }
//Fonction permettant d'afficher les markers sur leafLet ainsi que leur données
function leafMark($numberMap,$arraysRecordsMap,$nameMap){
         $string = $nameMap . "<br> <a href='" . $arraysRecordsMap[$numberMap]["fields"]["url"] . "'target='_blank' >" .$arraysRecordsMap[$numberMap]["fields"]["url"] . "</a>" . "<br> <a href='".$arraysRecordsMap[$numberMap]["fields"]["element_wikidata"]."' >En savoir plus</a>";
                echo'L.marker(['.$arraysRecordsMap[$numberMap]["fields"]["coordonnees"][0].','.$arraysRecordsMap[$numberMap]["fields"]["coordonnees"][1].'], ).addTo(map).bindPopup("'.$string.'");';
    }
// fonction permettant de vérifier que les coordonnées et que le wikidata sont présents
function checkingCoor($arraysRecordsMap,$numberMap){
        return isset($arraysRecordsMap[$numberMap]["fields"]["coordonnees"][0])&&isset($arraysRecordsMap[$numberMap]["fields"]["coordonnees"][1])&&isset($arraysRecordsMap[$numberMap]["fields"]["url"])&&isset($arraysRecordsMap[$numberMap]["fields"]["element_wikidata"]) ;
    }

//Fonction permettant de faire les boucles pour leaflet
function loopLeftMark($arraysRecordsMap,$name){
        for ($numberMap = 0; $numberMap <= count($arraysRecordsMap)-1; $numberMap++){
            $nameMap =$arraysRecordsMap[$numberMap]["fields"]["uo_lib"];
            if(checkingCoor($arraysRecordsMap,$numberMap)&&boolSameName($name,$nameMap)){
                    eafMark($numberMap,$arraysRecordsMap,$nameMap);
            }
        }
    }
//Vérification des données récuperer du formulaire pour effectuer le filtre
function sameEtablissementForm($arraysRecordsComplet,$number,$annee,$discipline,$formation,$region,$departement){
        $boolAnnee=($annee==$arraysRecordsComplet[$number]["fields"]["niveau_lib"]||($annee=="blanc"));
        $boolDiscipline=($discipline==$arraysRecordsComplet[$number]["fields"]["sect_disciplinaire_lib"]||($discipline=="blanc"));
        $boolFormation=($formation==$arraysRecordsComplet[$number]["fields"]["typ_diplome_lib"]||($formation=="blanc"));
        $boolRegion=($region==$arraysRecordsComplet[$number]["fields"]["reg_etab_lib"]||($region=="blanc"));
        $boolDepartement=(($departement==$arraysRecordsComplet[$number]["fields"]["dep_ins_lib"])||($departement=="blanc"));
        $bool =$boolAnnee&&$boolDiscipline&&$boolFormation&&$boolRegion&&$boolDepartement;
        return $bool ;
    }
session_start();
// fonction permettant de construire le tableau
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
        echo "<td>"; 
        echo ' <form class="form_button" form method=POST action="Fiche_Formation.php"  >
           <input type ="hidden" name="id" value="'.$e->id.'"/>
           <input type ="hidden" name="formation" value="'.$e->formation.'"/>
          <button type="submit">Voir plus</button>
          </form> ';
        echo "</td>";
        echo "<td>"; 
        echo ' <form class="form_button" form method=POST action="Fiche_Etablissement.php"  > 
           <input type ="hidden" name="id" value="'.$e->id.'"/>
          <button type="submit">Voir plus</button>
          </form> ';
        echo "</td>"; 
        echo "</tr>"; 
    }
}
?>
