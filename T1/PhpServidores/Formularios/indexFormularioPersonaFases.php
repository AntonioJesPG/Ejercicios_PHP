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
            if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['sexo']) && !empty($_POST['civil']) && !empty($_POST['aficion']) && !empty($_POST['Estudios']) && !empty($_POST['Edad'])){
                echo"<p>Nombre : ".$_POST["nombre"]."</p>";
                echo"<p>Apellidos : ".$_POST["apellido"]."</p>";
                echo"<p>Sexo : ".$_POST["sexo"]."</p>";
                echo"<p>Estado civil : ".$_POST["civil"]."</p>";
                echo"<p>Aficiones : ";
                foreach($_POST["aficion"] as $aficion =>  $valor){
                    echo" ".$valor.",";
                }
                echo"</p>";
                echo"<p>Estudios : ";
                foreach($_POST["Estudios"] as $estudios =>  $est){
                    echo" ".$est."";
                }
                echo"</p>";
                
                echo"<p>Edad : ".$_POST["Edad"]."</p>";
            }
            else{
        ?>
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre">

            <p/>
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido">

            <p>Sexo: </p>
                <input type="radio" name="sexo" value="Hombre">
                <label for="sexo0">Hombre</label>
                <input type="radio" name="sexo" value="Mujer">
                <label for="sexo1">Mujer</label>
                
            <p>Estado Civil: </p>
                <input type="radio" name="civil" value="Soltero">
                <label for="civil0">Soltero</label><br>
                <input type="radio" name="civil" value="Casado">
                <label for="civil1">Casado</label><br>
                <input type="radio" name="civil" value="Otro">
                <label for="civil2">Otro</label><br>


            <p>Aficiones: </p>
                <input type="checkbox" name="aficion[]" value="cine">
                <label for="aficion1">Cine</label>
                <input type="checkbox" name="aficion[]" value="Lectura">
                <label for="aficion2">Lectura</label>
                <input type="checkbox" name="aficion[]" value="Tv">
                <label for="aficion3">Tv</label><br>
                <input type="checkbox" name="aficion[]" value="Deporte">
                <label for="aficion4">Deporte</label>
                <input type="checkbox" name="aficion[]" value="Música">
                <label for="aficion5">Musica</label>
                
            <p>Estudios: </p>
            <select multiple name="Estudios[]" size="5">
                    <option value="ESO">ESO</option>
                    <option value="Bachillerato">Bachillerato</option>
                    <option value="CFGM">CFGM</option>
                    <option value="CFGS">CFGS</option>
                    <option value="Universidad">Universidad</option>
                </select>
            
            <p>Edad: </p>
                <select  name="Edad">
                    <option value="Entre 1 y 14 años">Entre 1 y 14 años</option>
                    <option value="Entre 15 y 25 años">Entre 15 y 25 años</option>
                    <option value="Entre 26 y 35 años">Entre 26 y 35 años</option>
                    <option value="Mayor de 35">Mayor de 35</option>
                </select>

            <p/>
            <input type="submit" value="Enviar" name="enviar"/>
        </form>
        <?php
            }
        ?>
    </body>
</html>

