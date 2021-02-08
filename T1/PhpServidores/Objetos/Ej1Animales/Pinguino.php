<?php

include_once 'Ave.php';

class Pinguino extends Ave {
     
  public function vuela() {
    echo "Yo no vuelo, yo bailo<br>";
    self::baila();
  }
  
  public function come($comida) {
    if ($comida == "pescado") {
      parent::come($comida);
    } else {
      echo "No esta buenarda esa comida.";
    }
  }
  
    public function baila() {
    echo "El baile del pinguino";
}

    }
