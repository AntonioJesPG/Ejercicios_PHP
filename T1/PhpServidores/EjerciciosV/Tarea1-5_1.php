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
            do{
              
                echo "<tr>";
              do{
                  
                  $numeroInicial = $numeroInicial + 1;
                  echo "<td> " . $numeroInicial . "</td>";
                  $j++;
                }while($j < 7);
                echo "</tr>";
                $j = 0;
                $i++;
            }while($i< 5);
            echo "</table>"
        ?>
    </body>
</html>