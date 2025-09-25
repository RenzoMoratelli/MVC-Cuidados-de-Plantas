<?php
class Usuario {
    public $id;
    public $nome;
    public $email;

    public function __construct($nome = "", $email = "", $id = null){
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
    }
}
