<?php
namespace Projet\Models;
/** Pour la connection a la BDD **/
use PDOException;
use PDO;

class Manager extends PDO {
    
    //constante d'environnement
   private const CLEARDB_DATABASE_URL = $_ENV['CLEARDB_DATABASE_URL'];
    private const DBHOST = $_ENV['DBHOST'];
    private const DBUSER = $_ENV['DBUSER'];
    private const DBPASS = $_ENV['DBPASS'];
    private const DBNAME = $_ENV['DBNAME'];
    // instance unique de la classe
        private static $instance;

    // Le constructeur
    private function __construct() {
        //DSN de connexion
        $_dsn = self::CLEARDB_DATABASE_URL;
        try {
            parent::__construct($_dsn, self::DBUSER, self::DBPASS);
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
            //on défini le mode de fetch par défaut
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            //pour le mode de transfert d'erreur pour déclencher une exception
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
};
