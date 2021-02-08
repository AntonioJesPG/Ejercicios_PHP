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

            echo "<table border>";
            for($i = 0; $i < 5 ; $i++){
              
                echo "<tr>";
              for($j = 0; $j < 7 ; $j++){
                  
                  $numeroInicial = $numeroInicial + 1;
                  echo "<td> " . $numeroInicial . "</td>";
                  
                }
                echo "</tr>";
            }
            echo "</table>"
        ?>
    </body>
</html>