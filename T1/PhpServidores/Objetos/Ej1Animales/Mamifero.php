<?php

include_once 'Animal.php';

abstract class Mamifero extends Animal {
  //constructor automático en Animal.php
  //getter en Animal.php
  
  public function come($comida) {
    if ($comida == "carne"){
      echo "Uff que comida tan buenarda";
    } else {
      echo "A mí no me gusta este tipo de comida. Quiero carne";
    }
  }
  
  public function bailar() {
    echo "Se marca tremendo bailoteo";
  }
}
