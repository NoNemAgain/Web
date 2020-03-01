<?php

include("header.html");
include("Api.php");
include("Etablissement.php");
include("Map.php");
// permet de créer le tableau 
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
             break;
        }
       
    }
}
session_start();
?>
     <!-- Balise pour le tableau-->
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
    
            $id = $_POST["id"];
            etabTable($_SESSION['etab_liste'], $_SESSION['etab_map'],$id); 
    ?>
            </tbody>
        </table>
    <?php 
// permet de créer, d'incrémenter le compteur de vue
    if (!(isset($_SESSION[$id])))
                 {
                             $_SESSION[$id] =1;
                }
                else{
                      $_SESSION[$id]= $_SESSION[$id]+1 ;
                }
    echo'<img src="Image/Oeil.png" alt="Oeil" align="middle" class="picture"/>';
    echo '  View: ';
    
    echo  $_SESSION[$id];
        ?>
</div>