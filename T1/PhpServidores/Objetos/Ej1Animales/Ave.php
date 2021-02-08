<?php

include_once 'Animal.php';

abstract class Ave extends Animal {
  
  public function piar() {
    echo "Pio pio";
  }
  
  public function volar() {
    echo "Volando voy"; 
    self::vuela();
  }
  
  public function poneHuevo() {
    echo "Se viene el huevazo";
  }
}