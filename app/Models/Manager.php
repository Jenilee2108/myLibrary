<?php
/** Pour la connection a la BDD **/
    namespace Projet\Models;

use Exception;

class Manager{
        protected function dbConnect(){
            try{
                $bdd = new \PDO("mysql: host=localhost;dbname=mylibrary;charset=utf8","root", "");
                return $bdd;
            }
            catch(Exception $e){
                die("Erreur: " . $e->getMessage());
            }
        }
    };