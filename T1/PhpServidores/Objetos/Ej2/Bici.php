<?php

include_once 'Vehiculo.php';


class Bici extends Vehiculo {
  
  public function __construct() {
    parent::__construct();
  }
  
  public function estrellarse(){
      echo "Uff vaya torta";
  }
  
  public function caballito(){
      echo "Tremendo caballito";
  }
}

