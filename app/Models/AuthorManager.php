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
    /** Pour récupérer tous les ". $this->table." **/
    public function getAuthors()
    {
        $sql = "SELECT  CONCAT(" . $this->table . ".`firstname_author`,' ' ," . $this->table . ".`name_author`) AS name_author FROM `" . $this->table . "` ORDER BY id DESC";

        $req = $this->bdd->query($sql);
        return $req;
    }

    /** Pour récupérer un seul author par id **/
    public function getAuthor($id)
    {
        $sql = "SELECT CONCAT(" . $this->table . ".`firstname_author`,' ' ," . $this->table . ".`name_author`) AS name_author FROM `" . $this->table . "` WHERE id = $id ";

        $req = $this->bdd->prepare($sql);
        /** On execute la requête**/
        $req->execute(array($id));
        return $req;
    }

    public function updateAuthor($id, $name_author, $firstname_author)
    {
        $sql = "UPDATE " . $this->table . " SET name_author = :name_author, firstname_author = :firstname_author WHERE id = $id";
        $req = $this->bdd->prepare($sql);
        /** On injecte les valeurs **/
        $req->bindValue(":name_author", $name_author, PDO::PARAM_STR);
        $req->bindValue(":firstname_author", $firstname_author, PDO::PARAM_STR);
        /** On execute la requête**/
        $req->execute();
        return $req;
    }
    /** il n'y a pas de suppression car les auteurs ne sont pas à supprimer de la base de données **/
}