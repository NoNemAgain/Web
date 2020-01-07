    
    
<?php  
include("header.html");
include("Api.php");
    include("form.php");
?>
<Label for ="level">Niveau Actuel:</label>
     <select name="level"> 
<?php  
    $records=$arrayComplet["records"];
    $recordsMap=$arrayMap["records"];

    $annee= $_POST["annee"];
    $discipline =$_POST["discipline"];
     $formation =$_POST["formation"];
    $region=$_POST["region"];
        $departement=$_POST["departement"];
        $secteur=$_POST["secteur"];    
    for ($number = 0; $number <= count($records)-1; $number++){
        $boolDiscipline=($discipline==$records[$number]["fields"]["discipline_lib"]||($discipline=="blanc"));
        $boolAnnee=($annee==$records[$number]["fields"]["niveau_lib"]||($annee=="blanc"));
        $boolSecteur=($secteur==$records[$number]["fields"]["sect_disciplinaire_lib"]||($secteur=="blanc"));
        $boolDepartement=(($departement==$records[$number]["fields"]["dep_ins_lib"])||($departement=="blanc"));
        $boolRegion=($region==$records[$number]["fields"]["reg_ins_lib"]||($region=="blanc"));
        $boolFormation=($formation==$records[$number]["fields"]["typ_diplome_lib"]||($formation=="blanc"));
        if ($boolDiscipline&&$boolAnnee&&$boolSecteur&&$boolDepartement&&$boolRegion&&$boolFormation){
                     for ($numberMap = 0; $numberMap <= count($recordsMap)-1; $numberMap++){
                          if(isset($recordsMap[$numberMap]["fields"]["coordonnees"][0])&&isset($recordsMap[$numberMap]["fields"]["coordonnees"][0])&&isset($recordsMap[$numberMap]["fields"]["element_wikidata"])){
                            echo'<option value='.$recordsMap[$numberMap]["fields"]["coordonnees"][0].'>'.$recordsMap[$numberMap]["fields"]["coordonnees"][0].'</option>';
                            echo'<option value='.$recordsMap[$numberMap]["fields"]["coordonnees"][1].'>'.$recordsMap[$numberMap]["fields"]["coordonnees"][1].'</option>';
                             echo'<option value='.$recordsMap[$numberMap]["fields"]["element_wikidata"].'>'.$recordsMap[$numberMap]["fields"]["element_wikidata"].'</option>'; 
                               
                              
                    }
                         }
                     }
    }

?>                         
          </select>