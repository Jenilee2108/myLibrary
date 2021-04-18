<?php 
namespace Projet\Models;

class AuthorLivresManager extends Manager {
    /** Pour insérer une association auteur/livre **/
    public function ecrit_par($idAuthor, $idLivre, $tome) {
        $bdd = $this->dbConnect();

        $req = $bdd->prepare("INSERT INTO `authorLivres`(`idAuthor`,`idLivre`,`tome`) VALUES (?, ?, ?)");
        $req->execute(array(
            $idAuthor,
            $idLivre,
            $tome
        ));
        return $req;
    }

    /** Pour avoir l'association livre nom de l'auteur/auteur **/
    public function getInfos($id, $idAuthor, $idLivre) {
        $bdd = $this->dbConnect();
        $infos = $bdd->query("SELECT title, name_author 
        FROM authorLivres , livres, authors 
        WHERE livres.id = authorLivres.idLivre
         AND authors.id = authorLivres.idAuthor");
         return $infos;
    }
    
    /** Pour avoir tous les livres écris par un auteur **/
    public function AllLivresEcritpar($titleLivre, $idAuthor, $idLivre) {
        $bdd = $this->dbConnect();
        $livres = $bdd->query("SELECT livres.id = :idLivre, livres.title = :titleLivre FROM livres, authorLivres AS ecrit_par 
            WHERE livres.id = ecrit_par.idLivre 
            AND ecrit_par.idAuthor = ? 
            AND EXISTS(SELECT :id FROM `authors`)");
    return $livres;
    }
}