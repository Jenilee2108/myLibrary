<?php
namespace Projet\Models;
/** Pour la connection a la BDD **/
use PDOException;
use PDO;
use Dotenv\Repository\Adapter\EnvConstAdapter;

class Manager extends PDO {
    // instance unique de la classe
        private static $instance;

    // Le constructeur
    private function __construct() {
        //DSN de connexion

        $_dsn = "mysql:dbname=".$_ENV['DBNAME'].";host=".$_ENV['DBHOST'];
        try {
            parent::__construct($_dsn, $_ENV['DBUSER'], $_ENV['DBPASS']);
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
            //on défini le mode de fetch par défaut
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            //pour le mode de transfert d'erreur pour déclencher une exception
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }
        catch (PDOException $e) {
            echo 'Erreur Connexion: ' .$e->getMessage();
            // die($e->getMessage());
        }
    }
    
    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
};
