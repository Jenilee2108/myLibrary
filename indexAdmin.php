<?php

require_once __DIR__ . '/vendor/autoload.php';
use Projet\Controllers\Back\backController;


try{
     /** Appel de mon backcontroller **/
    $backController = new Projet\Controllers\Back\backController();

    if(isset($_GET['action'])){

        /** Si j'appuie sur me connecter**/
        if($_GET['action'] == 'connexion') {
          $backController->connexion();
        }

        elseif($_GET['action'] == 'inscription') {
            $backController->inscription();
        }
        elseif($_GET['action'] == 'tdb'){
           
            $backController->tdb($idLivre);
         }

        else if($_GET['action'] == 'creatAdmin') {
            $adminManager = new \Projet\Models\AdminManager();
           /** On vérifie si le pseudo est bien unique **/
                  /* Je récupère mes données */
          $name = htmlspecialchars($_POST['name']);
          $pseudo = htmlspecialchars($_POST['pseudo']);
          $mail = htmlspecialchars($_POST['mail']);
          $password = htmlspecialchars($_POST['password']);
            /** on vérifie que l'adresse email est au bon format **/
          $mail = filter_var($mail, FILTER_VALIDATE_EMAIL);

            /* On cripte le mdp */
          $pass = password_hash($password, PASSWORD_DEFAULT);

          if(!empty($pseudo) && !empty($pass) && !empty($firstname)){
            $backController->creatAdmin($pseudo,$name,$mail,$pass);
          }
          else{
              throw new Exception('Renseignez tous les champs');
          }
        }
        elseif($_GET['action'] == 'meconnecter'){
        /** on récupère le mot de passe et le pseudo**/
          $pseudo = htmlspecialchars($_POST['pseudo']);
          $pass = htmlspecialchars($_POST['password']);
        /** On vérifie si tous les champs sont remplis **/
          if(!empty($pseudo) && !empty($pass)){
              $backController->meconnecter($pseudo,$pass);
          }
          else{
              throw new Exception('Renseignez tous les champs');
          }
        }
        /** Pour la déconnexion **/
        elseif ($_GET['action'] == 'deconnexion'){
          session_unset();
          session_destroy();
          header("Location: indexAdmin.php?action=meconnecter");
      }
    //     /** Pour l'espace de gestion **/
    //     elseif ($_GET['action'] == 'gestionAdmin'){
    //         $backController->tbdAdmin();
    //     }    

    //         /**Page connexionAdmin **/
    //     /** quand j'envoi le formulaire */
    //     elseif ($_GET['action'] == 'creatAdmin'){
    //       /* Je récupère mes données */
    //       $firstname = htmlspecialchars($_POST['firstname']);
    //       $pseudo = htmlspecialchars($_POST['pseudo']);
    //       $mail = htmlspecialchars($_POST['mail']);
    //       $password = htmlspecialchars($_POST['password']);
    //         /** on vérifie que l'adresse email est au bon format **/
    //       $mail = filter_var($mail, FILTER_VALIDATE_EMAIL);

    //         /* On cripte le mdp */
    //       $pass = password_hash($password, PASSWORD_DEFAULT);

    //       if(!empty($pseudo) && !empty($pass) && !empty($firstname)){
    //         $backController->creatAdmin($firstname,$pseudo,$mail,$pass);
    //       }
    //       else{
    //           throw new Exception('Renseignez tous les champs');
    //       }
        
    //     }
      
    //     /** Page gestionAdmin.php en ce qui concerne les memos **/
    //     elseif($_GET['action'] == 'mesMemos'){
    //       $pseudo = $_SESSION['pseudo'];
    //     $backController->mesMemos($pseudo);
    //     }
    //     /** page blogMemoAdmin.php **/
    //     elseif($_GET['action'] == 'modifMemo'){
    //       $id = htmlspecialchars($_GET['id']);
    //     $backController->modifMemo($id);
    //     }
    //     /** page memo.php **/
    //     elseif($_GET['action'] == 'updateMemo'){
    //       $id = htmlspecialchars($_GET['id']);
    //       $sujet = htmlspecialchars($_POST['sujet']);
    //       $content = htmlspecialchars($_POST['content']);
    //       $backController->updateMemo($id,$sujet,$content);
    //     }
    //     elseif($_GET['action'] == 'deleteMemo'){
    //       $id = htmlspecialchars($_GET['id']);
    //     $backController->deleteMemo($id);
    //     }

            /** Pour la gestion des livres **/

    //     /** Page creer livre **/
    //     // elseif($_GET['action'] == 'newLivre'){
    //     //   $backController->newLivre();
    //     // }
    //     elseif($_GET['action'] == 'creatLivre'){
    //      $title = htmlspecialchars($_POST['title']);
    //      $author = htmlspecialchars($_POST['author']);
    //      $category = htmlspecialchars($_POST['category']);
    //      $resume = htmlspecialchars($_POST['resume']);
    //      $isbn = htmlspecialchars($_POST['isbn']);
    //       $backController->creatLivre($title,$author,$category,$resume,$isbn);
    //     }




    //     /** Page gestionAdmin.php en ce qui concerne les livres **/
    //     elseif($_GET['action'] == 'mesLivres'){
    //       $pseudo = $_SESSION['pseudo'];
    //     $backController->mesLivres($pseudo);
    //     }
    //     /** page blogLivresAdmin.php **/
    //     elseif($_GET['action'] == 'monLivre'){
    //       $livreId = htmlspecialchars($_GET['id']);
    //     $backController->modifLivre($livreId);
    //     }
    //     /** page livre.php **/
    //     elseif($_GET['action'] == 'updateLivre'){
    //       $livreId = htmlspecialchars($_GET['id']);
    //       $content = htmlspecialchars($_POST['comContent']);
    //       $backController->updateLivre($livreId,$content);
    //     }
    //     elseif($_GET['action'] == 'deleteLivre'){
    //       $livreId = htmlspecialchars($_GET['idLivre']);
    //     $backController->deleteUserLivre($livreId);
    //     }
    }
    else{
        /** s'il n'y a pas d'acoction on reste sur la page de connexion Admin **/
        // $backController->meconnecter();
        // $backController->inscription();
        $idLivre = 1;
        $idAuthor = 2;
        $backController->test($idLivre, $idAuthor);
    }
   
}
   /**On affiche l'erreur en cas de probleme **/
catch(Exception $e){
    die('Erreur :'. $e->getMessage());
}