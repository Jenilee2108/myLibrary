<?php
    namespace Projet\Models;
class Manager{
    //pour avoir les bons noms de classe
    const TABLES = array(
            "BookManager"=>"livres",
            "BiblioManager"=>"userlivres",
            "MemoManager"=>"memolivres",
            "UserManager"=>"users"
    );
    
    private static function managerTable($child){
        /*je récupère le nom de la table associée à mon Manager
        ** on coupe le chemin qui mène au Manager visé via les \ 
        ** on en met 2 pour ne pas que ca prenne en cpt les "" 
        ** mais bien le \ et ça nous renvoi une array
        */
    $tableAry = explode("\\", $child);
        //le nom du manager c'est le dernier élément de l'array obtenu soit le nom du Manager
    $manager =$tableAry[count($tableAry) - 1];
        // puis on va chercher la valeur correspondante
    $table = self::TABLES[$manager];
    
    return $table;
    }

    private static $bdd=null;
    protected static function dbConnect(){
        try{
            if(self::$bdd){
                    return self::$bdd;
            }
            else{
                self::$bdd = new \PDO("mysql: host=localhost;dbname=mylibrary;charset=utf8","root", "");
                return self::$bdd;
            }
        }
        catch(Exception $e){
            die("Erreur: " . $e->getMessage());
        }
    }
    
    public static function all(){
        $table =managerToTable(get_called_class());

        $newbdd= new Manager();
        $bdd = $newbdd->dbConnect();
        
        $quetion="SELECT * FROM `{$child}` ORDER BY id DESC";
        $req=$bdd->query($question);

        return $req;
            }
};