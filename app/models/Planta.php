<?php
class Planta {
    public $id;
    public $nome_cientifico;
    public $nome_popular;

    public function __construct($nome_cientifico = "", $nome_popular = "", $id = null){
        $this->id = $id;
        $this->nome_cientifico = $nome_cientifico;
        $this->nome_popular = $nome_popular;
    }
}
