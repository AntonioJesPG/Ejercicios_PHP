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
            
            if(!empty($_POST['nombre']) && !empty($_POST['apellido'])){
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
            }
            if(!empty($_POST["nombre"])&& !empty($_POST["apellido"] && !empty($_POST["nMat"]) && !empty($_POST["curso"]) && !empty($_POST["precio"]))){
                echo"<p>Nombre : ".$_POST["nombre"]."</p>";
                echo"<p>Apellidos : ".$_POST["apellido"]."</p>";
                echo"<p>Nº Matrícula : ".$_POST["nMat"]."</p>";
                echo"<p>Curso : ".$_POST["curso"]."</p>";
                echo"<p>Precio : ".$_POST["precio"]."</p>";

            }
            else{
        ?>
            <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <?php
            if(empty($nombre) && empty($apellido) && empty($_POST["EnviarDos"]) ){
            ?>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre">

            <p/>
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido">
            
            <input type="submit" value="Enviar" name="siguiente"/>
            <?php
                }
                else{
            ?>
 
            <input type="hidden" name="nombre"
                   <?php
                   echo'value="'.$nombre.'">'
                   ?>
            <input type="hidden" name="apellido"
                   <?php
                   echo'value="'.$apellido.'">'
                   ?>
             <label for="nMat">nº Matricula</label>
            <input type="text" name="nMat">

            <p/>
            
            <label for="curso">Curso</label>
            <input type="text" name="curso">

            <p/>
            <label for="precio">Precio</label>
            <input type="text" name="precio">
            
            <input type="submit" value="EnviarDos" name="enviar"/>
        </form>
        <?php
            }
            }
        ?>
    </body>
</html>

