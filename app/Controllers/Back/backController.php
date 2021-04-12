<?php 
    namespace Projet\Controllers\Back;
    use Projet\Models\{UserManager};

class BackController{
    /**Page de la template **/
        /* pour etre connecter a la page de connexion user */
    function inscription(){
        require "app/views/Back/creerAdmin.php";
    }
    
    function creatAdmin($firstname,$pseudo,$mail,$pass){
        $userManager = new \Projet\Models\UserManager();
        $name = $userManager->verify_admin($pseudo);

        $result = $name->fetch();

        if($result['pseudo']){
            echo "Le pseudonyme est déjà utilisé";
        }
        else{
            $user = $userManager->creatAdmin($firstname,$pseudo,$mail,$pass);
            header("Location: indexAdmin.php?action=meconnecter");
        }
    }
    function meconnecter(){
        require 'app/views/Back/connecterAdmin.php';
    }
    function connectAdmin($pseudo,$pass){
        $userManager = new \Projet\Models\UserManager();
        $connexionUser = $userManager->verify_admin($pseudo,$pass);
        /** On stock le fetch dans une variable result **/
            $result = $connexionUser->fetch();
            $isPasswordCorrect = password_verify($pass, $result['password']);
        /** on passe ce que l'on récupère dans une session */
            $_SESSION['id']= $result['id'];
            $_SESSION['firstname']= $result['firstname'];
            $_SESSION['pseudo']= $result['pseudo'];
            $_SESSION['mail']= $result['mail'];
            $_SESSION['password']= $result['password'];
        /**si mes mots de passe sont identiques on renvoie la vue sinon on affiche un message **/
        if($isPasswordCorrect){
            $livres = new \Projet\Models\BookManager();
            $allLivres = $livres->getLivres();
    
            $memos = new \Projet\Models\MemoManager();
            $allMemos = $memos->getMemos();
            require 'app/views/Back/gestionAdmin.php';
        }
        else{
            echo "Les mots de passe ne sont pas identiques";
        }
    }
    function tbdAdmin(){
        require 'app/views/Back/gestionAdmin.php';
    }
}