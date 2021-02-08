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
            if(!empty($_POST["nombre"])&& !empty($_POST["apellido"]) && !empty($_POST["direccion"]) && !empty($_POST["nTarj"])){
                echo"<p>Nombre : ".$_POST["nombre"]."</p>";
                echo"<p>Apellidos : ".$_POST["apellido"]."</p>";
                echo"<p>Dirección : ".$_POST["direccion"]."</p>";
                echo"<p>Nº Tarjeta : ".$_POST["nTarj"]."</p>";

        ?>
        <form name="input" action="indexFormularioPedido.php" method="post">
            
            <input type="hidden" name="nombre"
                   <?php
                   echo'value="'.$_POST["nombre"].'">'
                   ?>
                   
            <input type="hidden" name="apellido"
                   <?php
                   echo'value="'.$_POST["apellido"].'">'
                   ?>
            
            <input type="hidden" name="direccion"
                   <?php
                   echo'value="'.$_POST["direccion"].'">'
                   ?>
            <input type="hidden" name="nTarj"
                   <?php
                   echo'value="'.$_POST["nTarj"].'">'
                   ?>
            </p>
            <input type="submit" value="cancelar" name="cancelar"/>
            <input type="submit" value="confirmar" name="confirmar"/>
            <?php
            }
            ?>
            </form>
    </body>
</html>

