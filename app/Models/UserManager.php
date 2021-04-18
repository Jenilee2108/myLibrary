<?php
    namespace Projet\Models;

class UserManager extends Manager {
    /** Pour créer un utilisateur **/
    public function createUser($name_user, $pseudo, $mail, $pass) {
        $bdd = $this->dbConnect();

        $user = $bdd->prepare("INSERT INTO `users`(`name_user`,`pseudo`,`mail`,`password`) VALUES (?,?,?,?)");
            $user->execute([$name_user,$pseudo,$mail, $pass]);
        return $user;
    }
    /** Pour vérifier si le pseudonyme est unique **/
    public function verify_pseudo($pseudo){
        $bdd = $this->dbConnect();

        $name = $bdd->prepare("SELECT `pseudo` FROM `users` WHERE pseudo=?");
            $name->execute(array($pseudo));
        return $name;
    }
    /** Pour récupérer le mot de passe associé à un pseudonyme **/
    public function recupMdp($pseudo){
        $bdd = $this->dbConnect();
        $user = $bdd->prepare("SELECT `password`,`mail`,`pseudo` FROM `users` WHERE pseudo=?");
        $user->execute(array($pseudo));
        return $user;
    }
    /** Pour récupérer un utilisateur **/
    public function getInfos() { 
        $bdd = $this->dbConnect();        
        $req = $bdd->query("SELECT `name_user`,`mail`,`password` FROM `users`");
        return $req;
    }
    /** Pour Mettre à jour un utilisateur **/  
    public function editInfo($id) { 
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT `name_user`,`mail`,`password` FROM `users` WHERE id = ?");
            $req->execute([$id]);
        return $req;
    }
    public function updateInfo($id, $mail, $name_user) { 
        $bdd = $this->dbConnect();

        $req = $bdd->prepare("UPDATE `users` SET mail = :mail, name_user = :name_user WHERE id = :id");
            $req->execute([
                $id=>'id',
                $mail=>'mail',
                $name_user=>'name_user'
            ]); 
        return $req;       
    }
    /** Pour supprimer un utilisateur **/
    public function deleteInfo($id) { 
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("DELETE FROM `users` WHERE id = ?");
            $req->execute([$id]);
         return $req;
    }
    


}