<?php
/**
 * 
 */
class Livre {

    private $_id;
    private $_title;
    private $_category;
    private $_content;

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
    public function setTitle($title) {
        //on vérifie que title est une string
        if (is_string($title)) {
            $this->_title = $title;
        }
    }
    public function setCategory($category) {
        //on vérifie que category est une string
        if (is_string($category)) {
            $this->_category = $category;
        }
    }
    public function setContent($content) {
        //on vérifie que content est une string
        if (is_string($content)) {
            $this->_content = $content;
        }
    }

    //getters 
    //Crée une fonction qui va porter le nom exacte des attributs de l'objet
    public function id() {
        return $this->_id;
    }
    public function title() {
        return $this->_title;
    }
    public function category() {
        return $this->_category;
    }
    public function content() {
        return $this->_content;
    }
   

}
