<?php
    namespace Projet\Models;

class AuthorManager extends Manager{
    /** Methode de création d'un author **/
     public function creatAuthor($name_author, $firstname_author) {
        $bdd = $this->dbConnect();

        $author = $bdd->prepare("INSERT INTO `authors`(name_author, firstname_author) VALUES (?,?,?)");
        $author->execute(array(
            $name_author,     
            $firstname_author
            ));
        return $author;
    }    
    /** Pour récupérer tous les authors **/
    public function getAuthors() {
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT  CONCAT(authors.`firstname_author`,' ' ,authors.`name_author`) AS name_author FROM `authors` ORDER BY id DESC");
            return $req;
        }
    /** Pour récupérer un seul author par id **/
    public function getAuthor($id) {
        $bdd = $this->dbConnect();

        $req = $bdd->prepare("SELECT CONCAT(authors.`firstname_author`,' ' ,authors.`name_author`) AS name_author FROM `authors` WHERE id = ? ");
        $req->execute(array($id));
            return $req;
        }
    public function updateAuthor($id, $name_author, $firstname_author) {
        $bdd = $this->dbConnect();

        $req = $bdd->prepare("UPDATE `authors` SET name_author = :name_author, firstname_author = :firstname_author WHERE id = :id");
            $req->execute(array(
                $id => 'id',
                $name_author => 'name_author',
                $firstname_author => 'firstname_author'
                )); 
        return $req;
    }
    /** il n'y a pas de suppression car les auteurs ne sont pas à supprimer de la base de données **/
    

        
}