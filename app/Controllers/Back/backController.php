<?php
    namespace Projet\Controllers\Back;

use Projet\Models\UserManager;

class BackController{

    /**Fonction du menu **/
    public function inscription() {
        require "app/Views/Back/page-inscription.php";
    } 
    public function connexion() {
        require "app/Views/Back/page-connexion.php";
    }
    public function deconnexion() {
        session_unset();
       header("Location: indexAdmin.php?action=connexion");
    }
    public function tdb($pseudo) {
        $userManager = new \Projet\Models\UserManager();
        $name = $userManager->recupMdp($pseudo);
        $result = $name->fetch();
        var_dump($result);
            $pseudo = $result['pseudo'];
            $name_user = $result['name_user'];
            $mail = $result['mail'];
            $pass = $result['password'];
            /** On crée une session utilisateur **/
            $_SESSION['user'] = [
                'pseudo' => $pseudo,
                'name_user' => $name_user,
                'mail' => $mail,
                'pass' => $pass
            ];
        /** Pour afficher les livres **/
        $livres = new \Projet\Models\AuthorLivresManager();
            $allLivres = $livres->getEcritpar();
            /** Pour afficher les commentaires **/
        $infos = new \Projet\Models\CommManager();
            $allComms = $infos->getMyComm($pseudo);            
        require "app/Views/Back/page-tdb.php";
        }


        /** Page d'inscription **/
    /** Pour créer un utilisateur au pseudo unique **/
    public function createUser($pseudo, $name_user, $mail, $pass) {
        /** Appel du model **/
        $userManager = new \Projet\Models\UserManager();
        $_SESSION["error"] = [];
        /** Appel de la fonction de vérifiaction du pseudo **/
        $name = $userManager->verify_user($pseudo);
        $result = $name->fetch();
        /** Création des erreurs à gérer **/
        if($result['pseudo']) {
            die("Le pseudonyme que vous avez choisi est déjà utilisé");
            // $_SESSION['error'][] = "Le pseudonyme que vous avez choisi est déjà utilisé";
        }
        /** Vérification que l'adresse email est au bon format **/
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            die("Merci d'entrer une adresse mail valide");
            // $_SESSION["error"][] = "Merci d'entrer une adresse mail valide";
        };
        if($_SESSION["error"] == []) {
        /** Création de l'utilisateur en BDD **/
        $user = $userManager->createUser($pseudo, $name_user, $mail, $pass);
        /** Récupération des informations utilisateurs */
        $user = $userManager->recupMdp($pseudo);
                $_SESSION['user'] = [
                    "pseudo" => $user['pseudo'],
                    "mail" => $user['mail'],
                    "name_user" => $user['name_user'],
                    "pass" => $user['password']
                ] ;
            $livres = new \Projet\Models\AuthorLivresManager();
                $allLivres = $livres->getEcritpar();
            // $infos = new \Projet\Models\CommManager();
            /** Pas encore de commentaires car 1ère connexion **/
                $allComms = [];
        require 'app/Views/Back/page-tdb.php';
        }
    }
    
        /* Page de connexion */
    public function meconnecter($pseudo, $pass) {
        /** Appel du model **/
        $userManager = new \Projet\Models\UserManager();
        /** Mise en place de la gestion des erreurs **/
            $_SESSION["error"] = [];
        /** Récupération des données associées au pseudo **/        
        $user = $userManager->recupMdp($pseudo);
        $result = $user->fetch();
        /**Vérification de la présence de l'utilisateur **/
        if (!$result) {
            $_SESSION["error"][] = "l'utilisateur et le mot de passe est incorrecte";
        };
        /** Vérification de son mot de passe **/
        if (!password_verify($pass, $result['password'])) {
            $_SESSION["error"][] = "l'utilisateur (et/)ou le mot de passe est incorrecte";
        };
     
        /** Connexion l'utilisateur, et stokage des informations de la session **/
        if ($_SESSION["error"] === []) {
            $pseudo = $result['pseudo'];
            $name_user = $result['name_user'];
            $mail = $result['mail'];
            /** On crée une session utilisateur **/
            $_SESSION['user'] = [
                'pseudo' => $pseudo,
                'name_user' => $name_user,
                'mail' => $mail,
                'pass' => $pass
            ];
            var_dump($_SESSION['user']);
            /** Appel des livres et des commentaires en BDD  **/
            $livres = new \Projet\Models\AuthorLivresManager();
            $allLivres = $livres->getEcritpar();
            
            $infos = new \Projet\Models\CommManager();            
            $allComms = $infos->getMyComm($pseudo);
         
            // var_dump($allComms);
            // var_dump($allLivres);
           
            require 'app/Views/Back/page-tdb.php';
        }
    }
    /* Page TDB*/    
        /** Page Infos **/
    public function getInfos($pseudo) {
        $userManager = new \Projet\Models\UserManager();        
            $mesInfos = $userManager->getInfos($pseudo);
            $mesInfos = $mesInfos->fetch();
            var_dump($mesInfos);
            $pseudo = $mesInfos['pseudo'];
        require "app/views/back/page-infos.php";
    }
    public function updateInfo($pseudo, $mail, $pass) {
        $userManager = new \Projet\Models\UserManager();
        var_dump($mail);
        var_dump($pseudo);
        var_dump($pass);
        $user = $userManager->updateInfo($pseudo, $mail, $pass);
        $pseudo;

        header("Location: indexAdmin.php?action=tdb&pseudo=$pseudo");
    }
    function deleteUser($pseudo) {
        $userManager = new \Projet\Models\UserManager(); 
        $deleteUser = $userManager->deleteUser($pseudo);
        header("Location: indexAdmin.php?action=inscription");
    } 
















    /** Pour l'association livre auteur **/
    function deleteEcritPar($idLivre) {
        $livres = new \Projet\Models\AuthorLivresManager();

        $deleteLivre =$livres->deleteEcritPar($idLivre);
        header("Location: indexAdmin.php?action=tdb");
    }
    /** Pour créer des livres dans la table de livres **/
    function newLivre() {
        require "app/views/Back/page-livreCreer.php";
    }
    function creatLivre($title,$category,$content) {
            $Livre = new \Projet\Models\LivreManager();
            $newlivre = $Livre->creatLivre($title,$category,$content);
        header("Location: indexAdmin.php?action=newLivre");
    }
}