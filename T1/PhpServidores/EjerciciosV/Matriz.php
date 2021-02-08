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

            $anio1 = array();
            $i = 0;
            $j = 0;
            
            for($i = 0; $i < 3; $i++){
                for($j = 0; $j < 3; $j++){
                    $anio[$j][$i] = $i;
                }
            }
            /*
            foreach($anio as $indFila => $fila) {
                
                foreach($fila as $indCol => $num){
                    
                    echo"<p>En la fila ".$indFila." y col ".$indCol." el valor es : ".$num."</p>";
                    
                }
                
            }
             * */
             
            echo"<table border=1>";
            echo"<tr><th>Fila</th><th>Columna</th><th>Valor</th></tr>";
            foreach($anio as $indFila => $fila) {
                echo"<tr>";
                foreach($fila as $indCol => $num){
                    echo"<tr>";
                    echo"<td>".$indFila."</td><td>".$indCol."</td><td>".$num."</td>";
                    echo"</tr>";
                }
                echo"</tr>";
            }

        ?>
    </body>
</html>