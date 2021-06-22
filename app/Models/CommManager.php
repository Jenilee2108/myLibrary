<?php

namespace Projet\Models;

use PDO;

class CommManager extends Manager
{
    //table de la base de données
    protected $table;
    protected $livreAssocie;
    protected $livre;

    //instance de la bdd
    private $bdd;
    function __construct()
    {
        $this->table = "comms";
        $this->livreAssocie = "authorLivres";
        $this->livres  = "livres";
        $this->bdd = Manager::getInstance();
    }
    /** Methode de création d'un comm **/
    public function creatComm($content, $note, $idUser, $idAuthorLivre)
    {
        $sql = "INSERT INTO " . $this->table . "(content, note, idUser, idAuthorLivre) 
        VALUES (:content,:note,:idUser,:idAuthorLivre)";
        //On prépare la requête
        $comm = $this->bdd->prepare($sql);
        //on injecte les données
        $comm->bindValue(":content", $content, PDO::PARAM_STR);
        $comm->bindValue(":note", $note, PDO::PARAM_INT);
        $comm->bindValue(":idAuthorLivre", $idAuthorLivre, PDO::PARAM_INT);
        $comm->bindValue(":idUser", $idUser, PDO::PARAM_INT);
        //On exécute la requête
        $comm->execute();
        return $comm;
    }

    /** Pour récupérer les commentaires d'un livre **/
    public function getComm($idLivre)
    {
        $sql = "SELECT   " . $this->table . ".content AS content, note, date_ajout, users.pseudo AS pseudo, CONCAT(authors.`firstname_author`,' ' ,authors.`name_author`) AS name_author, `". $this->livres ."`.title AS title
            FROM  `" . $this->table . "`, `" . $this->livreAssocie . "`, `". $this->livres ."`, `authors`, `users`,
                WHERE  `" . $this->table . "`.`idUser` = `users`.id
                AND  `" . $this->table . "`.`idAuthorLivre` = `" . $this->livreAssocie . "`.id 
                AND `" . $this->livreAssocie . "`.`idAuthor` = `authors`.id 
                AND `" . $this->livreAssocie . "`.`idlivre` = `". $this->livres ."`.id
                AND `". $this->livres ."`.id = :id";
        //On prépare la requête    
        $infos = $this->bdd->prepare($sql);
        // On injecte les données
        $infos->bindValue(":id", $idLivre, PDO::PARAM_INT);
        //On exécute la requête
        $infos->execute();
        return $infos;
    }

    /** Pour récupérer tous les commentaires d'un utilisateur **/
    public function getMyComm($pseudo)
    {
        $sql = "SELECT " . $this->table . ".`id`, `" . $this->table . "`.`content` AS content, note, date_ajout, CONCAT(authors.`firstname_author`,' ' ,authors.`name_author`) AS name_author, `". $this->livres ."`.`title` AS title, `users`.`pseudo`
            FROM  `" . $this->table . "`,  `" . $this->livreAssocie . "`, `". $this->livres ."`, `authors`, `users`
                WHERE  `" . $this->table . "`.`idUser` = `users`.id
                AND  `" . $this->table . "`.`idAuthorLivre` = `" . $this->livreAssocie . "`.id 
                AND `" . $this->livreAssocie . "`.`idAuthor` = `authors`.id 
                AND `" . $this->livreAssocie . "`.`idlivre` = `". $this->livres ."`.id 
                AND `users`.`pseudo` = :pseudo 
            ORDER BY `" . $this->table . "`.`idAuthorLivre`";
        //On prépare la requête    
        $infos = $this->bdd->prepare($sql);
        //on injecte lse données
        $infos->bindValue(":pseudo", $pseudo, PDO::PARAM_INT);
        //On exécute la requête
        $infos->execute();
        return $infos;
    }
    /** Pour mettre à jour un commentaire **/
    public function modifComm($idComm)
    {
        $sql = "SELECT " . $this->table . ".`content`, `note`, `". $this->livres ."`.`title` AS title
            FROM " . $this->table . ", " . $this->livreAssocie . ", ". $this->livres ."
            WHERE " . $this->table . ".`idAuthorLivre` = " . $this->livreAssocie . ".`id`
            AND  " . $this->livreAssocie . ".`idLivre` = ". $this->livres .".id
            AND " . $this->table . ".`id` = :id";
        /**  On prépare la requête **/
        $Comm = $this->bdd->prepare($sql);
        $Comm->bindValue(":id", $idComm, PDO::PARAM_INT);
        /** On execute la requête **/
        $Comm->execute();
        return $Comm;
    }
    public function updateComm($idComm, $content, $note)
    {
        $sql = "UPDATE ". $this->table ."
        SET `content` = :content, `note`= :note
        WHERE id = :id";
        /**  On prépare la requête **/
        $Comm = $this->bdd->prepare($sql);
        /** On injecte les valeurs **/
        $Comm->bindValue(":note", $note, PDO::PARAM_INT);
        $Comm->bindValue(":content", $content, PDO::PARAM_STR);
        $Comm->bindValue(":id", $idComm, PDO::PARAM_INT);
        /** On execute la requête **/
        $Comm->execute();
        return $Comm;
    }

    /** Pour supprimer un commentaire **/
    public function deleteComm($idComm)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
        /** On prépare la requête **/
        $Comm = $this->bdd->prepare($sql);
        /** On injecte les données **/
        $Comm->bindValue(":id", $idComm, PDO::PARAM_INT);
        /** On execute la requête **/
        $Comm->execute();
    }
}
