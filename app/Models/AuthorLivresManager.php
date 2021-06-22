<?php

namespace Projet\Models;

use PDO;

class AuthorLivresManager extends Manager
{
    //table de la base de données
    protected $table;
    //instance de la bdd
    private $bdd;
    function __construct()
    {
        $this->table = "authorLivres";
        $this->bdd = Manager::getInstance();
    }
    /** Pour insérer une association auteur/livre **/
    public function ecrit_par($idAuthor, $idLivre, $tome)
    {
        $sql = "INSERT INTO " . $this->table . ".(`idAuthor`,`idLivre`,`tome`) VALUES ('$idAuthor', '$idLivre', :tome)";
        /** On prépare la requête **/
        $req = $this->bdd->prepare($sql);
        /** On injecte les valeurs */
        $req->bindValue(':tome', $tome, PDO::PARAM_STR);
        $req->execute();
        return $req;
    }

    /** Pour avoir les 6 dernier livres de l'association livre nom de l'auteur/auteur **/
    public function getEcritpar()
    {
        $sql = "SELECT " . $this->table . ".`id`AS id,
        `tome`,
        `livres`.`title` AS title,
        `livres`.`content` AS content,
        `livres`.`category` AS category,
        CONCAT(authors.`firstname_author`,' ' ,authors.`name_author`) AS name_author,
        COUNT(comms.`note`) AS 'votes',
        ROUND(AVG(comms.`note`), 2) AS 'noteMoyenne'
        FROM " . $this->table . " INNER JOIN `livres`
        ON " . $this->table . ".`idLivre` = `livres`.id
        INNER JOIN `authors`
        ON " . $this->table . ".`idAuthor` = `authors`.id
        LEFT OUTER JOIN `comms`
        ON `" . $this->table . "`.id = `comms`.idAuthorLivre
        GROUP BY " . $this->table . ".id
        ORDER BY " . $this->table . ".tome 
        ASC LIMIT 6
        ";
        /** On prépare la requête **/
        $mesLivres = $this->bdd->query($sql);
        return $mesLivres;
    }

    /** Pour un livre écris par un auteur **/
    public function OneEcritpar($idLivre)
    {
        $sql = "SELECT " . $this->table . ".`id` AS id,
        livres.`title` AS title, `livres`.`content` AS content,
        `livres`.`category` AS category,
        CONCAT(`firstname_author`,' ' ,`name_author`) AS name_author
            FROM " . $this->table . " 
            INNER JOIN `livres` 
                ON " . $this->table . ".`idLivre` = `livres`.id
            INNER JOIN `authors` 
                ON " . $this->table . ".`idAuthor` = `authors`.id
            WHERE  " . $this->table . ".id = '$idLivre'";
        /** On prépare la requête **/
        $livre = $this->bdd->prepare($sql);
        /** On exécute la requête */
        $livre->execute(array(
            $idLivre
        ));
        var_dump($idLivre);
        die;
        return $livre;
    }

    /** Pour récupérer les auteurs **/
    public function getAuthors()
    {
        $sql = "SELECT CONCAT(`name_author`,' ' ,`firstname_author`) AS name_author 
        FROM authors, " . $this->table . " 
        WHERE `authors`.id = `" . $this->table . "`.idAuthor 
        GROUP BY idAuthor
         ORDER BY name_author LIMIT 5;";
        /**  On prépare la requête **/
        $authors = $this->bdd->query($sql);
        return $authors;
    }
    /** Pour avoir tous les livres écris par un auteur **/
    public function allEcritpar($idAuthor)
    {
        $sql = "SELECT livres.`title` AS title, `livres`.`content` AS content, `livres`.`category` AS category, CONCAT(`firstname_author`,' ' ,`name_author`) AS name_author
        FROM " . $this->table . " 
        INNER JOIN `livres` 
            ON " . $this->table . ".`idLivre` = `livres`.id
        INNER JOIN `authors` 
            ON " . $this->table . ".`idAuthor` = `authors`.id
        WHERE EXISTS(SELECT id = '$idAuthor' FROM `authors`)";
        /** On prépare la requête **/
        $infos = $this->bdd->prepare($sql);
        /** On exécute la requête */
        $infos->execute(array(
            $idAuthor
        ));
        return $infos;
    }

    /** Pour Mettre à jour une connexion livre/auteur **/
    public function updateEcritPar($id, $idAuthor, $idLivre, $tome)
    {
        $sql = "UPDATE " . $this->table . " 
        SET `idLivre` = '$idLivre', `idAuthor` = '$idAuthor', `tome` = :tome 
        WHERE id = '$id'";
        /** On prépare la requête **/
        $update = $this->bdd->prepare($sql);
        /** On injecte les valeurs **/
        $update->bindValue(':tome', $tome, PDO::PARAM_STR);
        /** On exécute la requête */
        $update->execute();
        return $update;
    }

    /** Pour supprimer une connexion livre/auteur **/
    public function deleteEcritPar($idLivre)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = '$idLivre'";
        /** On prépare la requête **/
        $delete = $this->bdd->prepare($sql);
        /** On exécute la requête */
        $delete->execute(array($idLivre));
    }

    /** Pour la barre de recherche **/
    public function recherche($recherche)
    {
        $sql = "SELECT " . $this->table . ".`id`AS id,
        `tome`,
        `livres`.`title` AS title,
        `livres`.`content` AS content,
        `livres`.`category` AS category,
        CONCAT(authors.`firstname_author`,' ' ,authors.`name_author`) AS name_author,
        COUNT(comms.`note`) AS 'votes',
        ROUND(AVG(comms.`note`), 2) AS 'noteMoyenne'
        FROM " . $this->table . " INNER JOIN `livres`
            ON " . $this->table . ".`idLivre` = `livres`.id
            INNER JOIN `authors`
            ON " . $this->table . ".`idAuthor` = `authors`.id
            LEFT OUTER JOIN `comms`
            ON `" . $this->table . "`.id = `comms`.idAuthorLivre
        WHERE name_author LIKE '%".$recherche."%'
            OR title LIKE '%".$recherche."%'
            OR `livres`.`content` LIKE '%".$recherche."%'
        GROUP BY " . $this->table . ".id
        ORDER BY livres.title 
        ASC LIMIT 6
        ";
        /** On prépare la requête **/
        $search = $this->bdd->query($sql);
        /** On injecte les valeurs **/
        $search->bindValue(":recherche",$recherche, PDO::PARAM_STR);
        return $search;
    }
}
