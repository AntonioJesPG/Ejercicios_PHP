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

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Ejemplo: Tienda web. cesta.php -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 4: TIENDA-Listado de productos</title>
        <link href="tienda.css" rel="stylesheet" type="text/css">
    </head>
    <body class="pagcesta">
        <div id="contenedor">
            <div id="encabezado">
                <h1>Cesta de la compra</h1>
            </div>
            <div id="productos">
                <?php 
                $precioTotal = 0;
                if(isset($_SESSION["cesta"])){
                    foreach($_SESSION['cesta'] as $val => $cant){
                    $p = $conexion->query("SELECT * FROM producto where cod='".$val."'");
                    while($a = $p-> fetch(PDO::FETCH_ASSOC)){
                       echo"<p>".$a["nombre_corto"]." = ".$a["PVP"]." x ".$cant."</p>"; 
                       $precioTotal += $a["PVP"] * $cant;
                    }
                    }

                }
                    ?>
                <hr />
                <p><span class="pagar">Precio total: 	<?php echo$precioTotal; ?>	€</span></p>
                <form action="pagar.php" method="POST">
                    <p><span class="pagar"><input type="submit" name="pagar" value="Pagar"</span></p>
                </form>
            </div>
            <br class="divisor" />
            <div id="pie">
                <form action="logoff.php" method="POST">
                    <input type="submit" name="salir" value="Salir">
                </form>

		<p class='error'>   </p>
                
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
</head>
</html>
