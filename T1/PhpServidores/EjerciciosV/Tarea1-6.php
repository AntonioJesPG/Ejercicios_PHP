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

            $numeroInicialFor = 0;

            for($i = 1; $i <= 100 ; $i++){
                $numeroInicialFor = $numeroInicialFor + $i;
            }
            
            echo "<p>Suma con bucle for ".$numeroInicialFor."</p>";
            
            $numeroInicialWhile = 0;
            $i = 1;

            while($i <= 100){
                $numeroInicialWhile = $numeroInicialWhile + $i;
                $i++;
                
            }
            
            echo "<p>Suma con bucle for ".$numeroInicialWhile."</p>";
            
            $numeroInicialDoWhile = 0;
            $i=1;

            do{
                $numeroInicialDoWhile = $numeroInicialDoWhile + $i;
                $i++;
                
            }while($i <= 100);

            echo "<p>Suma con bucle for ".$numeroInicialDoWhile."</p>";
        ?>
    </body>
</html>