<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $reservado = false;
        $combinacion = false;
        $conexion = new mysqli('localhost','dwes','abc123.','autobuses');
        if($conexion->connect_errno){     
            echo"<p>Error de conexión</p>";   
        }
        
        if(isset($_POST["reservar"])){
            
            $plazas = $_POST["plazas"] - $_POST["pReservadas"];
            $reserva = $conexion->query("UPDATE viajes SET Plazas_libres='".$plazas."' WHERE Fecha='".$_POST["fecha"]."' && Origen='".$_POST["origen"]."' && Destino='".$_POST["destino"]."';");
            $reservado = true;
            /*if(!$conexion->errno){
                /*echo"<p>Reservado correctamente</p>";
                echo"<form name='input'>";
                echo"<input type='submit' value='volver' name='volver'>";
                echo"</form>";
            }*/
            
        }
        if(isset($_POST["enviar"])){
            $reserva = $conexion->query("SELECT Plazas_libres FROM viajes WHERE Fecha='".$_POST["fecha"]."' && Origen='".$_POST["origen"]."' && Destino='".$_POST["destino"]."';");
            if(!$conexion->errno){
                if($j = $reserva->fetch_object()){
                    $plazas = $j->Plazas_libres;
        ?>
        
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            
            <label>Fecha</label>
            <input type="date"  name="fecha" value="<?php echo$_POST["fecha"]; ?>" readonly></p>
            <label>Origen</label>
            <input  name="origen" value="<?php echo$_POST["origen"]; ?>" readonly></p>
            <label>Destino</label>
            <input  name="destino" value="<?php echo$_POST["destino"]; ?>" readonly></p>
            <label>Plazas disponibles</label>
            <input  name="plazas" value="<?php echo$plazas; ?>" readonly></p>
            <label>Plazas a Reservar</label>
            <select name="pReservadas">
            <?php 
                for($i = 1; $i <= $plazas ; $i++){
                    echo"<option value='".$i."'>".$i."</option>";
                }
            ?>
            </select></p>
            <?php if($plazas != "0"){ ?>
            <input type="submit" name="reservar" value="reservar">
            <?php }
            echo"<input type='submit' value='volver' name='volver'>";
            ?>
        </form>
        
        <?php
}
                else{
                    $combinacion = true;
                    
                }
            }
            else{
                echo"<p> Error en la fecha introducida</p>";
            }
        }
        if(!isset($_POST["enviar"]) || $combinacion == true){
        ?>
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <?php if($reservado == true){ echo"<h3> Reserva realizada correctamente </h3>"; } ?>
            <?php if($combinacion == true){ echo"<h3> No existen viajes para su combinación </h3>"; } ?>
            <label>Fecha</label>
            <?php
            ?>
            <input type="date"  name="fecha"></p>
            <label>Origen</label>
            <select  name="origen">
             <?php
             $buses = $conexion->query("SELECT DISTINCT Origen from viajes");
                while($j = $buses-> fetch_object()){
                for($i = 0; $i< count($j); $i++){
                    echo"<option value='".$j->Origen."'";
                    echo">".$j->Origen."</option>";
                }
                }
            ?>
            </select></p>
            <label>Destino</label>
            <select  name="destino">
            <?php
                $buses = $conexion->query("SELECT DISTINCT Destino from viajes");
                while($j = $buses-> fetch_object()){
                for($i = 0; $i< count($j); $i++){
                    echo"<option value='".$j->Destino."'";
                    echo">".$j->Destino."</option>";
                }
                }
            ?>
            </select></p>
            <?php 
            ?>
            <input type="submit" name="enviar" value="enviar">
        </form>
        <?php 
        }  
        
        ?>
    </body>
</html>
