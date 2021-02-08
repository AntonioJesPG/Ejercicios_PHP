<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
          $conexion = new mysqli('localhost','dwes','abc123.','futbol');
            if($conexion->connect_errno){
                echo"<p>Error de conexión</p>";    
            }else{
            $jug = 1;
            $jugadores = $conexion->query('SELECT * from jugador');
            echo"<table border=1>";
            echo"<tr><th>Nombre</th><th>Dni</th><th>Dorsal</th><th>Posición</th><th>Equipo</th><th>Goles</th>";
            while($j = $jugadores-> fetch_array()){
                echo"<tr>";
                echo"<td>".$j["nombre"]."</td>";
                echo"<td>".$j["dni"]."</td>";
                echo"<td>".$j["dorsal"]."</td>";
                echo"<td>".$j["posicion"]."</td>";
                echo"<td>".$j["equipo"]."</td>";
                echo"<td>".$j["numGoles"]."</td>";
                echo"</tr>";
            }
            echo"</table>";
            }
            echo"<a href='index.php'><button>Volver</button></a>";
        ?>
    </body>
</html>

