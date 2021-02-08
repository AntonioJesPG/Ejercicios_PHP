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
            if((empty($_POST["nombre"]) && empty($_POST["apellido"])||!empty($_POST["confirmar"]) || !empty($_POST["cancelar"]))){
            ?>
            <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre"
                <?php
                    if(isset($_POST["cancelar"])){
                        echo'value="'.$_POST["nombre"].'"';
                    }
                
                ?>
            >

            <p/>
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido"
                   <?php
                    if(isset($_POST["cancelar"])){
                        echo'value="'.$_POST["apellido"].'"';
                    }
                
                ?>
            >
            </p>
            <?php
            if(isset($_POST["cancelar"])){
                ?>

            <input type="hidden" name="direccion"
                   <?php
                   echo'value="'.$_POST["direccion"].'">'
                   ?>
            <input type="hidden" name="nTarj"
                   <?php
                   echo'value="'.$_POST["nTarj"].'">'
                   ?>
            <?php
                }
            ?>
            <input type="submit" value="Enviar" name="siguiente"/>
            </form>
            <?php
                }
                else{
            ?>
        <form name="input" action=indexFormularioPedido2.php method="post">
            <input type="hidden" name="nombre"
                   <?php
                   echo'value="'.$_POST["nombre"].'">'
                   ?>
            <input type="hidden" name="apellido"
                   <?php
                   echo'value="'.$_POST["apellido"].'">'
                   ?>
             <label for="direccion">Dirección</label>
            <input type="text" name="direccion"
                   <?php
                    if(!empty($_POST["direccion"])){
                        echo'value="'.$_POST["direccion"].'"';
                    }
                
                ?>
            >

            <p/>
            
            <label for="nTarj">Nº Tarjeta</label>
            <input type="text" name="nTarj"
                  <?php
                    if(!empty($_POST["nTarj"])){
                        echo'value="'.$_POST["nTarj"].'"';
                    }
                
                ?> 
                  >

            <p/>
            
            <input type="submit" value="EnviarDos" name="enviar"/>
        </form>
        <?php
            }
        ?>
    </body>
</html>

