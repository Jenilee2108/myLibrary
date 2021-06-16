<?php

namespace Projet\Controllers\Back;
// session_start();

class BackController
{
    /**Fonction du menu **/
    /**Appel de la page d'inscription **/
    public function inscription()
    {
        require "app/Views/Front/page-inscription.php";
    }
    /**Appel de la page de connexion **/
    public function connexion()
    {
        require "app/Views/Front/page-inscription.php";
    }
    /** Pour la deconnexion **/
    public function deconnexion()
    {
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
    /** Pour la suggestion de livre **/
    public function suggestion($pseudo) {
        require "app/Views/Back/page-suggestion.php";
    }
    /** Pour retourner au tableau de bord via le menu **/
    public function tdb($pseudo)
    {
        /**Appel du model **/
        $userManager = new \Projet\Models\UserManager();
        /** appel de la fonction de récupération du des informations liées au pseudo **/
        $name = $userManager->recupMdp($pseudo);
        $result = $name->fetch();
        $pseudo = $result['pseudo'];
        $name_user = $result['name_user'];
        $mail = $result['mail'];
        /** On crée une session utilisateur **/
        $_SESSION["user"] = [
            'pseudo' => $pseudo,
            'name_user' => $name_user,
            'mail' => $mail
        ];
        /** Pour afficher les livres **/
        $livres = new \Projet\Models\AuthorLivresManager();
        $allLivres = $livres->getEcritpar();
        /** Pour afficher les commentaires **/
        $infos = new \Projet\Models\CommManager();
        $allComms = $infos->getMyComm($pseudo);
        require "app/Views/Back/page-tdb.php";
        
    }

    /** Page d'inscription **/
    /** Pour créer un utilisateur au pseudo unique **/
    public function createUser($pseudo, $name_user, $mail, $pass)
    {
        /** Appel du model **/
        $userManager = new \Projet\Models\UserManager();
        $_SESSION["error"] = [];
        /** Appel de la fonction de vérifiaction de l'unicité du pseudo **/
        $name = $userManager->verify_user($pseudo);
        $result = $name->fetch();        
        /** Création des erreurs à gérer **/
        if ($result['pseudo']) {
            $_SESSION["error"]["msg"] = "Le pseudonyme que vous avez choisi est déjà utilisé";
            require "app/Views/Back/page-erreur.php";
            die("Le pseudonyme que vous avez choisi est déjà utilisé");
        }
        /** Vérification que l'adresse email est au bon format **/
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"]["msg"] = "Merci d'entrer une adresse mail valide";
            require "app/Views/Back/page-erreur.php";
            die("Merci d'entrer une adresse mail valide");
        };
        if ($_SESSION["error"] == []) {
            /** Création de l'utilisateur en BDD **/
            $user = $userManager->createUser($pseudo, $name_user, $mail, $pass);
           
            /** Récupération des informations utilisateurs */
            $newUser = $userManager->recupMdp($pseudo);
            $user = $newUser->fetch();
            
            $_SESSION["user"] = [
                "pseudo" => $user['pseudo'],
                "mail" => $user['mail'],
                "name_user" => $user['name_user'],
                "pass" => $user['password']
            ];
            $pseudo = $user['pseudo'];
            $livres = new \Projet\Models\AuthorLivresManager();
            $allLivres = $livres->getEcritpar();
            // $infos = new \Projet\Models\CommManager();
            /** Pas encore de commentaires car 1ère connexion **/
            $allComms = [];
            
            header("Location: indexAdmin.php?action=tdb&pseudo=$pseudo");
        }
    }

