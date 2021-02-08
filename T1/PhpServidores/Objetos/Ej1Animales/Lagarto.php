<?php

include_once 'Animal.php';

class Lagarto extends Animal {
  
  public function lagartear($comida) {
      echo"Mira que buena ".$comida." me he lagarteado";
  }
  
  public function sonidos(){
      echo"Inserte sonidos de lagarto";
  }
  
  public function cocodrilo(){
      echo"Cocodrilo chiquito cocodrilo chiquito";
  }
  
  public function come($comida) {
    if (($comida == "carne") || ($comida == "insecto")) {
      parent::come($comida);
    } else {
      echo "Si me das eso mejor te lagartas de aquí";
    }
  }
}
