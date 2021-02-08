<?php
  include_once 'Vehiculo.php';
  include_once 'Bici.php';
  include_once 'Coche.php';
  
  $bici = new Bici();
  $coche = new Coche();
  
    $bici->anda(5);
    echo"</p>";
    $bici->caballito();
    echo"</p>";
    $coche->anda(10);
    echo"</p>";
    $coche->quemarRueda();
    echo"</p>";
    echo"KM recorridos por la bici : ".$bici->getKmRecorridos()."</p>";
    echo"</p>";
    echo"KM recorridos por el coche : ".$coche->getKmRecorridos()."</p>";
    echo"</p>";
    echo"KM totales recorridos por ambos : ".$bici->getKmTotales()."</p>";
  
?>


