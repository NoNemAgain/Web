<?php

include("header.html");
include("Api.php");
include("Etablissement.php");
include("Map.php");
function formTable($etab_liste, $etab_map,$formation) { 
    foreach ($etab_liste as $e) { 
        if  ($e->formation ==$formation){

        echo "<tr>"; 
        echo "<td>".$e->nom."</td>";
        echo "<td>".$e->formation."</td>";
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
                    <td>Formation</td>
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
            $id = $_POST["id"];
            $formation = $_POST["formation"]; 
       
                
        
       
/*array_unique($etab_liste);
            $etab_map_unarray_unique($etab_map);*/
            formTable($_SESSION['etab_liste'], $_SESSION['etab_map'],$_POST["formation"]); 
    ?>
                            </tbody>
        </table>
    <?php 
   
    if (!(isset($_SESSION[$formation.$id])))
                 {
                             $_SESSION[$formation.$id] =0;
                }
                else{
                      $_SESSION[$formation.$id]= $_SESSION[$formation.$id]+1 ;
                }
    echo'<img src="Image/Oeil.png" alt="Oeil" align="middle" class="picture"/>';
    echo 'View: ';
    echo  $_SESSION[$formation.$id];
    

        ?>
</div>