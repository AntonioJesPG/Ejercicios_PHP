<h1>Juegos Alquilados</h1>
<a href="listadoJuegos.php">Volver</a>


<?php 
            try{        
            include_once 'Alquiler.php';
            include_once 'Conexion.php';
            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
            $conexion = new PDO('mysql:host=localhost;dbname=alquiler_juegos', 'dwes', 'abc123.');
            $error = $conexion->errorInfo();
            $conex = new Conexion($conexion);
            echo $error[2];
            session_start();
            
            $productos = $conex->obtenerJuegosAlquilados();
            if($productos->rowCount() >0 ){
?>

<table border="1">
    <tr>
        <th>Caratula</th>
        <th>Nombre de juego</th>
        <th>Nombre de consola</th>
        <th>Año</th>
        <th>Precio</th>
        <th>Persona que lo posee</th>
    </tr>
<?php 
            while($juegos = $productos->fetch(PDO::FETCH_ASSOC)){
                 echo"<tr>";
                 echo'<form method="post" action="">';
                 echo"<td><img src='".$juegos["Imagen"]."'></td>";
                 echo"<td>".$juegos["Nombre_juego"]."</td>";
                 echo"<td>".$juegos["Nombre_consola"]."</td>";
                 echo"<td>".$juegos["Anno"]."</td>";
                 echo"<td>".$juegos["Precio"]."</td>";
                 echo"<td>".$juegos["Nombre"];
                 echo"</td>";
                 echo"</form>";
                 echo"</tr>";
?>
    
<?php 
            }}else{
                echo"<p>No hay juegos alquilados</p>";
            }
        }
        catch (PDOException $exc) {
        echo $exc->getTraceAsString(); 
        echo 'Error:' . $exc->getMessage(); 
        }
?>
</table>
