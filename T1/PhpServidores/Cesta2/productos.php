<?php


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Ejemplo: Tienda web. productos.php -->
<?php
try{
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
    $conexion = new PDO('mysql:host=localhost;dbname=dwes', 'dwes', 'abc123.');
    $error = $conexion->errorInfo();
    echo $error[2];

    $encontrado = true;
    session_start();
if(!isset($_SESSION["nombre"])){
    header('Location: '.'login.php');
}
if(isset($_POST["vaciar"])){
    unset($_SESSION['cesta']);
}
    
if(isset($_POST["agregar"])){
    if(!isset($_SESSION['cesta'][$_POST['cod']])){
        $_SESSION['cesta'][$_POST['cod']] = 1;
    }
    else{
        $_SESSION['cesta'][$_POST['cod']]++;
    }
    }
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 4: TIENDA-Listado de productos</title>
        <link href="tienda.css" rel="stylesheet" type="text/css">
    </head>
    <body class="pagproductos">
        <div id="contenedor">
            <div id="encabezado">
                <h1>Listado de productos</h1>
            </div>
            <div id="cesta">
                <h3><img src="cesta.jpg" alt="Cesta" width="24" height="21">Cesta</h3>
                <hr />
                <form action="cesta.php" method="POST">
                    <?php 
                        if(isset($_SESSION["cesta"])){
                        foreach($_SESSION['cesta'] as $val => $cant){
                            $p = $conexion->query("SELECT * FROM producto where cod='".$val."'");
                            while($a = $p-> fetch(PDO::FETCH_ASSOC)){
                               echo"<p>".$a["nombre_corto"]." x ".$cant."</p>"; 
                            }

                        ?>
                        <input type="hidden" value="<?php echo$val; ?>" name="prodCesta[]">
                        <input type="hidden" value="<?php echo$cant ?>" name="prodCesta[]">
                    <?php             }} ?>
                    <input type="submit" name="comprar" value="Comprar" >
                </form>
                <form action="" method="POST">
                    <input type="submit" name="vaciar" value="Vaciar Cesta" >
                </form>
            </div>
            <div id="productos">

                <?php
                    $productos = $conexion->query("SELECT * FROM producto");
                    while($j = $productos-> fetch(PDO::FETCH_ASSOC)){

                ?>
                    <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <p><button type="submit" value="<?php $j["nombre_corto"] ?>" name="agregar">Agregar</button>
                        <input type="hidden" value="<?php echo$j["cod"] ?>" name="cod">
                        <input type="hidden" value="<?php echo$j["PVP"] ?>" name="pvp">
                        <?php echo$j["nombre_corto"]." ".$j["PVP"] ?></p>     
                    </form>
                <?php

                    }

                ?>

            </div>
            <br class="divisor" />
            <div id="pie">
                <form action="logoff.php" method="POST">
                    <input type="submit" name="salir" value="Salir ">
                </form>
             
                <p class='error'>  </p>";
                
            </div>
            
            
            
        </div>
    
    
    
    
    
    
</body>
    <?php 
}
     catch (PDOException $exc) {
            echo $exc->getTraceAsString(); 
            echo 'Error:' . $exc->getMessage(); 
            }
    ?>
</html>

