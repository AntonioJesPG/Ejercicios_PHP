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
        <?php

            $anio1 = 2002;

            if($anio1 % 4 == 0 && $anio1 % 100 == 0 && $anio1 % 400 == 0){
                echo "el año ".$anio1. " es bisiesto";
            }
            else {
                echo "el año ".$anio1. " no es bisiesto";
            }

        ?>
    </body>
</html>