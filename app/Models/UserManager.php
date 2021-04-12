<?php
    namespace Projet\Models;

class UserManager extends Manager{

    public function verify_admin($pseudo){
        $bdd =$this->dbConnect();

        $name = $bdd->prepare("SELECT * FROM `users` WHERE pseudo=?");
        $name->execute(array($pseudo));
            return $name;
    }
    public function creatAdmin($firstname,$pseudo,$mail,$pass){
        $bdd=$this->dbConnect();
        $user=$bdd->prepare("INSERT INTO `users`(`firstname`,`pseudo`,`mail`,`password`) VALUES (?,?,?,?)");
        $user->execute([$firstname,$pseudo,$mail, $pass]);
            return $user;
    }
    public function getInfos(){
        $bdd = $this->dbconnect();        
        $req=$bdd->query("SELECT * FROM `users`");
            return $req;
    }

    
    // public function editInfo($id){
    //     $bdd = $this->dbconnect();
    //     $req=$bdd->prepare("SELECT * FROM `users` WHERE id=?");
    //     $req->execute([$id]);
    //         return $req;
    // }
    // public function updateInfo($id,$mail){
    //     $bdd-$this.dbConnect();

    //     $req=$bdd->prepare("UPDATE `users` SET mail= :mail WHERE id=:id");
    //     $req->exceute([
        //         'id'->$id,
        //         'mail'->$mail
        //     ]);        
        // }
    // public function deleteInfo($id){
    //     $bdd = $this->dbconnect();
    //     $req=$bdd->prepare("DELETE FROM `users` WHERE id=?");
    //     $req->execute([$id]);
    //         return $req;
    // }
    


}