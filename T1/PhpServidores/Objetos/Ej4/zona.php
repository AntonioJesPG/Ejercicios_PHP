<?php

class Zona {

  private $nombreZona;
  private $plazas_totales;
  private  $plazas_restantes;
  
  public function __construct($n, $pt) {
    $this->nombreZona = $n; 
    $this->plazas_totales = $pt;
    $this->plazas_restantes = $pt;
  }
  
  public function getNombreZona() {
    return $this->nombreZona;
  }
  
  public function getPlazasTotales() {
    return $this->plazas_totales;
  }
  
  public function getPlazasRestantes() {
    return $this->plazas_restantes;
  }
  
  public function venderEntradas($cant){
      if($cant <= $this->plazas_restantes){
        $this->plazas_restantes -= $cant;
        echo"<p>".$cant." plazas reservadas correctamente";
      }
      else{
          echo"<p style='color:red;'> Error, solo quedan ".$this->plazas_restantes." plazas en la zona ".$this->nombreZona."</p>";
      }
  }
}