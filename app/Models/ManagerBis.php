<?php
    namespace Projet\Models;

use PDO;

// use PDO;

// class Manager{
//     //pour avoir les bons noms de classe
//     const TABLES = array(
//             "LivreManager"=>"livres",
//             "AuthorManager"=>"authors",
//             "CommManager"=>"comms",
//             "UserManager"=>"users",
//             "AuthorLivreManager"=>"authorLivres"
//     );
    
    // private static function managerTable($child){
    //     /*je récupère le nom de la table associée à mon Manager
    //     ** on coupe le chemin qui mène au Manager visé via les \ 
    //     ** on en met 2 pour ne pas que ca prenne en cpt les "" 
    //     ** mais bien le \ et ça nous renvoi une array
    //     */
    // $tableAry = explode("\\", $child);
    //     //le nom du manager c'est le dernier élément de l'array obtenu soit le nom du Manager
    // $manager =$tableAry[count($tableAry) - 1];
    //     // puis on va chercher la valeur correspondante
    // $table = self::TABLES[$manager];
    
    // return $table;
    // }

    // private static $bdd=null;
    // protected static function dbConnect(){
    //     try{
    //         if(self::$bdd){
    //                 return self::$bdd;
    //         }
    //         else{
    //             self::$bdd = new \PDO("mysql: host=localhost;dbname=mylibrary;charset=utf8","root", "");
    //             return self::$bdd;
    //         }
    //     }
    //     catch(\Exception $e){
    //         die("Erreur: " . $e->getMessage());
    //     }
    // }
    
    // public static function all(){
    //     $table = managerToTable(get_called_class());

    //     $newbdd= new Manager();
    //     $bdd = $newbdd->dbConnect();
        
    //     $question="SELECT * FROM `{$child}` ORDER BY id DESC";
    //     $req=$bdd->query($question);

    //     return $req;
    //         }
// };

abstract class Manager {
    //crée un attribut pour la connexion
    private static $_bdd;

    //connexion a la bdd
    private static function setBdd() {
        self::$_bdd = new PDO('mysql:host=localhost;dbname=mylibrary;charset=utf8','root','');
        //on utilise les constantes de PDO pour gérer les erreurs
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    //Fonction de connexion par défaut a la bdd qui connecte a la bdd si ce n'est pas le cas
    protected function getBdd() {
        //on vérifie si on est connecté a la bdd
        if(self::$_bdd == null){
            self::setBdd();
            return self::$_bdd;
        }
    }

    //Création de la méthode de récupération de listes d'élémentdans la bdd
    protected function getAll($table, $obj) {
        //connection a la bdd
        $this->getBdd();
        //on crée un tableau vide ou mettre les données récupérées
        $var = [];
        //Mise en place de la requete plus sécurisé
        $req = self::$_bdd->prepare('SELECT * FROM '.$table.' ORDER BY `id` desc');
        $req->execute();

        //on crée une variable data qui va contenir les données récupérer de la table ciblée
        //sous forme de tableau associatif grace a FETCH_ASSOC
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            //on ajoute les données sous forme d'objet dans le tableau $var
            $var[] = new $obj($data);
        }
        return $var;
        //pour mettre fin a la requete
        $req->closeCursor; 
    }
}
//     //Fonction pour ne récupérer qu'un seul article
//     protected function getOne($table, $obj, $id) {
//         //connexion a la bdd
//         $this->getBdd();
//         //le tableau vide ou mettre les données récupérées
//         $var = [];
//         //Mise en place de la requete 
//         $req = self::$_bdd->prepare('SELECT `id`, `title`, `category`, `content` FROM '.$table.' WHERE `id` = ?');
//         $req->execute(array($id));

//         //on crée une variable data qui va contenir les données récupérer de la table ciblée
//         while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
//             //on ajoute les données sous forme d'objet dans le tableau $var
//             $var[] = new $obj($data);
//         }
//         return $var;
//         //pour mettre fin a la requete
//         $req->closeCursor; 
//     }

// }