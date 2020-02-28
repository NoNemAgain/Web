<?php

// lien  : https://data.enseignementsup-recherche.gouv.fr/explore/dataset/fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics/information/
//lien Coordonnée :https://data.enseignementsup-recherche.gouv.fr/explore/dataset/fr-esr-principaux-etablissements-enseignement-superieur/information/?disjunctive.type_d_etablissement
     $urlFiltre="https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&facet=etablissement_lib&facet=typ_diplome_lib&facet=niveau_lib&facet=discipline_lib&facet=sect_disciplinaire_lib&facet=localisation_ins&facet=dep_etab_lib&facet=reg_etab_lib&refine.rentree_lib=2017-18&apikey=ccb82bbc2884456e3bfd64095510ad664fb7e90b2bdf3a1ae92e435c";
    $urlFiltreComplet="https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=800&facet=niveau_lib&facet=sect_disciplinaire_lib&facet=typ_diplome_lib&facet=reg_etab_lib&facet=dep_ins_lib&facet=etablissement_lib&refine.rentree_lib=2017-18&apikey=7a5bf4a4eb58aead6d282f8c575031e9944d8c4867d563696847ec28";
    $urlProf="data/base.json";
 $jsonFiltre = file_get_contents($urlFiltre);
    $array = json_decode($jsonFiltre,true);
    $urlMap= "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-etablissements-enseignement-superieur&rows=323&sort=uo_lib&facet=uai&facet=type_d_etablissement&facet=com_nom&facet=dep_nom&facet=aca_nom&facet=reg_nom&facet=pays_etranger_acheminement&apikey=190a19e624e956bc5b8d275a643618afa895b45e65bd0fa2c6f7090a";
    $urlMapPetit="https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-etablissements-enseignement-superieur&rows=10&sort=uo_lib&facet=uai&facet=type_d_etablissement&facet=com_nom&facet=dep_nom&facet=aca_nom&facet=reg_nom&facet=pays_etranger_acheminement&apikey=92b8c14fef627ea3d94c83aad0576e2dd7d8c4abe0a6a5f1381ed010";
$jsonMap = file_get_contents($urlMap);
    $arrayMap = json_decode($jsonMap,true);


$jsonFiltreComplet = file_get_contents($urlFiltreComplet);
    $arrayComplet = json_decode($jsonFiltreComplet,true);


if ($arrayComplet==null){
 echo'<script>';
    echo"alert('API ne marche pas' );";
     echo'  </script>';
}

else{
    $facetsGrDep=$arrayComplet["facet_groups"][0]["facets"];
$facetsGrRegion=$arrayComplet["facet_groups"][4]["facets"];
 $facetsGrDiscipline=$arrayComplet["facet_groups"][1]["facets"];
$facetsGrAnnee=$arrayComplet["facet_groups"][5]["facets"];
$facetsGrFormation=$arrayComplet["facet_groups"][2]["facets"];
 $facetsGrNom=$arrayComplet["facet_groups"][6]["facets"];
$arraysRecordsMap=$arrayMap["records"];
$arraysRecordsComplet=$arrayComplet["records"];
}


?>
