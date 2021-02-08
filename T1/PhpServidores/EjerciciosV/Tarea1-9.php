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

            $numeroUno = 7;
            $numeroDos = 0;
            $numeroTres = 3;
            
            $menor;
            $medio;
            $mayor;

            if($numeroUno > $numeroDos){
                if($numeroUno > $numeroTres){
                    $mayor = $numeroUno;
                    if($numeroDos > $numeroTres){
                        $medio = $numeroDos;
                        $menor = $numeroTres;
                    }
                    else{
                        $medio = $numeroTres;
                        $menor = $numeroDos;
                    }
                }
            }
            else{
                if($numeroDos > $numeroTres){
                    $mayor = $numeroDos;
                    if($numeroTres > $numeroUno){
                        $medio = $numeroTres;
                        $menor = $numeroUno;
                    }
                    else{
                        $medio = $numeroUno;
                        $menor = $numeroTres;
                    }
                }
                else{
                    $mayor = $numeroTres;
                    if($numeroDos > $numeroUno){
                        $medio = $numeroDos;
                        $menor = $numeroUno;
                    }
                    else{
                        $medio = $numeroUno;
                        $menor = $numeroDos;
                    }
                }
            }
            
            echo "<p>Los numeros ordenados son ".$menor." , ".$medio." , ".$mayor."</p>";
            
            
        ?>
    </body>
</html>