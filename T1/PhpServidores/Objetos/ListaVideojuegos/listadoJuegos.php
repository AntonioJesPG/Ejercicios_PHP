<h1>Juegos Comares</h1>
<form method="POST" action="login.php">
    <button type="submit" name="cerrarSesion">Cerrar Sesión</button>
</form>
<a href="listadoJuegos.php">Listado de Juegos</a>
<a href="listadoAlquilados.php">Listado de juegos alquilados</a>
<a href="listadoNoAlquilados.php">Listado de juegos no alquilados</a>
<a href="misAlquilados.php">Mis Juegos</a>

<?php 
session_start();
if($_SESSION["nombre"] == "12121212A"){
    echo"</p>";
    echo"<a href='agregarJuego.php'>Añadir Juego </a>";
    echo"<a href='AdministrarJuegos.php'>Administrar Juegos</a></p>";
}
            try{        
            include_once 'Alquiler.php';
            include_once 'Conexion.php';
            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
            $conexion = new PDO('mysql:host=localhost;dbname=alquiler_juegos', 'dwes', 'abc123.');
            $error = $conexion->errorInfo();
            $conex = new Conexion($conexion);
            echo $error[2];
            
            if(isset($_POST["codigo"])){
                $conex->alquilarJuego($_POST["codigo"]);
            }
            
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
                 echo'<form method="post" action="">';
                 echo"<td><img src='".$juegos["Imagen"]."'></td>";
                 echo"<td>".$juegos["Nombre_juego"]."</td>";
                 echo"<td>".$juegos["Nombre_consola"]."</td>";
                 echo"<td>".$juegos["Anno"]."</td>";
                 echo"<td>".$juegos["Precio"]."</td>";
                 echo"<td>";
                 if($juegos["Alguilado"]=="NO"){
                     echo'<button type="submit" name="codigo" value='.$juegos["Codigo"].'>Alquilar</button>';
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
