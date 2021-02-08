<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Suma de columnas de la matriz</h1>
        <?php

            if(!empty($_POST['filas'])  && !empty($_POST['columnas']) && empty($_POST['volver'])){
        ?>
            <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label>Filas </label>
            <input type="text" name="filas" value="<?php
            echo $_POST['filas'];
            ?>"></p>
            <label>Columnas </label>
            <input type="text" name="columnas"value="<?php
            echo $_POST['columnas'];
            ?>"></p>
            <input type="submit" name="creaMatriz" value="Generar"></p>
            </form>
        <?php
            require './FuncionesMatriz.php';
        
            //Creamos la matriz normal
            $matriz = crearMatriz($_POST['filas'], $_POST['columnas']);
            
            //Mostramos la matriz
            mostrarMatriz($matriz);

            //Aqui se calcula la suma de columnas
            $sumCol = mostrarSumColumnas($matriz);
            
            for($i = 0 ; $i < count($sumCol) ; $i++){
                echo"<p>La suma de la columna ".$i." es ".$sumCol[$i];
            }

        ?>
            </p>
            <form action="indexMat.php">
            <input type="submit" name="volver" value="Volver"></p>
            </form>
        <?php
            }
            else{

        ?>
        
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label>Filas </label>
            <input type="text" name="filas"></p>
            <label>Columnas </label>
            <input type="text" name="columnas"></p>
            <input type="submit" name="creaMatriz" value="Generar"></p>
        </form>
        <form action="indexMat.php">
            <input type="submit" name="volver" value="Volver"></p>
        </form>
        <?php
            }
        ?>
    </body>
</html>