<?php
    namespace Projet\Models;

class CommManager extends Manager{
    /** Methode de création d'un comm **/
     public function creatComm($content, $note, $idUser, $idAuthorLivre) {
        $bdd = $this->dbConnect();

        $comm = $bdd->prepare("INSERT INTO `comms`(content, note, idUser, idAuthorLivre) VALUES (?,?,?,:idUser, :idAuthorLivre)");
        $comm->execute(array(
            $content,
            $note,
            $idUser,
            $idAuthorLivre));
    return $comm;
    }    
    /** Pour récupérer toutes les informations des commentaires **/
    public function getComms() {
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT comms.content, note, users.pseudo, CONCAT(authors.`firstname_author`,' ' ,authors.`name_author`) AS name_author, livres.title
        FROM `comms`, `users`, authorLivres, livres, authors
            WHERE comms.idUser = users.id
            AND comms.idAuthorLivre = authorLivres.id 
            AND authorLivres.idAuthor = authors.id 
            AND authorLivres.idlivre = livres.id
        ORDER BY comms.id DESC");
    return $req;
        }
    /** Pour récupérer les commentaires par livre **/
            public function getComm($idLivre) {
            $bdd = $this->dbConnect();
    
            $infos = $bdd->prepare("SELECT comms.content AS content, note, date_ajout, users.pseudo AS pseudo, CONCAT(authors.`firstname_author`,' ' ,authors.`name_author`) AS name_author, livres.title AS title
            FROM `comms`,  authorLivres, livres, authors`users`,
                WHERE comms.idUser = users.id
                AND comms.idAuthorLivre = authorLivres.id 
                AND authorLivres.idAuthor = authors.id 
                AND authorLivres.idlivre = livres.id
                AND livres.id = ?");
            $infos->execute(array(
                $idLivre
            ));
        return $infos;
        }


}

