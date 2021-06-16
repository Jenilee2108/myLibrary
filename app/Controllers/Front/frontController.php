<?php

namespace Projet\Controllers\Front;

class FrontController
{
        /**Actions de la page d'accueil **/
    /** afficher la page d'accueil **/
    public  function accueil()
    {
        require "app/Views/Front/page-accueil.php";
    }
    /** afficher la page de connexion/inscritpion **/
    public  function inscription()
    {
        require "app/Views/Front/page-inscription.php";
    }
    /**afficher la page de CGU **/
    public  function cgu()
    {
        require "app/Views/Front/page-CGU.php";
    }

        /** Actions du menu **/    
    /** afficher la page des derniers livres ajoutés **/
    public  function library()
    {
        /** Appel du model **/
        $livres = new \Projet\Models\AuthorLivresManager();
        /** Fonction pour récupérer les 6 derniers livres associés à leur auteurs ajouter en bdd **/
        $allLivres = $livres->getEcritpar();
        /** Fonction opur récupérer 5 auteurs ajoutés en BDD **/
        $authors = $livres->getAuthors();
        /**Appel du model **/
        $livreManager = new \Projet\Models\LivreManager();
        /** Fonction pour afficher les 6 derniers types de catégories de livres en BDD **/
        $categories = $livreManager->getCategory();
    
        require "app/Views/Front/page-library.php";
    }    
    /** afficher la page de connexion **/
    public  function moncompte()
    {
        require "app/Views/Front/page-inscription.php";
    }
    /** utiliser la barre de recherche **/
    public  function recherche($recherche) {
        /** Initialisation des erreurs **/
        $_SESSION["error"] = [];
        if(strlen($recherche) < 3) {
            $_SESSION["error"]["message"] = "Votre recherche doit contenir au moins 3 caractère";
            //die("Le pseudo est trop court");
        }
        /** Appel du model **/
        $livres = new \Projet\Models\AuthorLivresManager();
        $searches = $livres->recherche($recherche);
        require "app/Views/Front/page-resultat.php";

    }
    /** afficher UN livre dont l'id est celui du livre selectionné **/
    public  function livre($idLivre)
    {
        /** Appel du model **/
        $livres = new \Projet\Models\AuthorLivresManager();
        /** Fonction pour récupérer le livre via son id **/
        $monLivre = $livres->OneEcritpar($idLivre);
        require "app/Views/Front/page-livre.php";
    }
   
}
