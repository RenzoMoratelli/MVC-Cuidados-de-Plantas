<?php
class Cuidado {
    public $id;
    public $usuario_id;
    public $planta_id;
    public $tipo_cuidado;
    public $frequencia;

    public function __construct($usuario_id = "", $planta_id = "", $tipo_cuidado = "", $frequencia = "", $id = null){
        $this->id = $id;
        $this->usuario_id = $usuario_id;
        $this->planta_id = $planta_id;
        $this->tipo_cuidado = $tipo_cuidado;
        $this->frequencia = $frequencia;
    }
}
