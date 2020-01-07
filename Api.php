<?php
     $urlFiltre="https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&facet=etablissement_lib&facet=typ_diplome_lib&facet=niveau_lib&facet=discipline_lib&facet=sect_disciplinaire_lib&facet=localisation_ins&facet=dep_etab_lib&facet=reg_etab_lib&refine.rentree_lib=2017-18";
    $urlFiltreComplet="https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=800&facet=reg_ins_lib";
 $jsonFiltre = file_get_contents($urlFiltre);
    $array = json_decode($jsonFiltre,true);
    $urlMap= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-etablissements-enseignement-superieur&rows=323&sort=uo_lib&facet=uai&facet=type_d_etablissement&facet=com_nom&facet=dep_nom&facet=aca_nom&facet=reg_nom&facet=pays_etranger_acheminement";
    $urlMapPetit="https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-etablissements-enseignement-superieur&rows=10&sort=uo_lib&facet=uai&facet=type_d_etablissement&facet=com_nom&facet=dep_nom&facet=aca_nom&facet=reg_nom&facet=pays_etranger_acheminement";
$jsonMap = file_get_contents($urlMap);
    $arrayMap = json_decode($jsonMap,true);
$jsonFiltreComplet = file_get_contents($urlFiltreComplet);
    $arrayComplet = json_decode($jsonFiltreComplet,true);
    $facetsGrSecteur=$array["facet_groups"][0]["facets"];
    $facetsGrDep=$array["facet_groups"][6]["facets"];
$facetsGrRegion=$array["facet_groups"][1]["facets"];
 $facetsGrDiscipline=$array["facet_groups"][2]["facets"];
$facetsGrAnnee=$array["facet_groups"][7]["facets"];
$facetsGrFormation=$array["facet_groups"][3]["facets"];
 $facetsGrNom=$array["facet_groups"][8]["facets"];
$facetsGrMap=$arrayMap["records"];

?>
