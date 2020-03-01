<?php

include("header.html");
include("Api.php");
include("Etablissement.php");
include("Map.php");
function etabTable($etab_liste, $etab_map,$etablissement) { 
    foreach ($etab_liste as $e) { 
        if  ($e->id ==$etablissement){
       
        echo "<tr>"; 
        echo "<td>".$e->nom."</td>";
        echo "<td>".$e->academie."</td>";    
        echo "<td>".$e->type."</td>";
        echo "<td>".$e->type2."</td>";
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
                    <td>Academie</td>
                    <td>Type etablissement</td>
                    <td>Type etablissement 2</td>
                    <td>Site</td>
                </tr>
            </thead>
            
            <tbody>
                <?php 
          
                
       
                
        
       
/*array_unique($etab_liste);
            $etab_map_unarray_unique($etab_map);*/
            etabTable($_SESSION['etab_liste'], $_SESSION['etab_map'],$_POST["id"]); 
    ?>
                            </tbody>
        </table>
</div>