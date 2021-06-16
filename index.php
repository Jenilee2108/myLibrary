<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

try {
    /**  appel de mon controller front **/
    $frontController = new Projet\Controllers\Front\FrontController;

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
        /** Pour aller à mon compte */
        else if ($_GET['action'] == 'moncompte') {
            $frontController->moncompte();
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
    echo "Un problème est survenu veuillez réessaye plus tard";
    die('Erreur :' . $e->getMessage());
}