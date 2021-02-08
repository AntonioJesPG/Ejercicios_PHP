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

            $num1 = 5;
            $num2 = 500;
            $num3 = 100;
            $mayor;
            
            if($num1 > $num2){
                if($num1 > $num3){
                    $mayor = $num1;
                }
                else{
                    $mayor = $num3;
                }
            }
            else{
                if($num2 > $num3){
                    $mayor = $num2;
                }
                else{
                    $mayor = $num3;
                }
            
            }
            
            echo "El mayor de ".$num1. " , ".$num2." , ".$num3." es ".$mayor."";
        ?>
    </body>
</html>