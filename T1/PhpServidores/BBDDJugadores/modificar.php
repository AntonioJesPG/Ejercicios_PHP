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
        }
        
        if(isset($_POST["enviar"])){
            $modificar = $conexion->stmt_init();
            $modificar->prepare('UPDATE jugador SET nombre=?, dorsal=?, posicion=?, equipo=?, numGoles=? WHERE dni=?');
            $nombre = $_POST["nombre"];
            $dni = $_POST["dni"];
            $dorsal = $_POST["dorsal"];
            $posicion = 0;
            foreach($_POST["posicion"] as $pos => $value){
                    $posicion += $value;
            }
            $posT = strval($posicion);
            $equipo = $_POST["equipo"];
            $goles = $_POST["goles"];
            $modificar->bind_param('ssssss', $nombre, $dorsal, $posT, $equipo, $goles, $dni);
            $modificar->execute();
        }

        if(isset($_POST["buscarDni"]) && preg_match('/[0-9]{8}[a-zA-Z]/',$_POST["dni"])){
          $jugadores = $conexion->query("SELECT * from jugador where dni='".$_POST["dni"]."'");
          if($conexion->errno){
              echo$conexion->errno;
          }
        ?>
        
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label>Nombre</label>
            <?php
                while($j = $jugadores-> fetch_object()){
            ?>
            <input type="text" name="nombre"
            <?php 
                echo"value=".$j->nombre.">";
            ?>
            </p>
            <label>DNI</label>
            <input type="text" name="dni"
            <?php 
                    echo"value=".$_POST["dni"]." readonly>";
            ?>
            </p>
            <label>Dorsal</label>
            <select  name="dorsal">
            <?php
                for($i = 0; $i<12; $i++){
                    echo"<option value='".$i."'";
                    if($i == $j->dorsal){echo"selected";}
                    echo">".$i."</option>";
                }
            ?>
            </select></p>
            <label>Posicion</label>
            <select multiple size="4" name="posicion[]">
                <?php
                $posiciones = array("portero","defensa","centrocampista","delantero");
                $posicionesJugador = explode(",",$j->posicion);
                foreach($posicionesJugador as $p => $v){
                       echo$v;
                    }
                for($i = 0; $i<4; $i++){
                    echo"<option value='".pow(2,$i)."'";
                    //foreach($posicionesJugador as $p => $v){
                        //if(strtolower($posiciones[$i]) == strtolower($v)){echo"selected";}
                    //}
                    if(in_array($posiciones[$i],$posicionesJugador)){echo"selected";}
                    echo">".$posiciones[$i]."</option>";

                }
            ?>      
            </select></p>
            <label>Equipo</label>
            <input type="text" name="equipo"
            <?php 
                echo"value=".$j->equipo.">";
            ?>
            </p>
            <label>Goles</label>
            <input type="text" name="goles"
            <?php 
                echo"value=".$j->numGoles.">";
            ?>
            </p>
            <?php
                }
            ?>
            <input type="submit" name="volver" value="volver">
            <input type="submit" name="enviar" value="enviar">
        </form>
        <?php
          }
          else{
              
        ?>
        
        
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label>DNI</label>
            <input type="text" name="dni"
            <?php if(!empty($_POST["dni"])){
                if(!preg_match('/[0-9]{8}[a-zA-Z]/',$_POST["dni"])){
                    echo"></p><p>DNI 8 números y 1 letra</p";
                }
            } 
            ?>
            >
            <input type="submit" name="buscarDni" value="buscarDni">
        </form>
        <?php
          }
        ?>
        
    </body>
</html>

