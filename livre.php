<?php

class Livre{
    /* on donne la portée des paramètres*/
        private $id;
        private $title;
        private $category;
        private $resume;

    /*On fait le constructor dans une fonction __construct */
        public function __construct($id,$title,$category,$resume){
            $this->id=$id;
            $this->title=$title;
            $this->category=$category;
            $this->resume=$resume;
        }
    
    /** Methode de Classe  **/
        public static function all(){
            /** Connexion a la bdd **/
                    $path = "mysql:host=".$_ENV['DB_HOST'].":".$_ENV['DB_PORT'].";dbname=".$_ENV['DB_NAME'].";charset=utf8";
                $pdo = 
                    new PDO(
                        $path, 
                        $_ENV['DB_USER'], 
                        $_ENV['DB_PASSWORD']
                    );
        
            /* Mise en place de la requête en bdd*/
                $sqlQuery = 'SELECT `id,title,author,category,resume,tome` FROM Livre';
            /* Récupération de la réponse */
                $req=$pdo->query($sqlQuery);
            /* Pour organiser les données */
            /*Je fais un tableau  pour pouvoir faire des données du new self() 
            des objets ou on pourra appliquer les méthodes défini*/
                $livres=[];
            /*on fait une boucle dans laquelle on récupère les données de la requete
             que l'on push dans l'array livres 
            le self() permet de boucler sur la classe dans lequel on est */
                foreach ($req as $livre) {
                    array_push($livres, 
                    new self(
                        $livre["id"],
                        $livre["title"],
                        $livre["category"],
                        $livre["resume"])
                    );	
                }
            /* On retourne le tableaux de serveurs pour pouvoir l'utiliser*/
                return $livres;
        }
    
    /* Méthode pour utiliser les infos récupérées à un objet obtenu ac la classe*/
        public function info(){
            return "Bonjour, je m'appelle {$this->title} et  je parle de {$this->resume} je fais partie de la catégorie des {$this->category}. ";
        }
    };