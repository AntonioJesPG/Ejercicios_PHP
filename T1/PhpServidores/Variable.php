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
            echo"<table border=1>";            
            foreach($_SERVER as $var => $modulo){
                
                echo"<tr><td>".$var."</td><td>".$modulo."</td></tr>";
            }
            echo"</table>"
        ?>
    </body>
</html>