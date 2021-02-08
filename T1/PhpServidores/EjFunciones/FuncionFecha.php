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
            function calcularFecha($tiempo){
                //Si la quieres en espaniol metes los switch para cojer la fecha en espaniol
                $dia = date("d",$tiempo);
                $mes = date("m",$tiempo);
                $anio = date("y",$tiempo);
               echo$dia."/".$mes."/".$anio;
                
            }
        ?>
    </body>
</html>