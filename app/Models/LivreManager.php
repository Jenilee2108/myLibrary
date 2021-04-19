<?php
    namespace Projet\Models;

class LivreManager extends Manager {
    /** Methode de création d'un livre **/
     public function creatLivre($title,$category,$content) {
        $bdd = $this->dbConnect();

        $livre = $bdd->prepare("INSERT INTO `livres`(title, category,`content`) VALUES (?,?,?)");
        $livre->execute(array(
            $title => 'title',
            $category => 'category',
            $content => 'content'     
            ));
        return $livre;
    }    
    /** Pour récupérer tous les livres **/
    public function getLivres() {
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT title, category, `content` FROM `livres` ORDER BY id DESC");
            return $req;
        }
    /** Pour récupérer un seul livre par id **/
    public function getLivre($id) {
        $bdd = $this->dbConnect();

        $req = $bdd->prepare("SELECT title, category, `content` FROM `livres` WHERE id= ? ");
        $req->execute(array($id));
            return $req;
        }
    public function updateLivre($id, $title, $category, $content) {
        $bdd = $this->dbConnect();

        $req = $bdd->prepare("UPDATE `livres` SET title = :title, category = :category, content = :content WHERE id = :id");
            $req->execute(array(
                $id => 'id',
                $title => 'title',
                $category => 'category',
                $content => 'content'
                )); 
        return $req;
    }
    /** il n'y a pas de suppression car les livres ne sont pas à supprimer de la base de données **/
    

        
}