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
         echo "<a href=\"";
        foreach ($etab_map as $l) {
            if ( $l->id== $e->id ) {
               echo"'.$l->url.'";
            }
        }
        "\">Aller sur le site</a>";
        echo "</td>";
        echo "</tr>";

    }
}
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
        if (sameEtablissementForm($arraysRecordsComplet,$search,$number,$annee,$discipline,$formation,$region,$departement)){
            //Parcours des l'API des maps
                     for ($numberMap = 0; $numberMap <= count($arraysRecordsMap)-1; $numberMap++){
                          $nameMap =$arraysRecordsMap[$numberMap]["fields"]["uo_lib"];
                       if(checkingCoor($arraysRecordsMap,$numberMap)&&boolSameName($name,$nameMap)){
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
                </tr>
            </thead>

            <tbody>
                <?php
        $etab_liste = array();

        foreach ($arraysRecordsComplet as $i) {
        $isAlreadyHere = 0;
        $etab = new Etablissement;
        $etab->id= $i["fields0"]["etablissement"];
        $etab->nom = $i["fields"]["etablissement_lib"];
        $etab->formation = $i["fields"]["typ_diplome_lib"];
        $etab->annee = $i["fields"]["niveau_lib"];
        $etab->discipline=$i["fields"]["sect_disciplinaire_lib"];
        $etab->dep = $i["fields"]["dep_ins_lib"];
        $etab->region = $i["fields"]["reg_etab_lib"];

        foreach ($etab_liste as $e) {
            if ($e==$etab) {
                $isAlreadyHere = 1; }
            }
            if ($isAlreadyHere == 0) {
                array_push($etab_liste,$etab);
            }
        }

         $etab_map = array();
        foreach ($arraysRecordsMap as $m) {

        $isAlreadyHere = 0;
        $loc = new Map;
          $loc->nom = $m["fields"]["uai"];
        $loc->nom = $m["fields"]["uo_lib"];
        $loc->coordonnees = $m["fields"]["coordonnees"];
        $loc->url = $m["fields"]["url"];


        foreach ($etab_map as $l) {
            if ($l==$m) {
                $isAlreadyHere = 1; }
            }
            if ($isAlreadyHere == 0) {
                array_push($etab_map,$m);
            }
        }

            addToTable($etab_liste, $etab_map);
    ?>
                            </tbody>
        </table>
</div>
 <?php


include("footer.php");
?>
