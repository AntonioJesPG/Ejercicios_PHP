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

            $numeroInicial = 0;

            for($i = 1; $i <= 100 ; $i++){
                if($i%2 == 0){
                   $numeroInicial = $numeroInicial + $i;  
                }
           
            }
            
            echo "<p>Suma con de los cuadrados de los 100 primeros numeros ".$numeroInicial."</p>";
            
            
        ?>
    </body>
</html>