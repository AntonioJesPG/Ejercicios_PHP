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
            function intercambiar($a,$b,$c){
            
                echo"<p>A : ".$a." , B : ".$b." , C : ".$c."</p>";
                
                $aux = $a;
                
                $a = $b;

                $b = $c;
                
                $c = $aux;
                
                
               echo"<p>A : ".$a." , B : ".$b." , C : ".$c."</p>";
                
            }
        ?>
    </body>
</html>