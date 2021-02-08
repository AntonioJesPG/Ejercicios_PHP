<?php
  include_once 'Dado.php';
  session_start();
  if(!isset($_SESSION['dado'])){
      $_SESSION['dado'] = new Dado();
  }
?>
  <form action="" method="post">
      <input type="submit" value="tirarDados"  name="tirarDados">
  </form>
<?php
    if (isset($_POST['tirarDados'])) {
      $contador = 0;
      for($i = 0 ; $i < 5 ; $i++){
        $_SESSION['dado']->tira();
?>
<p>
<?php
          echo $_SESSION['dado']->nombreFigura();
?>
</p>
<?php
      }
      ?>
<p> Tiradas totales del dado : <?php echo $_SESSION['dado']->getTiradasTotales(); ?> </p>

<?php
    }
?>
