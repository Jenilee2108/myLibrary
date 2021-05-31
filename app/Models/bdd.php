<?php
namespace Projet\Models;

/** Pour la connection a la BDD **/


use PDOException;
use PDO;

class Bdd extends PDO {
    //On instance unique de la class
        private static $instance;
    //constante d'environnement
        private const DBHOST = "localhost";
        private const DBUSER = "root";
        private const DBPASS = "";
        private const DBNAME = "mylibrary";
    // Le constructeur
    private function __construct() {
        //DSN de connexion
        $_dsn = "mysql:dbname=" . self::DBNAME . ";host=" . self::DBHOST;

        //On appelle le constructeur de la bdd
        try {
            parent::__construct($_dsn, self::DBUSER, self::DBPASS);
            //on s'assure d'envoyer les données en utf 8
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
            //on défini le mode de fetch par défaut
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            //pour le mode de transfert d'erreur pour déclencher une exception
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    //Methode pour obtenir l'instance qui va soit la crée soit la retourner si elle existe déjà
    //on vrifie si l'intane est nulle, si oui on fait un self pour dire que c'est un new bdd
    // on retourne toujours l'instance elle meme
    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

};