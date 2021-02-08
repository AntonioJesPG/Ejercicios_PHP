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
            $i = 0;
            $j = 0;
            echo "<table border>";
            while($i!= 5){
              
                echo "<tr>";
              while($j != 7){
                  
                  $numeroInicial = $numeroInicial + 1;
                  echo "<td> " . $numeroInicial . "</td>";
                  $j++;
                }
                echo "</tr>";
                $j = 0;
                $i++;
            }
            echo "</table>"
        ?>
    </body>
</html>