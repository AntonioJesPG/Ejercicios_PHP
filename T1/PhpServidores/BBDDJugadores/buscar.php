<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
            <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <label>Seleccione el criterio de búsqueda</label>
                <select  name="seleccion">
                    <option value="dni">DNI</option>
                    <option value="equipo">Equipo</option>
                    <option value="posicion">Posicion</option>
                </select></p>
                <label>Objeto a buscar</label>
                <input type="text" name="busqueda">
                <input type="submit" name="enviar" value="enviar">
            </form>
        <?php
            
            if(isset($_POST["enviar"])){
            $conexion = new mysqli('localhost','dwes','abc123.','futbol');
            if($conexion->connect_errno){
                echo"<p>Error de conexión</p>";    
            }else{
                
                if($_POST["seleccion"] == "posicion"){
                    $jugadores = $conexion->query("SELECT * from jugador where ".$_POST["seleccion"]." LIKE '%".$_POST["busqueda"]."%'");
                }
                else{
                    $jugadores = $conexion->query("SELECT * from jugador where ".$_POST["seleccion"]."='".$_POST["busqueda"]."'");
                }
                
                if($conexion->errno){
                    echo $conexion->errno;
                }
                if($jugadores->num_rows == 0 && $_POST["seleccion"] == "dni"){
                    echo"<p>Jugador no encontrado</p>";
                }
                else{
                    echo"<a href='index.php'><button>Volver</button></a>";
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
                    echo"</table></p>";
                    }
                }
            }
        ?>

    </body>
</html>

