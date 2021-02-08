<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            
            if(!empty($_POST["enviar"])){
                echo"<p>aaa</p>";
                $conexion = new mysqli('localhost','dwes','abc123.','usuarios');
                 if($conexion->connect_errno){
                
                echo"<p>Error de conexión</p>";
                
            }else{
                $idiomas =0;
                foreach($_POST["idiomas"] as $id => $value){
                    $idiomas += $value;
                }
                $conexion -> query("INSERT into usuarios (nombre,apellidos,idiomas) values ('".$_POST["nombre"]."','".$_POST["apellidos"]."','".$idiomas."');" );
            }
            }
        ?>
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label>Nombre</label>
            <input type="text" name="nombre">
            <label>Apelldio</label>
            <input type="text" name="apellidos">
            <select multiple size="6" name="idiomas[]">
                <option value="1">Castellano</option>
                <option value="2">Frances</option>
                <option value="4">Ingles</option>
                <option value="8">Aleman</option>
                <option value="16">Bulgaro</option>
                <option value="32">Chino</option>       
            </select>
            <input type="submit" name="enviar" value="enviar">
        </form>
    </body>
</html>

