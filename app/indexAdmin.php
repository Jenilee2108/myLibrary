<?php

require_once __DIR__ . '/vendor/autoload.php';

use Projet\Controllers\Back\backController;


try {
  /** Appel de mon backcontroller **/
  $backController = new Projet\Controllers\Back\backController();

  if (isset($_GET['action'])) {
    /** Actions du Menu **/

    if ($_GET['action'] == 'connexion') {
      $backController->connexion();
    } 
    else if ($_GET['action'] == 'inscription') {
      $backController->inscription();
    }
    /** Pour la déconnexion **/
    else if ($_GET['action'] == 'deconnexion') {
      session_unset();
      session_destroy();
      header("Location: indexAdmin.php?action=connexion");
    }

    /** Action page-inscription **/
    else if ($_GET['action'] == 'createUser') {
      /** On récupère les données etneutralise toutes balises du contenu **/
      $name_user = strip_tags($_POST['name_user']);
      $pseudo = strip_tags($_POST['pseudo']);
      $mail = strip_tags($_POST['mail']);
      $password = strip_tags($_POST['password']);
      /** on crée les messages d'erreur de session, on initialise à vide **/
      $_SESSION["error"] = [];

      /**on vérifie que l'on a bien une adresse mail **/
      if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"][] = "L'adresse e-mail est incorrecte";
        //die("merci de remplir avec une adresse e-mail");
      }
      /** on vérifie que le mot de passe est d'au moins 5 caractères **/
      if (strlen($password) < 5) {
        $_SESSION["error"][] = "Le pseudo est trop court";
        //die("Le pseudo est trop court");
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

    /** Acition Page-connexion **/
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
    else if ($_GET['action'] == 'tdb') {
        $pseudo = $_SESSION['user']['pseudo'];
      $backController->tdb($pseudo);
    }



    /** Page-infos **/
    else if ($_GET['action'] == 'mesInfos') {
      $pseudo = $_SESSION['user']['pseudo'];
      $backController->getInfos($pseudo);
    }
    else if ($_GET['action'] == 'updateInfo') {
      $pseudo = $_SESSION['user']['pseudo'];
      $backController->getInfos($pseudo);
      $mail = strip_tags($_POST['mail']);
      $password = strip_tags($_POST['password']);
      /** on vérifie que l'adresse email est au bon format **/
      $mail = filter_var($mail, FILTER_VALIDATE_EMAIL);
      /* On cripte le mdp */
      $pass = password_hash($password, PASSWORD_DEFAULT);

      $backController->updateInfo($pseudo, $mail, $pass);
    } else if ($_GET['action'] == 'deleteUser') {
      $pseudo = htmlspecialchars($_GET['pseudo']);
      $backController->deleteUser($pseudo);
    }

    /** Pour les livres associés à un auteur **/
    else if ($_GET['action'] == 'deleteLivre') {
      $id = htmlspecialchars($_GET['id']);
      $backController->deleteEcritPar($id);
    }

    /** Pour les livres de la tables livres **/
    elseif ($_GET['action'] == 'newLivre') {
      $backController->newlivre();
    } else if ($_GET['action'] == 'creatLivre') {
      $title = strip_tags($_POST['title']);
      $category = strip_tags($_POST['category']);
      $content = strip_tags($_POST['content']);
      $backController->creatLivre($title, $category, $content);
    }













































    //   else if($_GET['action'] == 'creatAdmin') {
    //     $adminManager = new \Projet\Models\AdminManager();
    //    /** On vérifie si le pseudo est bien unique **/
    //           /* Je récupère mes données */
    //   $name = strip_tags($_POST['name']);
    //   $pseudo = strip_tags($_POST['pseudo']);
    //   $mail = strip_tags($_POST['mail']);
    //   $password = strip_tags($_POST['password']);
    //     /** on vérifie que l'adresse email est au bon format **/
    //   $mail = filter_var($mail, FILTER_VALIDATE_EMAIL);

    //     /* On cripte le mdp */
    //   $pass = password_hash($password, PASSWORD_DEFAULT);

    //   if(!empty($pseudo) && !empty($pass) && !empty($name_user)) {
    //     $backController->creatAdmin($pseudo,$name,$mail,$pass);
    //   }
    //   else{
    //       throw new Exception('Renseignez tous les champs');
    //   }
    // }
















    //     /** Pour l'espace de gestion **/
    //     else if ($_GET['action'] == 'gestionAdmin') {
    //         $backController->tbdAdmin();
    //     }    


    //         /**Page connexionAdmin **/
    //     /** quand j'envoi le formulaire */
    //     else if ($_GET['action'] == 'creatAdmin') {
    //       /* Je récupère mes données */
    //       $firstname = strip_tags($_POST['firstname']);
    //       $pseudo = strip_tags($_POST['pseudo']);
    //       $mail = strip_tags($_POST['mail']);
    //       $password = strip_tags($_POST['password']);
    //         /** on vérifie que l'adresse email est au bon format **/
    //       $mail = filter_var($mail, FILTER_VALIDATE_EMAIL);

    //         /* On cripte le mdp */
    //       $pass = password_hash($password, PASSWORD_DEFAULT);

    //       if(!empty($pseudo) && !empty($pass) && !empty($firstname)) {
    //         $backController->creatAdmin($firstname,$pseudo,$mail,$pass);
    //       }
    //       else{
    //           throw new Exception('Renseignez tous les champs');
    //       }

    //     }


    //     /** Page gestionAdmin.php en ce qui concerne les memos **/
    //     else if($_GET['action'] == 'mesMemos') {
    //       $pseudo = $_SESSION['user']['pseudo'];
    //     $backController->mesMemos($pseudo);
    //     }
    //     /** page blogMemoAdmin.php **/
    //     else if($_GET['action'] == 'modifMemo') {
    //       $id = htmlspecialchars($_GET['id']);
    //     $backController->modifMemo($id);
    //     }
    //     /** page memo.php **/
    //     else if($_GET['action'] == 'updateMemo') {
    //       $id = htmlspecialchars($_GET['id']);
    //       $sujet = strip_tags($_POST['sujet']);
    //       $content = strip_tags($_POST['content']);
    //       $backController->updateMemo($id,$sujet,$content);
    //     }
    //     else if($_GET['action'] == 'deleteMemo') {
    //       $id = htmlspecialchars($_GET['id']);
    //     $backController->deleteMemo($id);
    //     }

    /** Pour la gestion des livres **/

    //     /** Page creer livre **/
    //     // else if($_GET['action'] == 'newLivre') {
    //     //   $backController->newLivre();
    //     // }
    //     else if($_GET['action'] == 'creatLivre') {
    //      $title = strip_tags($_POST['title']);
    //      $author = strip_tags($_POST['author']);
    //      $category = strip_tags($_POST['category']);
    //      $resume = strip_tags($_POST['resume']);
    //      $isbn = strip_tags($_POST['isbn']);
    //       $backController->creatLivre($title,$author,$category,$resume,$isbn);
    //     }




    //     /** Page gestionAdmin.php en ce qui concerne les livres **/
    //     else if($_GET['action'] == 'mesLivres') {
    //       $pseudo = $_SESSION['user']['pseudo'];
    //     $backController->mesLivres($pseudo);
    //     }
    //     /** page blogLivresAdmin.php **/
    //     else if($_GET['action'] == 'monLivre') {
    //       $livreId = htmlspecialchars($_GET['id']);
    //     $backController->modifLivre($livreId);
    //     }
    //     /** page livre.php **/
    //     else if($_GET['action'] == 'updateLivre') {
    //       $livreId = htmlspecialchars($_GET['id']);
    //       $content = strip_tags($_POST['comContent']);
    //       $backController->updateLivre($livreId,$content);
    //     }
    //     else if($_GET['action'] == 'deleteLivre') {
    //       $livreId = htmlspecialchars($_GET['idLivre']);
    //     $backController->deleteUserLivre($livreId);
    //     }
  } else {
    /** s'il n'y a pas d'acoction on reste sur la page de connexion Admin **/
    $backController->connexion();
    // $backController->inscription();
  }
}
/**On affiche l'erreur en cas de probleme **/
catch (Exception $e) {
  die('Erreur :' . $e->getMessage());
}
