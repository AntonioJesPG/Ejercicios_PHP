<?php

class Dado {

  private static $caras = ['As', 'K', 'Q', 'J', '7', '8'];
  private  $tiradasTotales = 0;
  private $tirada;
  
  public function tira() {
    $caraSacada = self::$caras[rand(0,5)];
    $this->tirada = $caraSacada;
    $this->tiradasTotales++;
  }
  
  public function nombreFigura() {
    return $this->tirada;
  }
  
  public function getTiradasTotales() {
    return $this->tiradasTotales;
  }

}