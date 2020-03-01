<?php
class Etablissement
{
    public $id;
    public $_region;
    public $_dep ;
    public $_discipline;
    public $_annee;
    public $_formation;
    public $_nom;
    public $_academie;
    public $_type;
    public $_type2;
    public $_sigle;
    public $_url;


   /*   public function __construct($id,$nom, $region,$dep,$discipline,$annee,$formation) // Constructeur demandant 2 paramètres
  {
    
    
    $this->_id = $id;
    $this->_nom = $nom;
    $this->_region = $region;
    $this->_dep = $dep;
    $this->_discipline = $discipline;
    $this->_annee = $annee;
    $this->_formation = $formation;
  }*/
   
    
    
    
   /* public function popUp(){
        echo'<script>';
    echo"alert('API ne marche pas' );";
     echo'  </script>';
    }*/
    public function search($annee,$discipline,$formation,$region,$departement){
        return anneeSearch($annee)&&disciplineSearch($discipline)&&formationSearch($formation)&&regionSearch($region)&&departementSearch($departement);
                        }
    public function anneeSearch($annee){
        return ($annee==$arraysRecordsComplet[$number]["fields"]["niveau_lib"]||($annee=="blanc"));
    }
    public function disciplineSearch($discipline){
        return $boolDiscipline=($discipline==$this->_discipline||($discipline=="blanc"));
    }
    public function formationSearch($formation){
        return $boolFormation=($formation==$this->_formation||($formation=="blanc"));
    }
    public function regionSearch($region){
        return $boolRegion=($region==$this->_region||($region=="blanc"));;
    }
     public function departementSearch($departement){
        return $boolDepartement=(($departement==$this->_dep)||($departement=="blanc"));
    }

}
?>
