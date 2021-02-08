<?php

class Persona{
    private $nombre;
    private $edad;
    private $apellido;
    
    function __construct($nombre, $apellido, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->apellido = $apellido;
    }
    
    function __get($name) {
        return $this->$name;
    }

    function __set($name, $value) {
        $this->$name = $value;
    }
    
    function __toString() {
        return $this->nombre." - ".$this->apellido." - ".$this->edad;
    }
}
