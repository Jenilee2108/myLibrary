<?php
require_once __DIR__ . '/vendor/autoload.php';
use Dotenv\Repository\Adapter\EnvConstAdapter;
@session_start();
$pseudo = $_SESSION['user']['pseudo'];
var_dump($_SESSION);

try {
  /** Appel du backcontroller **/
  $backController = new Projet\Controllers\Back\backController();

  if (isset($_GET['action'])) {
    /** Actions du Menu **/
    /** Pour la connexion **/
    if ($_GET['action'] == 'connexion') {
      $backController->connexion();
    }
    /** Pour l'inscription **/
    else if ($_GET['action'] == 'inscription') {
      $backController->inscription();
    }
    /** Pour la suggestion de livre **/
    else if ($_GET['action'] == 'suggestion') {
      $backController->suggestion($pseudo);
    }
    /** Pour le retour au tdb **/
    else if ($_GET['action'] == 'tdb') {
      /*On vérifie si il y a un utilisateur*/
      if (!isset($_SESSION["user"])) {
        $backController->connexion();
        exit;
      }
      /** On utilise le pseudo de la session**/      
      $backController->tdb($pseudo);
    }
    /** Pour la déconnexion **/
    else if ($_GET['action'] == 'deconnexion') {
      $backController->deconnexion();
    }

    /** Action page-inscription **/
    /** Pour la création d'un utilisateur **/
    else if ($_GET['action'] == 'createUser') {
      /* On récupère les données */
      $name_user = strip_tags($_POST['name_user']);
      $pseudo = strip_tags($_POST['pseudo']);
      $mail = strip_tags($_POST['mail']);
      $password = strip_tags($_POST['password']);
      /**on vérifie que l'on a bien une adresse mail **/
      if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"]["msg"] = "L'adresse e-mail est incorrecte";
        throw new Exception("merci de remplir avec une adresse e-mail");
      }
      /** on vérifie que le mot de passe est d'au moins 5 caractères **/
      if (strlen($password) < 5) {
        $_SESSION["error"]["msg"] = "Le pseudo est trop court";
        throw new Exception("Le pseudo est trop court");
      }
      /* On cripte le mdp */
      $pass = password_hash($password, PASSWORD_DEFAULT);
      /** On vérifie que tous les champs soient remplis **/
      if (!empty($pseudo) && !empty($pass) && !empty($name_user)) {
        $backController->createUser($pseudo, $name_user, $mail, $pass);
      } else {
        throw new Exception('Renseignez tous les champs');
      }
    }

    /** Action Page-connexion **/
    /** Pour se connecter **/
    else if ($_GET['action'] == 'meconnecter') {
      /** on récupère le mot de passe et le pseudo**/
      $pseudo = strip_tags($_POST['pseudo']);
      $pass = strip_tags($_POST['password']);
      /** On vérifie si tous les champs sont remplis **/
      if (!empty($pseudo) || !empty($pass)) {
        $backController->meconnecter($pseudo, $pass);
      } else {
        throw new Exception('Renseignez tous les champs');
      }
    }

    /** Actions Page-tdb **/
    /** Pour gérer l'utilisateur **/
    else if ($_GET['action'] == 'mesInfos') {
      
      $backController->getInfos($pseudo);
    }
    /**Pour mettre à jour les informations utilisateurs */
    else if ($_GET['action'] == 'updateInfo') {
      
      $mail = strip_tags($_POST['mail']);
      $password = strip_tags($_POST['password']);
      /** on vérifie que l'adresse email est au bon format **/
      $mail = filter_var($mail, FILTER_VALIDATE_EMAIL);
      /* On cripte le mdp */
      $pass = password_hash($password, PASSWORD_DEFAULT);
      $backController->updateInfo($pseudo, $mail, $pass);
    }
    /** Pour supprimer un utilisateur **/
    else if ($_GET['action'] == 'deleteUser') {
      
      $backController->deleteUser($pseudo);
    }
    /** Pour la gestion des commentaires **/
    /** pour supprimer un commentaire **/
    else if ($_GET['action'] == 'deleteComm') {
      $idComm = strip_tags($_GET['id']);
      $backController->deleteComm($idComm, $pseudo);
    }
    
    /** Pour mettre à jour un commentaire en bdd **/
    else if($_GET['action'] == 'updateComm') {
      $idComm = strip_tags($_GET['idComm']);
      $content = strip_tags($_POST['content']);
      $note = strip_tags($_POST['note']);
      
      $backController->updateComm($idComm, $content, $note, $pseudo);
    }
    /** Ajouter un commentaire
     * 
     * Pour afficher la page de changement
    **/
    else if ($_GET['action'] == 'addComm') {
      $idLivre = strip_tags($_GET['livre']);
      $backController->addComm($idLivre,$pseudo);
    }
    else if($_GET['action'] == 'commenter') {
      $idLivre = $_GET['idLivre'];
      $content = strip_tags($_POST['content']);
      $note = strip_tags($_POST['note']);
      
      $backController->creatComm($pseudo, $content, $note, $idLivre);
    }
   
  } else {
    /** s'il n'y a pas d'action on reste sur la page de connexion**/
    $backController->connexion();
  }
}
/**On affiche l'erreur en cas de probleme **/
catch (Exception $e) {  
  $_SESSION['error']['msg'] = "Oups page introuvable";
  require "app/views/Back/page-erreur";
  echo "Oups page introuvable";
  die('Erreur :' . $e->getMessage());
}
catch (Error $e) {
  $_SESSION['error']['msg'] = "Un problème est survenu". $e->getMessage()." veuillez réessaye plus tard";
  // die('Erreur :' . $e->getMessage());
  $erreur ='Un problème est survenu veuillez réessayer plus tard Erreurs :' . $e->getMessage();
  require "app/views/Front/page-erreur";
}
