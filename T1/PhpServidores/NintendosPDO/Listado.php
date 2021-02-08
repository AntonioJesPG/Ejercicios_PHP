<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        try{
            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
            $conexion = new PDO('mysql:host=localhost;dbname=dwes', 'dwes', 'abc123.');
            $error = $conexion->errorInfo();
            echo $error[2];

            $productos = $conexion->query("SELECT * FROM familia");

            
        ?>
        
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <select name="seleccion">
                <?php 
                   while($nombres = $productos-> fetch(PDO::FETCH_ASSOC)){
                       
                        echo'<option value="'.$nombres["cod"].'"';
                        if(!empty($_POST["seleccion"]) && $nombres["cod"] == $_POST["seleccion"]){
                           echo'selected';
                        }
                        echo'>'.$nombres["nombre"].'</option>';
                    }
                ?>
            </select>
            <input type="submit" value="Enviar" name="enviar"/>
        </form>
        <?php 
     
        if(!empty($_POST["seleccion"])){
                
            $stock = $conexion->query('SELECT * from producto p where p.familia="'.$_POST["seleccion"].'"');

            echo"<h1>STOCK en la tiendas</h1>";
            echo"<form name='input' action='Editar.php' method='post'>"; 
  
            while($stockn = $stock-> fetch(PDO::FETCH_ASSOC)){
             echo"<p>Producto ".$stockn["nombre_corto"]." - PVP ".$stockn["PVP"]."  <button type='submit' value='".$stockn["cod"]."' name='editar'>Editar</button><p>";   
                }
            
            echo"<input type='hidden' name='seleccion' value='".$_POST["seleccion"]."'>"; 
            echo"</form>";
               }
             
            }
            catch (PDOException $exc) {
            echo $exc->getTraceAsString(); 
            echo 'Error:' . $exc->getMessage(); 
            }
            
        ?>
    </body>
</html>

