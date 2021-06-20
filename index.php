<?php
require_once __DIR__ . '/vendor/autoload.php';
@session_start();

try {
    /**  appel de mon controller front **/
    $frontController = new Projet\Controllers\Front\frontController();

    if (isset($_GET['action'])) {
        /** Les actions du menu 
         * Pour aller à la page d'accueil**/
        if ($_GET['action'] == 'accueil') {
            $frontController->accueil();
        }
        /** Pour aller a la bibliothèque**/
        else if ($_GET['action'] == 'library') {
            $frontController->library();
        }
        /** Pour aller à mon compte **/
        else if ($_GET['action'] == 'moncompte') {
            $frontController->moncompte();
        }
        /** Pour aller à contact **/
        else if ($_GET['action'] == 'contact') {
            // $token = self::CHAT_TOKEN;
            $frontController->mecontacter();
        }
        /** Pour la barre de recherche **/
        else if ($_GET['action'] == 'search') {
            $recherche = $_POST['q'];
            $frontController->recherche($recherche);
        }

        /** Les actions de la page mon compte **/
        else if ($_GET['action'] == 'inscription') {
            $frontController->inscription();
        }


        /** Les actions de la page library **/
        /** Pour afficher un livre **/
        else if ($_GET['action'] == 'livre') {
            $idLivre = htmlspecialchars($_GET['id']);
            $frontController->livre($idLivre);
        }


        /** Pour aller aux Conditions générales **/
        else if ($_GET['action'] == 'CGU') {
            $frontController->cgu();
        }
        

    } else {
        /** s'il n'y a pas d'action sur la page d'accueil **/
        if(isset($_GET['accepte-cookie'])) {
            setcookie('accepte-cookie', 'true', time()+365*24*3600);
        }
        $frontController->accueil();
    }
}
/** *On affiche l'erreur en cas de probleme **/
catch (Exception $e) {
    $_SESSION['error']['msg'] = "Oups page introuvable";
    echo "Oups page introuvable";
    die('Erreur :' . $e->getMessage());
}
catch(Error $e) {
    $_SESSION['error']['msg'] = "Un problème est survenu veuillez réessaye plus tard";
    // die('Erreur :' . $e->getMessage());
    $erreur ='Un problème est survenu veuillez réessayer plus tard Erreurs :' . $e->getMessage();
    require "app/views/Front/page-erreur";
}