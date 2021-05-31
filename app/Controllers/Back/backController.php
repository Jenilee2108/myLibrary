<?php
    namespace Projet\Controllers\Back;

use Projet\Models\UserManager;

class BackController{
    function test() {
            // $livres = new \Projet\Models\LivreManager();
            // $allLivres = $livres->getLivres();
            
            // $infos = new \Projet\Models\CommManager();
            // $allComms = $infos->getComms($idLivre);
            // /** Pour avoir tous les livres écris par un auteur donné **/
            // $infos = new \Projet\Models\AuthorLivresManager();
            // $allMemos = $infos->allEcritpar($idAuthor);
            
            // $userManager = new \Projet\Models\UserManager;
            // $users = $userManager->findAll();
            
        require "app/Views/Back/page-test.php";
     }
    
    /**Fonction du menu **/

    public function inscription() {
        require "app/Views/Back/page-inscription.php";
    } 
    public function connexion() {
        require "app/Views/Back/page-connexion.php";
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
            $infos = new \Projet\Models\CommManager();
                $allComms = $infos->getMyComm($pseudo);
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
        // var_dump($result);
        $pseudo = $result['pseudo'];
        // var_dump($pseudo);
        /**Vérification de la présence de l'utilisateur **/
        if (!$result) {
            $_SESSION["error"][] = "l'utilisateur et le mot de passe est incorrecte";
        };
        // var_dump($pass);
        // var_dump($result['password']);
        /** Vérification de son mot de passe **/
        if (!password_verify($pass, $result['password'])) {
            $_SESSION["error"][] = "l'utilisateur (et/)ou le mot de passe est incorrecte";
        };
        /** Connexion l'utilisateur, et stokage des informations de la session **/
        if ($_SESSION["error"] === []) {
            $_SESSION['user'] = [
                'pseudo' => $pseudo,
                'name_user' => $result['name_user'],
                'mail' => $result['mail'],
                'pass' => $pass
            ];         
            // die;
            // var_dump($_SESSION['user']);
            $livres = new \Projet\Models\AuthorLivresManager();
            $allLivres = $livres->getEcritpar();
            
            $infos = new \Projet\Models\CommManager();            
            $allComms = $infos->getMyComm($pseudo);
            // var_dump($_SESSION);
            // var_dump($allComms);
            // var_dump($allLivres);
           
            require 'app/Views/Back/page-tdb.php';
        }
       var_dump($_SESSION['error']);
    }
    /* Page TDB*/
    public function tdb($pseudo) {
        /**Pour afficher l'utilisateur **/

        /** Pour afficher les livres **/
        $livres = new \Projet\Models\AuthorLivresManager();
            $allLivres = $livres->getEcritpar();
            /** Pour afficher les commentaires **/
        $infos = new \Projet\Models\CommManager();
            $allComms = $infos->getMyComm($pseudo);            
        require "app/Views/Back/page-tdb.php";
        }
    
        /** Page Infos **/
    public function getInfos($pseudo) {
        $userManager = new \Projet\Models\UserManager();        
            $mesInfos = $userManager->getInfos($pseudo);
            $mesInfos = $mesInfos->fetch();
            var_dump($mesInfos);
            $pseudo = $mesInfos['pseudo'];
            $_SESSION['user'] = [
                'pseudo' => $pseudo,
                'mail' => $mesInfos['mail']
            ]; 
        require "app/views/back/page-infos.php";
    }
    public function updateInfo($pseudo, $mail, $pass) {
        $userManager = new \Projet\Models\UserManager();
        var_dump($mail);
        var_dump($pseudo);
        var_dump($pass);
        $user = $userManager->updateInfo($pseudo, $mail, $pass);
        $mail = $user['mail'];
        $user2 = $userManager->recupMdp($pseudo);
        $result = $user2->fetch();
        $_SESSION['user'] = [
            'pseudo' => $pseudo,
            'name_user' => $result['name_user'],
            'mail' => $mail,
            'pass' => $pass
        ];         
        // // die;
        // var_dump($_SESSION['user']);
        // $livres = new \Projet\Models\AuthorLivresManager();
        // $allLivres = $livres->getEcritpar();
        
        // $infos = new \Projet\Models\CommManager();
        
        // $allComms = $infos->getMyComm($pseudo);
        // // var_dump($_SESSION);
        // // var_dump($allComms);
        // // var_dump($allLivres);
       
        // require 'app/Views/Back/page-tdb.php';
        // var_dump($result);
        // $pseudo = $result['pseudo'];
        // $_SESSION['user'] = [
        //     'pseudo' => $pseudo,
        //     'mail' => $mail,
        //     'pass' => $pass
        // ];
        // $pseudo;
        // require "app/views/back/page-infos.php";
        header("Location: indexAdmin.php?action=tdb");
    }
    function deleteUser($pseudo) {
        $userManager = new \Projet\Models\UserManager(); 
        $deleteUser = $userManager->deleteUser($pseudo);
        header("Location: indexAdmin.php?action=inscription");
    }

    


    /** Pour les livres associés à un auteur **/
    function deleteEcritPar($id) {
        $livres = new \Projet\Models\AuthorLivresManager();

        $deleteLivre =$livres->deleteEcritPar($id);
        header("Location: indexAdmin.php?action=tdb");
    }
    function newLivre() {
        require "app/views/Back/page-livreCreer.php";
    }


    /** Pour créer des livres dans la table de livres **/
    function creatLivre($title,$category,$content) {
            $Livre = new \Projet\Models\LivreManager();
            $newlivre = $Livre->creatLivre($title,$category,$content);
        header("Location: indexAdmin.php?action=newLivre");
    }
}