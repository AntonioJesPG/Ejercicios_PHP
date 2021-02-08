<header>
</header>
<body>
<?php
  include_once 'Gato.php';
  include_once 'Perro.php';
  include_once 'Canario.php';
  include_once 'Pinguino.php';
  include_once 'Lagarto.php';
  
  $perro = new Perro('Perrongo');
  $gato = new Gato('Gatuno');
  $canario = new Canario('IslasCanarias');
  $pingu = new Pinguino('Pingu');
  $lagarto = new Lagarto('Lagar');
  
  echo "<h2>Probando Animal</h2>";
  echo "</p>" . $perro->getNombre();
  echo "</p>" . $gato->getNombre();
  echo "</p>" . $canario->getNombre();
  echo "</p>" . $pingu->getNombre();
  echo "</p>" . $pingu->saltar();
  echo "</p>" . $lagarto->getNombre();
  echo "</p>" . $lagarto->pasear();
  
  echo "</p><h2>Vamos a probar métodos de Mamífero</h2>";
  echo "A bañarse";
  echo "</p>" . $perro->bailar();
  echo "</p>" . $gato->come("cocacola");
  echo "</p>" . $gato->come("pescado");
  
?>
</body>
