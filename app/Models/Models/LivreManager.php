<?php
/**
 * 
 */
class LivreManager extends Model {
    
    //Création de la fonction de récupération de tous les livres dans la bdd
    //vu qu'elle hérite de Model on peut utiliser la méthode getAll('table','Objet')ac une Majuscule car c'est une class que l'on veut crer
    public function getLivres() {  
        return $this->getAll('livres','Livre');
    }
    //pour ne récupérer qu'un seul article
    public function getLivre($id) {
        return $this->getOne('livres', 'Livre', $id);
    }
    
    
}