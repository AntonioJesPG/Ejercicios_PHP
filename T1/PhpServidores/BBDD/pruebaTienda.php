<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $conexion = new mysqli('localhost','dwes','abc123.','dwes');
            if($conexion->connect_errno){
                
                echo"<p>Error de conexión</p>";
                
            }else{
            $productos = $conexion->query('SELECT * from producto');
                if(!$conexion->errno){

        ?>
        
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <select name="seleccion">
                <?php 
                   while($nombres = $productos-> fetch_array()){
                       
                        echo'<option value="'.$nombres["cod"].'"';
                        if(!empty($_POST["seleccion"]) && $nombres["cod"] == $_POST["seleccion"]){
                           echo'selected';
                        }
                        echo'>'.$nombres["nombre_corto"].'</option>';
                    }
                ?>
            </select>
            <input type="submit" value="Enviar" name="enviar"/>
        </form>
        <?php 
        
        if(!empty($_POST["actualizar"])){
                   $stock = $conexion->query('SELECT t.cod,s.unidades from stock s, tienda t where s.producto="'.$_POST["seleccion"].'" AND s.tienda = t.cod;');
                   $i = 0;
                   $agregar = $conexion->stmt_init();
                   while($stockn = $stock-> fetch_array()){
                        $agregar->prepare('UPDATE stock SET unidades=? WHERE producto=? AND tienda="'.$stockn["cod"].'"');
                        $unidad = $_POST["unidades"][$i];
                        $seleccion = $_POST["seleccion"];
                        $agregar->bind_param('ss', $unidad, $seleccion);
                        $agregar->execute();
                        $i++;
                   }
                   $agregar->close();
        }
        
        if(!empty($_POST["seleccion"])){
                
            $stock = $conexion->query('SELECT t.nombre,s.unidades from stock s, tienda t where s.producto="'.$_POST["seleccion"].'" AND s.tienda = t.cod;');
               if($conexion->errno){
                 echo"<p>Error al obtener el stock</p>";  
               }
               else{
            echo"<h1>STOCK en la tiendas</h1>";
            echo"<form name='input' action=".$_SERVER['PHP_SELF']." method='post'>"; 
  
            while($stockn = $stock-> fetch_array()){
             echo"<p>Tienda ".$stockn["nombre"]." - unidades <input type='text' name='unidades[]' value='".$stockn["unidades"]."'><p>";   
                }
            
            echo"<input type='hidden' name='seleccion' value='".$_POST["seleccion"]."'>"; 
            echo"<input type='submit' name='actualizar' value='actualizar'/>";
            echo"</form>";
               }
            }
               
                }
            }
        
        
        ?>
    </body>
</html>

