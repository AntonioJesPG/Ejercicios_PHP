<?php

include_once 'Mamifero.php';

class Gato extends Mamifero {
    
  public function maullar() {
    echo "Miau, miau";
  }
  
  public function ronronear() {
    echo "Insertar ronroneo";
  }
  
  public function cazar() {
    echo "Ojala un delicioso pajarito por aquí";
  }
  
  public function come($comida) {
    if ($comida == "pescado") {
      echo "Buen pescaito";
    } else {
        if($comida == "carne"){
            parent::come($comida);
        }
        else{
            echo "No soy muy fan de esa comida poco gatuna.";
        }
    }
  }
}

