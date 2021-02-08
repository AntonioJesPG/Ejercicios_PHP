<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
          if(!empty($_POST["nombre"]) && preg_match('/^[a-zA-Z]+$/',$_POST["nombre"]) && !empty($_POST["dni"]) && preg_match('/[0-9]{8}[a-zA-Z]/',$_POST["dni"]) && !empty($_POST["dorsal"]) && !empty($_POST["posicion"]) && !empty($_POST["equipo"]) && !empty($_POST["goles"]) && preg_match('/[0-9]{1,3}/',$_POST["goles"])){
              
              $conexion = new mysqli('localhost','dwes','abc123.','futbol');
                 if($conexion->connect_errno){
                    echo"<p>Error de conexión</p>";
                    }
                else{
                $posicion =0;
                foreach($_POST["posicion"] as $pos => $value){
                    $posicion += $value;
                }
                $conexion -> query("INSERT into jugador (nombre,dni,dorsal,posicion,equipo,numGoles) values ('".$_POST["nombre"]."','".$_POST["dni"]."','".$_POST["dorsal"]."','".$posicion."','".$_POST["equipo"]."','".$_POST["goles"]."');");
                echo"<p>Jugador introducido correctamente </p>";
                echo"<a href='index.php'><button>Volver</button></a>";
                
                }
          }
          else{
              if(!empty($_POST["enviar"])){
                  echo"<p>Debe completar todos los campos</p>";
              }
        ?>
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label>Nombre</label>
            <input type="text" name="nombre"
            <?php if(!empty($_POST["nombre"])){
                if(preg_match('/^[a-zA-Z]+$/',$_POST["nombre"])){
                    echo"value='".$_POST["nombre"]."'";
                }
                else{
                    echo"></p><p>Nombre ha de contener solo letras</p";
                }
            } 
            ?>
            ></p>
            <label>DNI</label>
            <input type="text" name="dni"
            <?php if(!empty($_POST["dni"])){
                if(preg_match('/[0-9]{8}[a-zA-Z]/',$_POST["dni"])){
                    echo"value='".$_POST["dni"]."'";
                }
                else{
                    echo"></p><p>DNI 8 números y 1 letra</p";
                }
            } 
            ?>
            ></p>
            <label>Dorsal</label>
            <select  name="dorsal">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
            </select></p>
            <label>Posicion</label>
            <select multiple size="4" name="posicion[]">
                <option value="1">Portero</option>
                <option value="2">Defensa</option>
                <option value="4">Centrocampista</option>
                <option value="8">Delantero</option>       
            </select></p>
            <label>Equipo</label>
            <input type="text" name="equipo"
            <?php if(!empty($_POST["equipo"])){
               echo"value='".$_POST["equipo"]."'";
                } 
            ?>
            ></p>
            <label>Goles</label>
            <input type="text" name="goles"
            <?php if(isset($_POST["goles"])){
                if(preg_match('/^[0-9]{1,3}$/',$_POST["goles"])){
                    echo"value='".$_POST["goles"]."'";
                }
                else{
                    echo"></p><p>Goles solo pueden ser números</p";
                }
            } 
            ?>
            ></p>
            <input type="submit" name="enviar" value="enviar">
        </form>
        <?php 
          }
        ?>
    </body>
</html>

