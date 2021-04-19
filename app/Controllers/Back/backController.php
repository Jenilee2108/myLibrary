<?php
namespace Projet\Controllers\Back;


class BackController{
    /**Page de la template **/
        /* pour etre connecter a la page de connexion user */
        function inscription() {
            $livres = new \Projet\Models\LivreManager();
            $allLivres = $livres->getLivres();

            $infos = new \Projet\Models\AuthorLivresManager();
            $allMemos = $infos->getEcritpar();
           
            require "app/views/Back/page-test.php";
         }
        function tdb($idAuthor) {
             $infos = new \Projet\Models\AuthorLivresManager();
            $sesLivres = $infos->allEcritpar($idAuthor);
            
            require "app/views/Back/page-test.php";
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