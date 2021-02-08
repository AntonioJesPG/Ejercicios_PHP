<h1>Juegos Comares</h1>
<form method="POST" action="login.php">
    <button type="submit" name="cerrarSesion">Cerrar Sesión</button>
</form>
<a href="listadoJuegos.php">Volver</a>

<?php 
session_start();

            try{        
            include_once 'Alquiler.php';
            include_once 'Conexion.php';
            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
            $conexion = new PDO('mysql:host=localhost;dbname=alquiler_juegos', 'dwes', 'abc123.');
            $error = $conexion->errorInfo();
            $conex = new Conexion($conexion);
            echo $error[2];
            
            $productos = $conex->seleccionarJuegos();

?>

<table border="1">
    <tr>
        <th>Caratula</th>
        <th>Nombre de juego</th>
        <th>Nombre de consola</th>
        <th>Año</th>
        <th>Precio</th>
        <th></th>
    </tr>
<?php 
            while($juegos = $productos->fetch(PDO::FETCH_ASSOC)){
                 echo"<tr>";
                 echo'<form method="post" action="modificarJuego.php">';
                 echo"<td><img src='".$juegos["Imagen"]."'></td>";
                 echo"<td>".$juegos["Nombre_juego"]."</td>";
                 echo"<td>".$juegos["Nombre_consola"]."</td>";
                 echo"<td>".$juegos["Anno"]."</td>";
                 echo"<td>".$juegos["Precio"]."</td>";
                 echo"<td>";
                 if($juegos["Alguilado"]=="NO"){
                     echo'<button type="submit" name="modificar" value='.$juegos["Codigo"].'>Modificar</button>';
                 }
                 echo"</td>";
                                  echo"<td>";
                 if($juegos["Alguilado"]=="NO"){
                     echo'<button type="submit" name="eliminar" value='.$juegos["Codigo"].'>Eliminar</button>';
                 }
                 echo"</td>";
                 echo"</form>";
                 echo"</tr>";
?>
<?php 
            }
        }
        catch (PDOException $exc) {
        echo $exc->getTraceAsString(); 
        echo 'Error:' . $exc->getMessage(); 
        }
?>
</table>
<form method="POST" action="listadoJuegos.php">
        <input type="submit" name="volver" value="Volver">
</form>