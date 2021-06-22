<?php

namespace Projet\Models;
use PDO;

class AuthorManager extends Manager
{
   
    /**
     * nom de la table utilisée
     *
     * @var string
     */
    protected string $table;

    //instance de la bdd
    private $bdd;

    function __construct()
    {
        $this->table = "authors";
        $this->bdd = Manager::getInstance();
    }

    /** Methode de création d'un author **/
    public function creatAuthor($name_author, $firstname_author)
    {
        /** Requete de création d'auteur **/
        $sql = "INSERT INTO " . $this->table ."(`name_author`, `firstname_author`) VALUES (:name_author, :firstname_author)";
        /** Préparation de la requête **/
        $author = $this->bdd->prepare($sql);
        /** On injecte les valeurs **/
        $author->bindValue(":name_author", $name_author, PDO::PARAM_STR);
        $author->bindValue(":firstname_author", $firstname_author, PDO::PARAM_STR);
        /** Execution de la requête**/
        $author->execute();
        return $author;
    }
    /** Pour récupérer tous les auteurs **/
    public function getAuthors()
    {
        /** Requete de récupération des auteurs **/
        $sql = "SELECT  CONCAT(" . $this->table . ".`firstname_author`,' ' ," . $this->table . ".`name_author`) AS name_author FROM `" . $this->table . "` ORDER BY id DESC";
        /** On fait une requête **/
        $req = $this->bdd->query($sql);
        return $req;
    }
    
    /** Pour récupérer un seul author par id **/
    public function getAuthor($id)
    {
        /** Requete de récupération des livres écrits par un auteur donné **/
        $sql = "SELECT CONCAT(" . $this->table . ".`firstname_author`,' ' ," . $this->table . ".`name_author`) AS name_author FROM `" . $this->table . "` WHERE id = :id ";
        /** On prépare la requête **/
        $req = $this->bdd->prepare($sql);
        /** On injecte les données **/
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        /** On execute la requête**/
        $req->execute();
        return $req;
    }


    public function updateAuthor($id, $name_author, $firstname_author)
    {
        /** Requête de mise à jour d'un auteur **/
        $sql = "UPDATE " . $this->table . " SET name_author = :name_author, firstname_author = :firstname_author WHERE id = :id";
        /** On prépare la requête **/
        $req = $this->bdd->prepare($sql);
        /** On injecte les valeurs **/
        $req->bindValue(":name_author", $name_author, PDO::PARAM_STR);
        $req->bindValue(":firstname_author", $firstname_author, PDO::PARAM_STR);
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        /** On execute la requête**/
        $req->execute();
        return $req;
    }
    /** il n'y a pas de suppression car les auteurs ne sont pas à supprimer de la base de données **/
}