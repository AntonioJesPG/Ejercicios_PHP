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
        <p><a href="CrearMatriz.php">Crear la matriz</a></p>
        
        <?php 
            require './FuncionesMatriz.php';
            if(!empty($_POST["filas"])&&!empty($_POST["columnas"])){
                $matriz = crearMatriz($_POST['filas'], $_POST['columnas']);
                $codificado = json_encode($matriz);
                mostrarMatriz($matriz);
            }

            if(!empty($_POST["matriz"])){
              $matriz = (array) json_decode($_POST["matriz"]);
              $codificado = json_encode($matriz);
              mostrarMatriz($matriz);
            }
            if(!empty($_POST["sumaC"])){
                $sumCol = (array) json_decode($_POST["sumaC"]);
                foreach($sumCol as $col => $valor){
                echo"<p>La suma de la columna ".$col." es ".$valor;
                }
            }
            if(!empty($_POST["sumaF"])){
                $sumFil = (array) json_decode($_POST["sumaF"]);
                foreach($sumFil as $fil => $valor){
                echo"<p>La suma de la fila ".$fil." es ".$valor;
                }
            }
            if(!empty($_POST["sumaD"])){
                $sumDia = json_decode($_POST["sumaD"]);
                echo"<p>La suma de la diagonal es".$_POST["sumaD"];
            }
            if(!empty($_POST["sumaT"])){
                echo"<p>La suma de la diagonal es".$_POST["sumaT"];
            }
            if(!empty($_POST["matrizT"])){
                $matrizT = (array) json_decode($_POST["matrizT"]);
                mostrarMatriz($matrizT);
            }
            
        ?>
        
        <form name="input" action="SumaFilas.php" method="post">
            <input type="hidden" name="matriz" value='<?php echo$codificado; ?>'></p>
            <input type="submit" name="creaMatriz" value="Suma Filas"></p>
        </form>
        
        <form name="input" action="SumaCol.php" method="post">
            <input type="hidden" name="matriz" value='<?php echo$codificado; ?>'></p>
            <input type="submit" name="creaMatriz" value="Suma Columnas"></p>
        </form>
        
        <form name="input" action="SumaDiagonal.php" method="post">
            <input type="hidden" name="matriz" value='<?php echo$codificado; ?>'></p>
            <input type="submit" name="creaMatriz" value="Suma diagonal Matriz"></p>
        </form>
        
        <form name="input" action="SumaTotal.php" method="post">
            <input type="hidden" name="matriz" value='<?php echo$codificado; ?>'></p>
            <input type="submit" name="creaMatriz" value="Suma Total Matriz"></p>
        </form>
        
        <form name="input" action="MatrizT.php" method="post">
            <input type="hidden" name="matriz" value='<?php echo$codificado; ?>'></p>
            <input type="submit" name="creaMatriz" value="Matriz Transpuesta"></p>
        </form>

    </body>
</html>
