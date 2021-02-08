<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        try{
            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
            $conexion = new PDO('mysql:host=localhost;dbname=dwes', 'dwes', 'abc123.');
            $error = $conexion->errorInfo();
            echo $error[2];

            $productos = $conexion->query("SELECT * FROM producto WHERE cod='".$_POST["editar"]."'");

            
        ?>
        <h1>Producto</h1>
        <form name="input" action="actualizar.php" method="post">
            
            <?php 
               while($nombres = $productos-> fetch(PDO::FETCH_ASSOC)){

                   echo'<label>Nombre Corto - </label>';
                   echo'<input type="text" name="nombreC" value="'.$nombres["nombre_corto"].'" readonly></p>';

                   echo'<label>Nombre</label></p>';
                   echo'<input type="text" name="nombre" value="'.$nombres["nombre"].'"></p>';

                   echo'<label>Descripcion</label></p>';
                   echo'<textarea type="text" name="desc" placeholder="'.$nombres["descripcion"].'" cols="60" rows="10" "></textarea></p>';

                   echo'<label>PVP</label></p>';
                   echo'<input type="text" name="pvp" value="'.$nombres["PVP"].'"></p>';

                }
            ?>

            <input type="submit" value="Actualizar" name="actualizar"/>
            <input type="submit" value="Cancelar" name="cancelar"/>
        </form>
        <?php 
        }
        catch (PDOException $exc) {
            echo $exc->getTraceAsString(); 
            echo 'Error:' . $exc->getMessage(); 
        }
        ?>
    </body>
</html>

