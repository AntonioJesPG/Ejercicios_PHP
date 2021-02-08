<?php

include_once 'Vehiculo.php';


class Coche extends Vehiculo {
  
  public function __construct() {
    parent::__construct();
  }
  
  public function voltio() {
    echo "Dando un voltio";
  }
  
  public function quemarRueda() {
    echo "Quemando ruedines";
  }
}
