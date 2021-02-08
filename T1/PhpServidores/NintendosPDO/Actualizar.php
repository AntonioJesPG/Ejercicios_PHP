<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if(isset($_POST["cancelar"])){
            header('Location: '.'Listado.php');
        }else{
        try{
            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
            $conexion = new PDO('mysql:host=localhost;dbname=dwes', 'dwes', 'abc123.');
            $error = $conexion->errorInfo();
            echo $error[2];

            $resultado = $conexion->prepare("UPDATE producto SET nombre=?, descripcion=?, PVP=? WHERE nombre_corto='".$_POST["nombreC"]."'");
            $resultado->bindParam(1, $_POST["nombre"]);
            $resultado->bindParam(2, $_POST["desc"]);
            $resultado->bindParam(3, $_POST["pvp"]);
            $resultado->execute();
            

            echo"<form name='input' action='Listado.php' method='post'>";
            echo"<p>Producto insertado correctamente</p>";
            echo"<input type='submit' name='enviar' value='aceptar'>";         
            }
            catch (PDOException $exc) {
                echo $exc->getTraceAsString(); 
                echo 'Error:' . $exc->getMessage(); 
            }
            }
            ?>
    </body>
</html>

