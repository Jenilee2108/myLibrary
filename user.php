<?php

class User {
    private $pseudo;
    private $firstname;
    private $mail;
    private $password;
    function __construct($pseudo, $firstname, $mail, $password) {
        $this->pseudo = $pseudo;
        $this->firstname = $firstname;
        $this->mail = $mail;
        $this->password = $password;
        $this->co = false;
    }
    function isConnected() {
        
    }
}