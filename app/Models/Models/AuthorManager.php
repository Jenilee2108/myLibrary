<?php
/**
 * 
 */
class AuthorManager extends Model {
    
    //Création de la fonction de récupération de tous les authors dans la bdd
    //vu qu'elle hérite de Model on peut utiliser la méthode getAll('table','Objet')ac une Majuscule car c'est une class que l'on veut crer
    public function getAuthors() {  
        return $this->getAll('authors','Author');
    }
    //pour ne récupérer qu'un seul article
    public function getAuthor($id) {
        return $this->getOne('authors', 'Author', $id);
    }
    
    
}