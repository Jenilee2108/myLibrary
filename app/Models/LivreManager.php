<?php
    namespace Projet\Models;
    use PDO;

class LivreManager extends Manager {
    //table de la base de données
        protected $table;
    //instance de la bdd
        private $bdd;
    function __construct()
    {
        $this->table= "livres";
        $this->bdd = Manager::getInstance();
    }

    /** Methode de création d'un livre **/
     public function creatLivre($title,$category,$content) {
       
        $sql ="INSERT INTO". $this->table."(`title`, `category`,`content`) VALUES (:title, :category, :content)";
        /**  On prépare la requête **/
        $livre = $this->bdd->prepare($sql);
        /** On injecte les valeurs **/
            $livre->bindValue(":title",$title, PDO::PARAM_STR);
            $livre->bindValue(":category",$category, PDO::PARAM_STR);
            $livre->bindValue(":content",$content, PDO::PARAM_STR);
        /** On execute la requête **/
        $livre->execute();
        return $livre;
    }    
    /** Pour récupérer tous les livres **/
    public function getLivres() {
        $sql= "SELECT title, category, `content` FROM". $this->table."ORDER BY id";
        /**  On prépare la requête **/
        $livres = $this->bdd->query($sql);
        return $livres;
    }
    /** Pour récupérer un seul livre par id **/
    public function getLivre($id) {
        
        $sql = "SELECT title, category, `content` FROM". $this->table."WHERE id = :id ";
        /**  On prépare la requête **/
        $livre = $this->bdd->prepare($sql);
       /** On injecte les valeurs **/
        $livre->bindValue(":id",$id, PDO::PARAM_INT);
        /** On execute la requête **/
        $livre->execute();
        return $livre;
    }
    public function updateLivre($id, $title, $category, $content) {
        $sql = "UPDATE". $this->table."SET title = :title, category = :category, content = :content WHERE id = :id";
        /**  On prépare la requête **/
        $livre = $this->bdd->prepare($sql);
        /** On injecte les valeurs **/
        $livre->bindValue(":title",$title, PDO::PARAM_STR);
        $livre->bindValue(":category",$category, PDO::PARAM_STR);
        $livre->bindValue(":content",$content, PDO::PARAM_STR);
        $livre->bindValue(":id",$id, PDO::PARAM_INT);
        /** On execute la requête **/
        $livre->execute();
        
        return $livre;
    }
    /** Pour récupérer les catégories de livres **/
    public function getCategory() {
        $sql= "SELECT category FROM ". $this->table." GROUP BY category";
        /**  On prépare la requête **/
        $categories = $this->bdd->query($sql);
        return $categories;
    }
    /** il n'y a pas de suppression car les livres ne sont pas à supprimer de la base de données **/
    

        
}