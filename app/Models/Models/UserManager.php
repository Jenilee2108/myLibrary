<?php
/**
 * 
 */
class UserManager extends Model {
    
    //Création de la fonction de récupération de tous les users dans la bdd
    //vu qu'elle hérite de Model on peut utiliser la méthode getAll('table','Objet')ac une Majuscule car c'est une class que l'on veut crer
    public function getUsers() {  
        return $this->getAll('users','User');
    }
    //pour ne récupérer qu'un seul article
    public function getUser($id) {
        return $this->getOne('users', 'User', $id);
    }
    
    
}