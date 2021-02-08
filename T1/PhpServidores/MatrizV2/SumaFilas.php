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
        <h1>Suma de filas de la matriz</h1>
        <?php
            require './FuncionesMatriz.php';
        
            //Creamos la matriz normal
            $matriz = (array) json_decode($_POST["matriz"],true);

            //Aqui se calcula la suma de columnas
            $sumFil = mostrarSumFilas($matriz);
            
            $codificado = json_encode($sumFil);
            $codificadoMat = json_encode($matriz);
            ?>
        
        <form name="input" action="indexMat.php" method="post">
            <input type="hidden" name="sumaF" value='<?php echo$codificado; ?>'></p>
            <input type="hidden" name="matriz" value='<?php echo$codificadoMat; ?>'></p>
            <input type="submit" name="sumF" value="calcular"></p>
        </form>
        <form action="indexMat.php" method="post">
            <input type="hidden" name="matriz" value='<?php echo$codificadoMat; ?>'></p>
            <input type="submit" name="volver" value="Volver"></p>
        </form>
    </body>
</html>