<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
            if(!empty($_POST['dia']) && !empty($_POST['mes']) && !empty($_POST['anio']) && checkdate($_POST['mes'],$_POST['dia'],$_POST['anio'])){
                $dia = $_POST['dia'];
                $mes = $_POST['mes'];
                $anio = $_POST['anio']; 
                echo"<p>".$dias[date("w", mktime(0, 0, 0, $mes, $dia, $anio))]." ".$dia." de ".$meses[$mes-1]." de ".$anio;
            }
            else{
        ?>
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

            <p>Día: <input type="text" name="dia"
            <?php
            if(!empty($_POST['dia'])){
                $ultimoDia = 31;
                if(!empty($_POST['mes']&& !empty($_POST['anio']))){
                   $ultimoDia = mktime(0, 0, 0,$_POST['mes'], $_POST['dia'], $_POST['anio']); 
                }
              if($_POST['dia'] >= 1 && $_POST['dia'] <= $ultimoDia){
                  echo'value="'.$_POST['dia'].'"';
                  echo'><p style="color:red">El día introducido no es válido</p';
              }
              else{
                  echo'value="'.$_POST['dia'].'"';
                  echo'><p style="color:red">El día introducido no es válido</p';
              }
            }
            ?>> </p>
            <p>Mes: <input type="text" name="mes" 
            <?php
            if(!empty($_POST['mes'])){
              if($_POST['mes'] >= 1 && $_POST['mes'] <= 12){
                  echo'value="'.$_POST['mes'].'"';
              }
              else{
                  echo'><p style="color:red">El mes introducido no es válido</p';
              }
            }?>> </p>
            <p>Año: <input type="text" name="anio"
            <?php
            if(!empty($_POST['anio'])){
              echo'value="'.$_POST['anio'].'"';  
            }?>> </p>
            <input type="submit" value="Enviar" name="enviar"/>
        </form>
        <?php
            }
        ?>
    </body>
</html>

