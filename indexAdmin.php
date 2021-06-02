<?php

require_once __DIR__ . '/vendor/autoload.php';



try{
     /** Appel du backcontroller **/
    $backController = new \Projet\Controllers\Back\BackController();

    if(isset($_GET['action'])) {
      /** Actions du Menu **/
        /** Pour la connexion **/
        if($_GET['action'] == 'connexion') {
          $backController->connexion();
        }
        // else if($_GET['action'] == 'test') {
        //   $idLivre =2;
        //   $idAuthor =2;
        //   $backController->test();
        // }
        /** Pour l'inscription **/
        else if($_GET['action'] == 'inscription') {
            $backController->inscription();
        }
        /** Pour le retour au tdb **/
        else if($_GET['action'] == 'tdb') {
          /** On récupère le pseudo  **/
             $pseudo = htmlspecialchars($_GET['pseudo']);
             var_dump($pseudo);
             $backController->tdb($pseudo);
           }
        /** Pour la déconnexion **/
        else if ($_GET['action'] == 'deconnexion') {
         $backController->deconnexion();
        }

      /** Action page-inscription **/
        else if ($_GET['action'] == 'createUser') {
          /* On récupère les données */
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

      /** Action Page-connexion **/
        else if($_GET['action'] == 'meconnecter') {
        /** on récupère le mot de passe et le pseudo**/
          $pseudo = htmlspecialchars($_POST['pseudo']);
          $pass = htmlspecialchars($_POST['password']);
          // var_dump($pseudo);
          // var_dump($pass);
        /** On vérifie si tous les champs sont remplis **/
          if(!empty($pseudo) || !empty($pass)) {
              $backController->meconnecter($pseudo,$pass);
          }
          else{
              throw new Exception('Renseignez tous les champs');
          }
        }
      /** Actions Page-tdb **/ 
      /** Pour gérer l'utilisateur **/
        /** Appel Page-infos **/
        else if($_GET['action'] == 'mesInfos') {
          $pseudo = htmlspecialchars($_GET['pseudo']);
          // var_dump($pseudo);    
          $backController->getInfos($pseudo);
        }
        /**Pour mettre à jour les informations utilisateurs */
        else if($_GET['action'] == 'updateInfo') {
          $pseudo = htmlspecialchars($_GET['pseudo']);
          // var_dump($pseudo);
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
        /** Pour la suppression utilisateur **/
        else if($_GET['action'] == 'deleteUser') {
          $pseudo = htmlspecialchars($_GET['pseudo']);
        $backController->deleteUser($pseudo);
        }
    /** Pour la gestion des commentaires **/

 // else if($_GET['action'] == 'mesMemos') {
        //   $pseudo = $_SESSION['user']['pseudo'];
        // $backController->mesMemos($pseudo);
        // }
        // /** page blogMemoAdmin.php **/
        // else if($_GET['action'] == 'modifMemo') {
        //   $id = htmlspecialchars($_GET['id']);
        // $backController->modifMemo($id);
        // }
        // /** page memo.php **/
        // else if($_GET['action'] == 'updateMemo') {
        //   $id = htmlspecialchars($_GET['id']);
        //   $sujet = htmlspecialchars($_POST['sujet']);
        //   $content = htmlspecialchars($_POST['content']);
        //   $backController->updateMemo($id,$sujet,$content);
        // }
        // else if($_GET['action'] == 'deleteMemo') {
        //   $id = htmlspecialchars($_GET['id']);
        // $backController->deleteMemo($id);
        // }








    /** Pour la gestion de la partie livre **/
        /** Pour les livres associés à un auteur **/
        else if($_GET['action'] == 'deleteLivre') {
          $idLivre = htmlspecialchars($_GET['id']);
          $backController->deleteEcritPar($idLivre);
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
      //     $adminManager = new \ProOnt\Models\AdminManager();
      //    /** On vérifie si le pseudo est bien unique **/
      //           /* On récupère les données */
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
    //       /* On récupère les données */
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
        /** s'il n'y a pas d'action on reste sur la page de connexion**/
        $backController->connexion();
        // $backController->inscription();
    }
   
}
   /**On affiche l'erreur en cas de probleme **/
catch(Exception $e) {
    die('Erreur :'. $e->getMessage());
}