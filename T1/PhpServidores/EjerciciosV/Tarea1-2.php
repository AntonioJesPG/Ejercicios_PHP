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

            $numeroRandom = rand(1,100);
            while($numeroRandom % 2 == 0){
                 $numeroRandom = rand(1,100);
            }
            echo "<table border>";
            for($i = 0; $i < 10 ; $i++){
              
                echo "<tr>";
              for($j = 0; $j < 10 ; $j++){
                
                  echo "<td> " . $numeroRandom . "</td>";
                  $numeroRandom = $numeroRandom + 2;
                  
                }
                echo "</tr>";
            }
            echo "</table>"
        ?>
    </body>
</html>