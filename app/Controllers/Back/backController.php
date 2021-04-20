<?php
namespace Projet\Controllers\Back;


class BackController{
    function test($idLivre, $idAuthor) {
        $livres = new \Projet\Models\LivreManager();
        $allLivres = $livres->getLivres();
           
        $infos = new \Projet\Models\CommManager();
        $allComms = $infos->getComms($idLivre);
        
        $infos = new \Projet\Models\AuthorLivresManager();
        $allMemos = $infos->allEcritpar($idAuthor);
        require "app/Views/Back/page-test.php";
     }
    
    /**Page de la template **/
        /* Page de connexion */
        public function connexion() {
            require "app/Views/Back/page-connexion.php";
        }
        public function meconnecter($pseudo,$pass) {
            $userManager = new \Projet\Models\UserManager();
            /** On récupère le mdp associé au pseudo **/
            $user = $userManager->recup($pseudo);
                $result = $user->fetch();
            /** On vérifie qu'il est identique au mdp reçu **/            
                $isPasswordCorrect = password_verify($pass, $result['password']);
            /** on passe ce que l'on récupère dans une session */                
                $_SESSION['pseudo']= $result['pseudo'];
                $_SESSION['mail']= $result['mail'];
                $_SESSION['password']= $result['password'];
            /**si mes mots de passe sont identiques on renvoie la vue sinon on affiche un message **/
            if($isPasswordCorrect){
                $livres = new \Projet\Models\AuthorLivresManager();
                $allLivres = $livres->getEcritpar();

                require 'app/Views/Back/page-tdb.php';
            }
            else{
                echo "Les mots de passe ne sont pas identiques";
            }

        }
        /** Page d'inscription **/
        public function inscription() {
            require "app/Views/Back/page-inscription.php";
        }
        /** Pour créer un administrateur au pseudo unique **/
        public function creatAdmin($pseudo, $name, $mail, $pass) {
            $adminManager = new \Projet\Models\AdminManager();
            /** on appelle la fonction de réupération du pseudo **/
            $pseudo = $adminManager->verify_pseudo($pseudo);
            $result = $pseudo->fetch();
            /** on agi en fonction du résultat **/
            if($result['pseudo']){
                echo "Le pseudonyme que vous avez choisi est déjà utilisé";
            }
            else{
                $admin = $adminManager->creatAdmin($pseudo,$name,$mail,$pass);
                header("Location: indexAdmin.php?action=tdb");
            }
        }
       
        function tdb($idLivre) {
            $infos = new \Projet\Models\CommManager();
            $allComms = $infos->getComm($idLivre);
                        
            // $infos = new \Projet\Models\AuthorLivresManager();
            // $allLivres = $infos->getEcritpar();

            
            require "app/Views/Back/page-tdb.php";
        }


    /** Page des livres **/




























        // function creatAdmin($firstname,$pseudo,$mail,$pass){
        //     $userManager = new \Projet\Models\UserManager();
        //     $name = $userManager->verify_admin($pseudo);

        //     $result = $name->fetch();

        //     if($result['pseudo']){
        //         echo "Le pseudonyme est déjà utilisé";
        //     }
        //     else{
        //         $user = $userManager->creatAdmin($firstname,$pseudo,$mail,$pass);
        //         header("Location: indexAdmin.php?action=meconnecter");
        //     }
        // }
}