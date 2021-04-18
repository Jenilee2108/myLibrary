<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

try{
    /* appel de mon controller front */
    $frontController = new Projet\Controllers\Front\frontController();

    if(isset($_GET['action'])) {
        /** Les actions de la templates **/
        if($_GET['action'] == 'accueil') {
            $frontController->accueil();        
        }
        else if($_GET['action'] == 'library') {
            $frontController->library();        
        }
		else if($_GET['action'] == 'moncompte') {
            $frontController->moncompte();        
        }
		else if($_GET['action'] == 'CGU') {
            $frontController->cgu();        
        }
        /** Les pages de gestions des erreurs **/
        else if($_GET['action'] == '404') {
            
        }
        else if($_GET['action'] == '500') {

        }
        else if($_GET['action'] == '404') {

        }

		/** Les actions de la page d'accueil **/
		else if($_GET['action'] == 'inscription') {
			$frontController->inscription();
		}

		/** Les actions de la page library **/
		else if($_GET['action'] == 'livre'){
			$frontController->livre();
		}

        /** Les actions de la page livre **/










        // else if($_GET['action'] == 'memorise') {
        //     $frontController->memorise();
        // }
        // elseif($_GET['action'] == 'creatMemo') {
        // /** Je définie les données à envoyer **/
        //     $title = htmlspecialchars($_POST['title']);
        //     $author = htmlspecialchars($_POST['author']);
        //     $sujet = htmlspecialchars($_POST['sujet']);
        //     $content = htmlspecialchars($_POST['content']);
        //     $isbn = htmlspecialchars($_POST['isbn']);
        //     $pseudo = htmlspecialchars($_POST['user_pseudo']);
        //     $frontController->creatMemo($title,$author,$sujet,$content,$isbn,$pseudo);
        // }


        // /** pour créer un user en vérifiant que le Pseudo n'existe pas déjà **/
        // elseif($_GET['action']== 'creatUser') {
        //     $firstname = htmlspecialchars($_POST['firstname']);
        //     $pseudo = htmlspecialchars($_POST['pseudo']);
        //     $mail =htmlspecialchars($_POST['mail']);
        //     $password = htmlspecialchars($_POST['password']);
        //     $pass=password_hash($password, PASSWORD_DEFAULT);

        //     $frontController->creatUser($firstname,$pseudo,$mail,$pass);            
        // }
        // elseif($_GET['action']=='connexionUser') {
        //     /** Je récupère les données de connexion **/
        //     $pseudo =htmlspecialchars($_POST['pseudo']);
        //     $pass =htmlspecialchars($_POST['password']);
        //     /** on vérifie que tous les champs sont remplis **/
        //     if(!empty($pseudo) && !empty($pass)) {
        //         $frontController->connexionUser($pseudo,$pass);
        //     }
        //     else{
        //         throw new Exception("Merci de renseignez tous les champs!");
        //     }
        // }
        // elseif($_GET['action']=='meconnceter') {
        //    $frontController->meconnceter();
        // }

        // /////////////////////////////////////// CREER LES ACTION INFOS LIVRES MEMOS DE LA PAGE TDBUSER//////////////////////////////////////
 

        // ///////////////// Pour les memos d'un user
        // elseif($_GET['action'] == 'modifMemos') {    
        //     $pseudo = $_SESSION['pseudo'];
        //     $frontController->mesMemos($pseudo);
        // }
        // elseif($_GET['action'] == 'deleteMemo') {    
        //     $id=$_GET['id'];
        //     $frontController->deleteMemo($id);
        // }
        // elseif($_GET['action'] == 'livres') {    
        //     $pseudo = $_SESSION['pseudo'];
        //     $frontController->mesLivres($pseudo);
        // }
        // elseif($_GET['action'] == 'deleteLivre') {    
        //     $id = $_GET['id'];
        //     $frontController->mesLivres($id);
        // }
    }
    else{
        /** s'il n'y a pas d'action sur la page d'accueil **/
        $frontController->accueil();
    }
}
 /**On affiche l'erreur en cas de probleme **/
catch(Exception $e) {
    die('Erreur :'. $e->getMessage());
}

