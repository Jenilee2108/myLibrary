<?php
/**
 * 
 */
class Author {

    private $_id;
    private $_name_author;
    private $_fisrtname_author;
    

    public function __construct(array $data) {
        //pour sécuriser la bdd on utilise la fonction hydrate() sur l'array $data que l'on récupèredans l'objetde la requete
        $this->hydrate($data);
    }

    //hydratation 
    //pour chaque élément du tableau on va faire des setters 
    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key); 
            // on renvoi dc une method setId pour l'Id par exemple
            //on vérifie si la methode existes déja
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    //Setters
    public function setId($id) {
        $id = (int) $id;
        //on vérifie que id n'est pas nul
        if ($id > 0) {
            $this->_id = $id;
        }
    }
    public function setName_author($name_author) {
        //on vérifie que name_author est une string
        if (is_string($name_author)) {
            $this->_name_author = $name_author;
        }
    }
    public function setFisrtname_author($fisrtname_author) {
        //on vérifie que fisrtname_author est une string
        if (is_string($fisrtname_author)) {
            $this->_fisrtname_author = $fisrtname_author;
        }
    }

    //getters 
    //Crée une fonction qui va porter le nom exacte des attributs de l'objet
    public function id() {
        return $this->_id;
    }
    public function name_author() {
        return $this->_name_author;
    }
    public function fisrtname_author() {
        return $this->_fisrtname_author;
    }
   

}
