<?php

abstract class Vehiculo {

  private $kmRecorridos; 
  private static $vehiculosCreados = 0; 
  private static $kmTotales = 0; 
  
  
  public function __construct() {
    $this->kmRecorridos = 0;
    self::$vehiculosCreados++;
  }

  public static function getVehiculosCreados() {
    return self::$vehiculosCreados;
  }
  public static function getKmTotales() {
    return self::$kmTotales;
  }
  
  public static function setKmTotales($kT) {
    self::$kmTotales = $kT;
  }

  public function getKmRecorridos() {
    return $this->kmRecorridos;
  }
  
  public function anda($k) {
    echo "Recorriendo " . $k . " km.</p>";
    $this->incrementaKm($k);
    echo "Km totales : " . $this->getKmRecorridos()."</p>";
  }
  
  public function incrementaKm($k) {
    $this->kmRecorridos += $k;
    self::$kmTotales += $k;
  }
}
