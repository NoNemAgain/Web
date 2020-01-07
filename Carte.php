<?php 
// API LIEN https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&sort=-rentree_lib&facet=etablissement_type_lib&facet=etablissement_lib&facet=diplome_lib&facet=typ_diplome_lib&facet=niveau_lib&facet=discipline_lib&facet=sect_disciplinaire_lib&facet=localisation_ins&facet=dep_etab_lib&facet=reg_etab_lib&facet=com_ins_lib&facet=dep_ins_lib&facet=reg_ins_lib&refine.rentree_lib=2017-18&refine.etablissement_type2=%C3%89coles+habilit%C3%A9es+%C3%A0+d%C3%A9livrer+un+dipl%C3%B4me+d%27ing%C3%A9nieur&refine.etablissement_type_lib=Autres+%C3%A9coles+d%27ing%C3%A9nieurs&refine.typ_diplome_lib=Formation+d%27ing%C3%A9nieur+classique
// $url="https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&sort=-rentree_lib&facet=etablissement_type_lib&facet=etablissement_lib&facet=diplome_lib&facet=typ_diplome_lib&facet=niveau_lib&facet=discipline_lib&facet=sect_disciplinaire_lib&facet=localisation_ins&facet=dep_etab_lib&facet=reg_etab_lib&facet=com_ins_lib&facet=dep_ins_lib&facet=reg_ins_lib&refine.rentree_lib=2017-18&refine.etablissement_type2=%C3%89coles+habilit%C3%A9es+%C3%A0+d%C3%A9livrer+un+dipl%C3%B4me+d%27ing%C3%A9nieur&refine.etablissement_type_lib=Autres+%C3%A9coles+d%27ing%C3%A9nieurs&refine.typ_diplome_lib=Formation+d%27ing%C3%A9nieur+classique";


include("header.html");
   
include("Api.php");
?>

    
   <?php
    include("form.php");
    include("leaflet.php");
        ?>
 <script>
      <?php
               for ($number = 0; $number <= count($facetsGrMap)-1; $number++)
               {
                       if(isset($facetsGrMap[$number]["fields"]["coordonnees"][0])&&isset($facetsGrMap[$number]["fields"]["coordonnees"][1])&&isset($facetsGrMap[$number]["fields"]["element_wikidata"])){
                echo'L.marker(['.$facetsGrMap[$number]["fields"]["coordonnees"][0].','.$facetsGrMap[$number]["fields"]["coordonnees"][1].'], {icon: greenIcon}).addTo(map).bindPopup("'.$facetsGrMap[$number]["fields"]["uo_lib"].' :                   '.$facetsGrMap[$number]["fields"]["element_wikidata"].'");';
                    }
                  }
         ?>
         
         </script>
         
    </div><br />
    <footer>
        <p>©Thomas DUONG</p>
    </footer>
