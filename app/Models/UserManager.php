<?php

namespace Projet\Models;
use PDO;

class UserManager extends Manager
{
        //table de la base de données
        /**
         * nom de la table utilisé
         *
         * @var string
         */
        protected string $table;
        //instance de la bdd
        private $bdd;
    function __construct()
    {
        $this->table = "users";
        $this->bdd = Manager::getInstance();
    }
    /** On vérifie que le pseudo est unique **/
    public function verify_user($pseudo)
    {
        /** On appelle la bdd */
        // $this->bdd = Manager::getInstance();
        /** Requete de comparaison des pseudonyme **/
        $sql = "SELECT `pseudo` FROM ". $this->table." WHERE pseudo= :pseudo";
        /** On prépare la requête */
        $name = $this->bdd->prepare($sql);
        /** On injecte les valeurs */
        $name->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        /** On exécute la requête */
        $name->execute();
        return $name;
    }
    /** Pour créer un utilisateur **/
    public function createUser($pseudo, $name_user, $mail, $pass)
    {
        /** On appelle la BDD **/
        // $this->bdd = Manager::getInstance();
        /** Requete pour ajouter un utilisateurs en BDD **/
        $sql = "INSERT INTO ". $this->table."(`pseudo`, `name_user`,`mail`,`password`) VALUES (:pseudo, :name_user, :mail, :pass)";
        /** On prepare la requête **/
        $user = $this->bdd->prepare($sql);
        /** On injecte les valeurs **/
        $user->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $user->bindValue(":name_user", $name_user, PDO::PARAM_STR);
        $user->bindValue(":mail", $mail, PDO::PARAM_STR);
        $user->bindValue(":pass", $pass, PDO::PARAM_STR);
        /** On execute la requête**/
        $user->execute();
        return $user;
    }

    /** Pour récupérer le mot de passe associé à un pseudonyme **/
    public function recupMdp($pseudo)
    {
        /** On appelle la BDD **/
        // $this->bdd = Manager::getInstance();
        /** requête pour récupérer le mdp associé **/
        $sql = "SELECT `pseudo`,`mail`,`name_user`, `password`
        FROM `". $this->table."` WHERE pseudo = :pseudo";
        /** On prepare la requête **/
        $req = $this->bdd->prepare($sql);
        /** On injecte les valeurs **/
            $req->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        /** On exécute la requête */
        $req->execute();        
        return $req;
    }

    /** Pour Mettre à jour un utilisateur **/
    public function getInfos($pseudo)
    {
        /** On appelle la BDD **/
        // $this->bdd = Manager::getInstance();
        /** requête pour avoir les informations d'un utilisateur **/
        $sql = "SELECT `mail`,`password`,`pseudo` FROM ". $this->table."  WHERE pseudo = :pseudo";
        /** On prepare la requête **/
        $user = $this->bdd->prepare($sql);
        /** On injecte les valeurs **/
        $user->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        /** On exécute la requête */
        $user->execute();
        return $user;
    }
    public function updateInfo($pseudo,$mail,$pass)
    {
        /** On appelle la BDD **/
        // $this->bdd = Manager::getInstance();
        /** requête pour mettre a jour les informations d'un utilisateur */
        $sql = "UPDATE ". $this->table." SET `mail` = :mail, `password` = :pass  WHERE `pseudo` = :pseudo";
        /** On prepare la requête **/
        $user = $this->bdd->prepare($sql);
        /** On injecte les valeurs **/
        $user->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $user->bindValue(":mail", $mail, PDO::PARAM_STR);
        $user->bindValue(":pass", $pass, PDO::PARAM_STR);
        /** On execute la requête**/
        $user->execute();
        return $user;
    }
    
    /** Pour supprimer un utilisateur **/
    public function deleteUser($pseudo)
    {
        /** On appelle la BDD **/
        // $this->bdd = Manager::getInstance();
        /**requête pour supprimer un utilisateur **/
        $sql = "DELETE FROM ". $this->table." WHERE pseudo = :pseudo";
        /** On prepare la requête **/
        $user = $this->bdd->prepare($sql);
        /** On injecte les valeurs **/
        $user->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        /** On exécute la requête */
        $user->execute();
        return $user;
    }

}
