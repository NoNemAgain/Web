    
    
<?php  
include("header.html");
include("Api.php");
    include("form.php");
?>
<Label for ="level">Niveau Actuel:</label>
     <select name="level"> 
<?php  
    
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
                          if(isset($arraysRecordsMap[$numberMap]["fields"]["coordonnees"][0])&&isset($arraysRecordsMap[$numberMap]["fields"]["coordonnees"][1])&&isset($arraysRecordsMap[$numberMap]["fields"]              ["element_wikidata"])&&boolSameName){
                            echo'<option value='.$arraysRecordsMap[$numberMap]["fields"]["coordonnees"][0].'>'.$arraysRecordsMap[$numberMap]["fields"]["coordonnees"][0].'</option>';
                            echo'<option value='.$arraysRecordsMap[$numberMap]["fields"]["coordonnees"][1].'>'.$arraysRecordsMap[$numberMap]["fields"]["coordonnees"][1].'</option>';
                             echo'<option value='.$arraysRecordsMap[$numberMap]["fields"]["element_wikidata"].'>'.$arraysRecordsMap[$numberMap]["fields"]["element_wikidata"].'</option>'; 
                               
                              
                    }
                     }
                    }
    }
    //echo'<option value='.$arraysRecordsComplet[$number]["fields"]["etablissement_lib"].'>'.$arraysRecordsComplet[$number]["fields"]["etablissement_lib"].'</option>';
        /*echo'<option value='.$discipline.'>'.$discipline.'</option>';
 echo'<option value='.$annee.'>'.$annee.'</option>';
    echo'<option value='.$formation.'>'.$formation.'</option>';
echo'<option value='.$region.'>'.$region.'</option>';
echo'<option value='.$departement.'>'.$departement.'</option>';*/
        //echo'<option value='.$bool.'>'.$bool.'</option>';

?>                         
          </select>