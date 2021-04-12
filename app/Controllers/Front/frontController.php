<?php
    namespace Projet\Controllers\Front;
    use Projet\Models\{};

    class FrontController{
        /** afficher la page d'accueil **/
        function accueil(){
            require "app/views/Front/accueil.php";
        }
        /** afficher la page des derniers livres ajouter et ceux mémoriser **/
        function about(){
            /** Liens vers la bibliotheque dans la BDD **/           
            $livres = new \Projet\Models\BookManager();
            $allLivres = $livres->getLivres();
    
            $memos = new \Projet\Models\MemoManager();
            $allMemos = $memos->getMemos();
            require "app/views/Front/blog.php";
        }
        /** pour afficher la page d'enregistrement de memolivres **/
        function memorise(){
            require "app/views/Front/memorise.php";
        }
                /** Pour la page memorise.php**/   
        /** pour envoyer le formulaire de livre a mémoriser **/
        function creatMemo($title,$author,$sujet,$content,$isbn,$pseudo){
            $MemoManager = new\Projet\Models\MemoManager();
            $memo=$MemoManager->creatMemo($title,$author,$sujet,$content,$isbn,$pseudo);
            header("Location: index.php?action=memorise");        
        }
        /** Pour créer un admin au pseudo unique **/
        function creatUser($firstname,$pseudo,$mail,$pass){
            $userManager = new\Projet\Models\UserManager();
            $name= $userManager->verify_name($firstname, $pseudo);
    
            $result= $name->fetch();
            if($result['pseudo'] !== $pseudo){
                $user=$userManager->creatUser($firstname,$pseudo,$mail,$pass);
                header("Location: index.php?action=connexionUser");
            }else{
                echo "Le pseudo existe déjà";
            }
        }
        /** Pour la conexion utilisateur **/
        function connexionUser($pseudo,$pass){
            $userManager= new\Projet\Models\UserManager();
            $connexionUser = $userManager->recupMdp($pseudo,$pass);
            /** On stock le fetch dans une variable result **/
                $result = $connexionUser->fetch();
                $isPasswordCorrect = password_verify($pass, $result['password']);
            /** on passe ce que l'on récupère dans une session */
            $_SESSION['id']= $result['id'];
            $_SESSION['firstname']= $result['firstname'];
            $_SESSION['pseudo']= $result['pseudo'];
            $_SESSION['mail']= $result['mail'];
            $_SESSION['password']= $result['password'];
            /**si mais mots de passes son identiques on renvoi la vue sinon on affiche un message **/
            if($isPasswordCorrect){
                require 'app/views/Front/tdbUser.php';
            }
            else{
                echo "Les mots de passe ne sont pas identiques";
            }
        }
        function meconnceter(){
            require "app/views/Front/userConnecte.php";
        }
    
        /** Pour la récupération des informations utilisateurs **/
        // function mesInfos(){
        //     $mesInfos = new\Projet\Models\userManager();
        //     $getInfos = $mesInfos->getInfos();
            
        //     $memo = new\Projet\Models\MemoManager();
        //     $allMemos=$memo->getMemo($pseudo);
        //     header('Location: index.php?action=connexionUser');
        //     // require "app/views/front/infos.php";
        // }
        // function modifInfo($id){
        //     $mesInfos = new\Projet\Models\userManager();
        //     $getInfos = $mesInfos->getInfo();
        //     require "app/views/front/infos.php";
        // }
     
        
        // function mesMemos($pseudo){
        //     $memo = new\Projet\Models\MemoManager();
        //     $allMemos=$memo->getMemo($pseudo);
        //     require "app/views/Front/blogMemo.php";
        // }
        // function deleteMemo($id){
        //     $memo = new \Projet\Models\memoManager();
            
        //     $deleteMemo=$memo->deleteMemo($id);
        //     header("Location: index.php?action=modifMemos");
        // }    
        
        
        // function mesLivres($pseudo){
        //     $memo = new\Projet\Models\BookManager();
        //     $allMemos=$memo->getLivre($pseudo);
        //     require "app/views/Front/blogMemo.php";
    
        // }
    }