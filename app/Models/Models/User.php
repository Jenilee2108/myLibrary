<?php
/**
 * 
 */
class User {

    private $_id;
    private $_pseudo;
    private $_name_user;
    private $_mail;
    private $_password;

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
    public function setPseudo($pseudo) {
        //on vérifie que pseudo est une string
        if (is_string($pseudo)) {
            $this->_pseudo = $pseudo;
        }
    }
    public function setName_user($name_user) {
        //on vérifie que name_user est une string
        if (is_string($name_user)) {
            $this->_name_user = $name_user;
        }
    }
    public function setMail($mail) {
        //on vérifie que mail est une string
        if (is_string($mail)) {
            $this->_mail = $mail;
        }
    }
    public function setPassword($password) {
        //on vérifie que password est une string
        if (is_string($password)) {
            $this->_password = $password;
        }
    }

    //getters 
    //Crée une fonction qui va porter le nom exacte des attributs de l'objet
    public function id() {
        return $this->_id;
    }
    public function pseudo() {
        return $this->_pseudo;
    }
    public function name_user() {
        return $this->_name_user;
    }
    public function mail() {
        return $this->_mail;
    }
    public function password() {
        return $this->_password;
    }
   

}