    /* Page de connexion */
    public function meconnecter($pseudo, $pass)
    {
        /** Appel du model **/
        $userManager = new \Projet\Models\UserManager();
        /** Mise en place de la gestion des erreurs **/
        $_SESSION["error"] = [];
        /** Récupération des données associées au pseudo **/
        $user = $userManager->recupMdp($pseudo);
        $result = $user->fetch();
        /**Vérification de la présence de l'utilisateur **/
        if (!$result) {
            $_SESSION["error"]["msg"] = "l'utilisateur et/ou le mot de passe sont incorrectes";
            require_once "app/Views/Back/page-erreur.php";
            die;
        };
        /** Vérification de son mot de passe **/
        if (!password_verify($pass, $result['password'])) {
            $_SESSION["error"]["msg"] = "l'utilisateur et/ou le mot de passe sont incorrectes";
            require_once "app/Views/Back/page-erreur.php";
        };

        /** Connexion l'utilisateur, et stokage des informations de la session **/
        if ($_SESSION["error"] === []) {
            $pseudo = $result['pseudo'];
            $name_user = $result['name_user'];
            $mail = $result['mail'];
            /** On crée une session utilisateur **/
            $_SESSION["user"] = [
                'pseudo' => $pseudo,
                'name_user' => $name_user,
                'mail' => $mail
            ];
            /** Pour afficher des livres présents en BDD  **/
            $livres = new \Projet\Models\AuthorLivresManager();
            $allLivres = $livres->getEcritpar();
            
            /** Pour afficher des commentaires liés au pseudo présents en BDD  **/
            $infos = new \Projet\Models\CommManager();
            $allComms = $infos->getMyComm($pseudo);

            header("Location: indexAdmin.php?action=tdb&pseudo=$pseudo");
        }
    }
    /* Page TDB*/
    /** Pour récupérer les informations utilisateur **/
    public function getInfos($pseudo)
    {
        $userManager = new \Projet\Models\UserManager();
        $mesInfos = $userManager->getInfos($pseudo);
        $mesInfos = $mesInfos->fetch();
        $pseudo = $mesInfos['pseudo'];
        require "app/views/back/page-infos.php";
    }
    /** Pour mettre à jour les informations utilisateur **/
    public function updateInfo($pseudo, $mail, $pass)
    {
        $userManager = new \Projet\Models\UserManager();
        $user = $userManager->updateInfo($pseudo, $mail, $pass);
        header("Location: indexAdmin.php?action=tdb&pseudo=$pseudo");
    }
    /** Pour supprimer l'utilisateur **/
    public function deleteUser($pseudo)
    {
        $userManager = new \Projet\Models\UserManager();
        $user = $userManager->deleteUser($pseudo);
        header("Location: indexAdmin.php?action=inscription");
    }
/** Pour la gestion des commentaires **/
    /** Pour supprimer son commentaire **/
    public function deleteComm($idComm, $pseudo)
    {
        $CommManager = new \Projet\Models\CommManager();
        $Comm = $CommManager->deleteComm($idComm);
        header("Location: indexAdmin.php?action=tdb&pseudo=$pseudo");
    }
    /** Pour metre à jour un commentaire**/
    public function updateComm($idComm, $content, $note, $pseudo)
    {
        $CommManager = new \Projet\Models\CommManager();
        $Comm = $CommManager->updateComm($idComm, $content, $note);
        $idComm;
        header("Location: indexAdmin.php?action=tdb&pseudo=$pseudo");
    }
    /** Pour ajouter un commentaire **/
        /** Appel de la page de commentaires **/
    public function addComm($idLivre, $pseudo)
    {
        /** Appel des livres et des commentaires en BDD  **/
        $livreManager = new \Projet\Models\AuthorLivresManager();
        $livre = $livreManager->OneEcritpar($idLivre);
        $livre = $livre->fetch();       
        require "app/Views/Back/page-newComms.php";
    }
        /** ajout du commentaire en BDD **/
    public function creatComm($pseudo, $content, $note, $idLivre)
    {
        $userManager = new \Projet\Models\UserManager();
        $user = $userManager->getId($pseudo);
        $user = $user->fetch();
        $idUser = $user['id'];

        $CommManager = new \Projet\Models\CommManager();
        $idAuthorLivre = $idLivre;
        $newComm = $CommManager->creatComm($content, $note, $idUser, $idAuthorLivre);
        header("Location: indexAdmin.php?action=tdb&pseudo=$pseudo");
    }
}
