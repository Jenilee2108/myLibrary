<?php
namespace Projet\Controllers\Back;
Use Projet\Models\{UserManager};

class BackController{
    /**Page de la template **/
        /* pour etre connecter a la page de connexion user */
        function inscription(){
            $livres = new \Projet\Models\LivreManager();
            $allLivres = $livres->getLivres();
            require "app/views/Back/page-tdbAdmin.php";
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
}