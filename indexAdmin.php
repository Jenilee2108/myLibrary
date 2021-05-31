<?php

require_once __DIR__ . '/vendor/autoload.php';



try{
     /** Appel de mon backcontroller **/
    $backController = new \Projet\Controllers\Back\BackController();

    if(isset($_GET['action'])) {
      /** Actions du Menu **/
        
        if($_GET['action'] == 'connexion') {
          $backController->connexion();
        }
        else if($_GET['action'] == 'test') {
          $idLivre =2;
          $idAuthor =2;
          $backController->test();
        }

        else if($_GET['action'] == 'inscription') {
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
          /* Je récupère mes données */
          $name_user = htmlspecialchars($_POST['name_user']);
          $pseudo = htmlspecialchars($_POST['pseudo']);
          $mail = htmlspecialchars($_POST['mail']);
          $password = htmlspecialchars($_POST['password']);
          /* On cripte le mdp */
          $pass = password_hash($password, PASSWORD_DEFAULT);
          /** On vérifie que tous les champs soient remplis **/
          if (!empty($pseudo) && !empty($pass) && !empty($name_user)) {
          $backController->createUser($pseudo, $name_user, $mail, $pass);
          }
          else{
              throw new Exception('Renseignez tous les champs');
          }      
        }
        /** Acition Page-connexion **/
        else if($_GET['action'] == 'meconnecter') {
        /** on récupère le mot de passe et le pseudo**/
          $pseudo = htmlspecialchars($_POST['pseudo']);
          $pass = htmlspecialchars($_POST['password']);
          var_dump($pseudo);
          var_dump($pass);
          
        /** On vérifie si tous les champs sont remplis **/
          if(!empty($pseudo) || !empty($pass)) {
              $backController->meconnecter($pseudo,$pass);
          }
          else{
              throw new Exception('Renseignez tous les champs');
          }
        }
        /** Actions Page-tdb **/
        else if($_GET['action'] == 'tdb') {
          // $pseudo = $_SESSION['user']['pseudo'];
          $backController->tdb($pseudo);
        }
        
        /** Page-infos **/
        else if($_GET['action'] == 'mesInfos') {
          $pseudo = $_GET['pseudo'];
          var_dump($pseudo);
          $backController->getInfos($pseudo);
        }
          /**Pour mettre à jour les informations utilisateurs */
        else if($_GET['action'] == 'updateInfo') {
          $pseudo = $_GET['pseudo'];
          // var_dump($pseudo);
          // $backController->getInfos($pseudo);
          $mail = htmlspecialchars($_POST['mail']);
          $password = htmlspecialchars($_POST['password']);
          /** on vérifie que l'adresse email est au bon format **/
          $mail = filter_var($mail, FILTER_VALIDATE_EMAIL);
            /* On cripte le mdp */
          $pass = password_hash($password, PASSWORD_DEFAULT);
          // var_dump($mail);
          // var_dump($pseudo);
          $backController->updateInfo($pseudo, $mail, $pass);
        }

        else if($_GET['action'] == 'deleteUser') {
          $pseudo = htmlspecialchars($_GET['pseudo']);
        $backController->deleteUser($pseudo);
        }

        /** Pour les livres associés à un auteur **/
        else if($_GET['action'] == 'deleteLivre') {
          $id = htmlspecialchars($_GET['id']);
          $backController->deleteEcritPar($id);
        }

        /** Pour les livres de la tables livres **/
        elseif ($_GET['action'] == 'newLivre') {
          $backController->newlivre();
        }
        else if($_GET['action'] == 'creatLivre') {
          $title = htmlspecialchars($_POST['title']);
          $category = htmlspecialchars($_POST['category']);
          $content = htmlspecialchars($_POST['content']);
          $backController->creatLivre($title,$category,$content);

        }

        
       
        







































        

      //   else if($_GET['action'] == 'creatAdmin') {
      //     $adminManager = new \Projet\Models\AdminManager();
      //    /** On vérifie si le pseudo est bien unique **/
      //           /* Je récupère mes données */
      //   $name = htmlspecialchars($_POST['name']);
      //   $pseudo = htmlspecialchars($_POST['pseudo']);
      //   $mail = htmlspecialchars($_POST['mail']);
      //   $password = htmlspecialchars($_POST['password']);
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
    //       $firstname = htmlspecialchars($_POST['firstname']);
    //       $pseudo = htmlspecialchars($_POST['pseudo']);
    //       $mail = htmlspecialchars($_POST['mail']);
    //       $password = htmlspecialchars($_POST['password']);
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
    //       $sujet = htmlspecialchars($_POST['sujet']);
    //       $content = htmlspecialchars($_POST['content']);
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
    //      $title = htmlspecialchars($_POST['title']);
    //      $author = htmlspecialchars($_POST['author']);
    //      $category = htmlspecialchars($_POST['category']);
    //      $resume = htmlspecialchars($_POST['resume']);
    //      $isbn = htmlspecialchars($_POST['isbn']);
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
    //       $content = htmlspecialchars($_POST['comContent']);
    //       $backController->updateLivre($livreId,$content);
    //     }
    //     else if($_GET['action'] == 'deleteLivre') {
    //       $livreId = htmlspecialchars($_GET['idLivre']);
    //     $backController->deleteUserLivre($livreId);
    //     }
    }
    else{
        /** s'il n'y a pas d'acoction on reste sur la page de connexion Admin **/
        $backController->connexion();
        // $backController->inscription();
    }
   
}
   /**On affiche l'erreur en cas de probleme **/
catch(Exception $e) {
    die('Erreur :'. $e->getMessage());
}