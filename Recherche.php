<?php 
include("header.html");
include("Api.php");
?>


  
    <?php
    include("form.php");
 include("LeafLet.php");
    include("Function.php");
include("Etablissement.php");
include("Map.php");

$etab_liste = array(); 
 $etab_map = array();
 $viewList = array(); 


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
        $name =$arraysRecordsComplet[$number]["fields"]["etablissement_lib"];
        //arrayInfo($arraysRecordsComplet,$number,$etab_liste);
       
        if (sameEtablissementForm($arraysRecordsComplet,$number,$annee,$discipline,$formation,$region,$departement)){
            //Parcours des l'API des maps 
             $isAlreadyHere = 0; 
        $etab = new Etablissement; 
        $etab->id= $arraysRecordsComplet[$number]["fields"]["etablissement"];
        $etab->nom =$arraysRecordsComplet[$number]["fields"]["etablissement_lib"]; 
        $etab->formation =$arraysRecordsComplet[$number]["fields"]["typ_diplome_lib"]; 
        $etab->annee =$arraysRecordsComplet[$number]["fields"]["niveau_lib"]; 
        $etab->discipline=$arraysRecordsComplet[$number]["fields"]["sect_disciplinaire_lib"];  
        $etab->dep =$arraysRecordsComplet[$number]["fields"]["dep_ins_lib"]; 
        $etab->region =$arraysRecordsComplet[$number]["fields"]["reg_etab_lib"]; 
        $etab->academie =$arraysRecordsComplet[$number]["fields"]["aca_ins_lib"];
        $etab->type =$arraysRecordsComplet[$number]["fields"]["etablissement_type_lib"];
        $etab->type2 =$arraysRecordsComplet[$number]["fields"]["etablissement_type2"];
        $etab->sigle =$arraysRecordsComplet[$number]["fields"]["etablissement_sigle"];
        $etab->hommes =$arraysRecordsComplet[$number]["fields"]["hommes"];
        $etab->effectif =$arraysRecordsComplet[$number]["fields"]["effectif"];
        $etab->femmes =$arraysRecordsComplet[$number]["fields"]["femmes"];
        $etab->libelle =$arraysRecordsComplet[$number]["fields"]["libelle_intitule_1"];
        $etab->diplome =$arraysRecordsComplet[$number]["fields"]["diplome_rgp"];
          
            
        
            
        
        foreach ($etab_liste as $e) { 
            if ($e==$etab) { 
                $isAlreadyHere = 1; } 
            } 
            if ($isAlreadyHere == 0) { 
                array_push($etab_liste,$etab); 
            }
                     for ($numberMap = 0; $numberMap <= count($arraysRecordsMap)-1; $numberMap++){
                          $nameMap =$arraysRecordsMap[$numberMap]["fields"]["uo_lib"];  
                       if(checkingCoor($arraysRecordsMap,$numberMap)&&boolSameName($name,$nameMap)){
                                       $isAlreadyHere = 0; 
                    $map = new Map; 
                      $map->nom =$arraysRecordsMap[$numberMap]["fields"]["uai"];    
                    $map->nom =$arraysRecordsMap[$numberMap]["fields"]["uo_lib"]; 
                    $map->coordonnees = $arraysRecordsMap[$numberMap]["fields"]["coordonnees"]; 
                    $map->url = $arraysRecordsMap[$numberMap]["fields"]["url"]; 


                    foreach ($etab_map as $m) { 
                        if ($m==$map) { 
                            $isAlreadyHere = 1; } 
                        } 
                        if ($isAlreadyHere == 0) { 
                            array_push($etab_map,$map); 
                        } 
                          leafMark($numberMap,$arraysRecordsMap,$nameMap);
                           
                  }
                }
            }
        }
    }

         ?>
  
       </script>
<div class= "container">
    <table id="table"> 
            <thead>
                <tr>                        
                    <td>Nom</td>
                    <td>Formation</td>
                    <td>Annee</td>
                    <td>Discipline</td>
                    <td>Département</td>
                    <td>Region</td>
                    <td>Site</td>
                    <td>Fiche Formation</td>
                    <td>Fiche Etablissement</td>
                </tr>
            </thead>
            
            <tbody>
                <?php 
          
                
       
                
        
       
/*array_unique($etab_liste);
            $etab_map_unarray_unique($etab_map);*/
            addToTable($etab_liste, $etab_map); 
            $_SESSION['etab_liste']=$etab_liste;
            $_SESSION['etab_map']=$etab_map;
            $_SESSION['viewList']=$viewList;
    ?>
                            </tbody>
        </table>
</div>
 <?php


include("footer.php");
?>
