<?php
    namespace Projet\Models;
    use PDO;

class CommManager extends Manager{
     //table de la base de données
     protected $table;
     //instance de la bdd
         private $bdd;
     function __construct()
     {
         $this->table = "comms";
         $this->bdd = Manager::getInstance();
     }
    /** Methode de création d'un comm **/
     public function creatComm($content, $note, $idUser, $idAuthorLivre) {
        $sql = "INSERT INTO ". $this->table ."(content, note, idUser, idAuthorLivre) VALUES (:content,:note,'$idUser','$idAuthorLivre')";
    //On prépare la requête
        $comm= $this->bdd->prepare($sql);
    //on injecte les données
        $comm->bindValue(":content",$content, PDO::PARAM_STR);
        $comm->bindValue(":note",$note, PDO::PARAM_INT);        
    //On exécute la requête
        $comm->execute();
    return $comm;
    }    
    /** Pour récupérer toutes les informations des commentaires **/
    public function getComms() {
        $sql = "SELECT  `".$this->table."`.content, note, `users`.pseudo, CONCAT(authors.`firstname_author`,' ' ,authors.`name_author`) AS name_author, `livres`.title
        FROM  ".$this->table.", `users`, authorLivres, livres, authors
            WHERE  `".$this->table."`.idUser = `users`.id
            AND ".$this->table.".idAuthorLivre = `authorLivres`.id 
            AND `authorLivres`.`idAuthor` = `authors`.id 
            AND `authorLivres`.`idlivre` = `livres`.id
        ORDER BY ".$this->table.".id DESC";
        $req= $this->bdd->query();
    return $req;
        }
    /** Pour récupérer les commentaires par livre **/
            public function getComm($idLivre) {
            $sql = "SELECT  ".$this->table.".content AS content, note, date_ajout, users.pseudo AS pseudo, CONCAT(authors.`firstname_author`,' ' ,authors.`name_author`) AS name_author, `livres`.title AS title
            FROM  `".$this->table."`, `authorLivres`, `livres`, `authors`, `users`,
                WHERE  `".$this->table."`.`idUser` = `users`.id
                AND  `".$this->table."`.`idAuthorLivre` = `authorLivres`.id 
                AND `authorLivres`.`idAuthor` = `authors`.id 
                AND `authorLivres`.`idlivre` = `livres`.id
                AND `livres`.id = $idLivre";
        //On prépare la requête    
            $infos= $this->bdd->prepare($sql);
        //On exécute la requête
            $infos->execute(array(
                $idLivre
            ));
        return $infos;
        }
    /** Pour récupérer les commentaires par utilisateur **/
            public function getMyComm($pseudo) {
            
            $sql = "SELECT `".$this->table."`.`content` AS content, note, date_ajout, CONCAT(authors.`firstname_author`,' ' ,authors.`name_author`) AS name_author, `livres`.`title` AS title, `users`.`pseudo`
            FROM  `".$this->table."`,  `authorLivres`, `livres`, `authors`, `users`
                WHERE  `".$this->table."`.`idUser` = `users`.id
                AND  `".$this->table."`.`idAuthorLivre` = `authorLivres`.id 
                AND `authorLivres`.`idAuthor` = `authors`.id 
                AND `authorLivres`.`idlivre` = `livres`.id 
                AND `users`.`pseudo` = :pseudo";
        //On prépare la requête    
            $infos= $this->bdd->prepare($sql);
        //on injecte lse données
            $infos->bindValue(":pseudo",$pseudo, PDO::PARAM_STR);
        //On exécute la requête
            $infos->execute();
        return $infos;
        }


}

