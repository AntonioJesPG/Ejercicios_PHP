<?php

include_once 'Mamifero.php';

class Perro extends Mamifero {
    

  public function ladrar() {
    echo "Guau, guau";
  }
  
  public function perrea() {
    echo "Perrea perrea pum pum";
  }
  
   public function come($comida) {
    if (($comida == "carne")) {
      parent::come($comida);
    } else {
      echo "En verdad me gusta to de to pa comer";
    }
  }
}
