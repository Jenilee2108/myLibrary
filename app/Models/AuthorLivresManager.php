<?php 
namespace Projet\Models;

class AuthorLivresManager extends Manager {
    /** Pour insérer une association auteur/livre **/
    public function ecrit_par($idAuthor, $idLivre, $tome) {
        $bdd = $this->dbConnect();

        $req = $bdd->prepare("INSERT INTO `authorLivres`(`idAuthor`,`idLivre`,`tome`) VALUES (?, ?, ?)");
        $req->execute(array(
            $idAuthor => 'idAuthor',
            $idLivre => 'idLivre',
            $tome => 'tome'
        ));
        return $req;
    }

    /** Pour avoir l'association livre nom de l'auteur/auteur **/
    public function getEcritpar() {
        $bdd = $this->dbConnect();
        $infos = $bdd->query("SELECT title, name_author 
        FROM authorLivres , livres, authors 
        WHERE authorLivres.idLivre = livres.id
        AND authorLivres.idAuthor = authors.id");
    return $infos;
    }
    
    /** Pour avoir tous les livres écris par un auteur **/
    public function allEcritpar($idAuthor) {
        $bdd = $this->dbConnect();
        $infos = $bdd->prepare("SELECT  livres.`title`
        FROM livres, authorLivres, authors
        WHERE authorLivres.idLivre = livres.id
            AND authorLivres.idAuthor = authors.id
            AND EXISTS(SELECT id = ? FROM `authors`)");
        $infos->execute(array(
            $idAuthor
        ));
    return $infos;
    }
    /** Pour Mettre à jour une connexion livre/auteur **/
    public function updateEcritPar($id, $idAuthor, $idLivre, $tome) {
        $bdd = $this->dbConnect();

        $req = $bdd->prepare("UPDATE `authorLivres` SET idLivre = :idLivre, idAuthor = :idAuthor, tome = :tome WHERE id = :id");
        $req->execute(array(
            $id => 'id',
            $idAuthor => 'idAuthor',
            $idLivre => 'idLivre',
            $tome => 'tome'
        ));

    }
    
    /** Pour supprimer une connexion livre/auteur **/
    public function deleteEcritPar($id) {
        $bdd = $this->dbConnect();

        $req = $bdd->prepare("DELETE FROM `AuthorLivre` WHERE id = ?");
        $req->execute(array($id));
    }
}