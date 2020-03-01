<?php

include("header.html");
include("Api.php");
include("Etablissement.php");
include("Map.php");
function formTable($etab_liste, $etab_map,$etablissement) { 
    foreach ($etab_liste as $e) { 
        if  ($e->id ==$etablissement){

        echo "<tr>"; 
        echo "<td>".$e->nom."</td>";
        echo "<td>".$e->effectif."</td>";    
        echo "<td>".$e->hommes."</td>";
        echo "<td>".$e->femmes."</td>";
        echo "<td>".$e->libelle."</td>";
        echo "<td>".$e->diplome."</td>";
        echo "<td>"; 
         
        
         foreach ($etab_map as $l) { 
            if ( $l->nom==$e->nom ) { 
                
               echo '<a href="'.$l->url.'">Aller sur le site</a>';
            } 
        }  
        echo "</tr>"; 
        }
    }
}


session_start();


?>
<div class= "container">
    <table id="table"> 
            <thead>
                <tr>                        
                    <td>Nom</td>
                    <td>Effectif</td>
                    <td>Homme</td>
                    <td>Femmes</td>
                    <td>Libelle</td>
                    <td>Diplome</td>
                    <td>Site</td>
                </tr>
            </thead>
            
            <tbody>
                <?php 
          
                
       
                
        
       
/*array_unique($etab_liste);
            $etab_map_unarray_unique($etab_map);*/
            formTable($_SESSION['etab_liste'], $_SESSION['etab_map'],$_SESSION['formation']); 
    ?>
                            </tbody>
        </table>
</div>