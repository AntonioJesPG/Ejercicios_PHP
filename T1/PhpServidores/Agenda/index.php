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
        <link rel="stylesheet" href="agendacss.css">
    </head>
    <body>
        <?php

            //Si hemos enviado datos recolectamos los datos de dentro de la agenda
            if(!empty($_POST["guardar"])){

                //Decodificamos el array para obtener un nuevo array con los valores anteriores
                $agenda = (array) json_decode($_POST["agenda"],true);

            //Se muestra un error si el usuario no introduce el nombre
            if(empty($_POST["nombre"])){
                echo'<h1 class="altoDch2">Error debe introducir datos</h1>';
            }
            //Si el usuario introduce un nombre sin un teléfono
            elseif(empty($_POST["telefono"])){
                //Si el nombre existe lo eliminamos
                if(array_key_exists($_POST["nombre"], $agenda)){
                        unset($agenda[$_POST["nombre"]]);
                        echo"<h1 class='altoDch1'>El usuario se ha eliminado correctamente</h1>";
                    }
                //Si el nombre no existe mandamos un error
                else{
                    echo"<h1 class='altoDch2'>El usuario no existe en el sistema</h1>";
                    }
            }
            //Si introduce ambos ha de comprobar si existe el usuario ya
            else{
                //Si el usuario ya existe se le cambia el telefono
                if(array_key_exists($_POST["nombre"], $agenda)){
                    $agenda[$_POST["nombre"]] = $_POST["telefono"];
                    echo"<h1 class='altoDch1'>El usuario se ha modificado correctamente</h1>";
                }
                //si no existe se crea el nuevo usuario con su telefono
                else{
                    $agenda += [$_POST["nombre"] => $_POST["telefono"]];
                    echo"<h1 class='altoDch1'>El usuario se ha añadido correctamente</h1>";
                }

            }
            } 
            //Si es la primera vez que se carga la página se crea el array de la agenda
            else{
                $agenda = array();
            }
        ?>
        <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Número</th>
            </tr>
            <?php
            //Mostramos la tabla de la agenda con cada uno de los elementos
            foreach($agenda as $nom => $tel){
                echo"<tr><td>".$nom."</td>";
                echo"<td>".$tel."</td></tr>";
            }

            //Codificamos el array
            $codificado = json_encode($agenda);
                
            echo"</table>";
            ?>
            
        </table>
        <form class="bajoDch" name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <input type="text" name="nombre"></p>
            <input type="text" name="telefono"></p>
            <input type="hidden" name="agenda" value='<?php echo$codificado; ?>'>
            <input type="submit" name="guardar" value="guardar">
            
        </form>
    </body>
</html>
