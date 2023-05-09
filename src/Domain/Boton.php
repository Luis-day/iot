<?php

namespace Iot\Domain;

class Boton {
    private $id;
    private $valor;

    public function __construct($id, $valor){
        $this->id           = $id;
        $this->valor        =$valor;
    }
    
    public function getId(): int {
        return $this->id;
    }

    public function setId($id) {
        $this->id;
    }

}