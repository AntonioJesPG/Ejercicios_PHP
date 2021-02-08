<?php


abstract class Animal {
  private $nombre;
  
  public function __construct($n) {
    $this->nombre = $n;   
  }
  public function getNombre() {
    return $this->nombre;
  }
  
  public function saltar() {
    echo "Saltando saltos";
  }
  public function jugar($juguete) {
    echo "Como me gusta jugar con mi  " . $juguete;
  }
  public function pasear() {
    echo "Paseando como un animalote";
  }
 
    public function come($comida) {
    echo "Mmmmmm qué ric@ está " . $comida;
  }
  
}

