<?php
    namespace Projet\Models;

class AdminManager extends Manager {
    /** Pour créer un utilisateur **/
    public function creatAdmin($pseudo, $name, $mail, $pass) {
        $bdd = $this->dbConnect();

        $admin = $bdd->prepare("INSERT INTO `admins`(`pseudo`,`name`,`mail`,`password`) VALUES (?,?,?,?)");
            $admin->execute(array($pseudo,$name,$mail, $pass));
        return $admin;
    }
    /** Pour vérifier si le pseudonyme est unique **/
    public function verify_pseudo($pseudo){
        $bdd = $this->dbConnect();

        $pseudo = $bdd->prepare("SELECT `pseudo` FROM `admins` WHERE pseudo=?");
            $pseudo->execute(array($pseudo));
        return $pseudo;
    }
    /** Pour récupérer le mot de passe associé à un pseudonyme **/
    public function recupMdp($pseudo){
        $bdd = $this->dbConnect();
        $admin = $bdd->prepare("SELECT `password`,`mail`,`pseudo` FROM `admins` WHERE pseudo=?");
        $admin->execute(array($pseudo));
        return $admin;
    }
    /** Pour récupérer un utilisateur **/
    public function getInfos() { 
        $bdd = $this->dbConnect();        
        $req = $bdd->query("SELECT `name`,`mail`,`password` FROM `admins`");
        return $req;
    }
    /** Pour Mettre à jour un utilisateur **/  
    public function editInfo($id) { 
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT `name`,`mail`,`password` FROM `admins` WHERE id = ?");
            $req->execute(array($id));
        return $req;
    }
    public function updateInfo($id, $mail, $name) { 
        $bdd = $this->dbConnect();

        $req = $bdd->prepare("UPDATE `admins` SET mail = :mail, `name` = :`name` WHERE id = :id");
            $req->execute(array(
                $id=>'id',
                $mail=>'mail',
                $name=>'name'
            )); 
        return $req;       
    }
    /** Pour supprimer un utilisateur **/
    public function deleteInfo($id) { 
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("DELETE FROM `admins` WHERE id = ?");
            $req->execute(array($id));
         return $req;
    }
    


}