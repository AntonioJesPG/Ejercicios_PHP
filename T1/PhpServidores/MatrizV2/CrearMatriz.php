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
        <h1>Crear la matriz</h1>      
        
        <form name="input" action="indexMat.php" method="post">
            <label>Filas </label>
            <input type="text" name="filas"></p>
            <label>Columnas </label>
            <input type="text" name="columnas"></p>
            <input type="submit" name="creaMatriz" value="Generar"></p>
        </form>
        <form action="indexMat.php">
            <input type="submit" name="volver" value="Volver"></p>
        </form>
    </body>
</html>