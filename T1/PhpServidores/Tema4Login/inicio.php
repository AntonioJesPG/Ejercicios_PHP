<?php
try{
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
    $conexion = new PDO('mysql:host=localhost;dbname=tema4_logueo', 'dwes', 'abc123.');
    $error = $conexion->errorInfo();
    echo $error[2];

    $encontrado = false;
    
    session_start();
if(!isset($_SESSION["intentos"])){
    $_SESSION["intentos"] = 3;
}   
if($_SESSION["intentos"] == 0){
            header('Location: '.'intentos.php');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Ejemplo: Tienda web. login.php -->
    <?php     
    $usuarios = $conexion->query("SELECT * FROM tema4_logueo where user='".$_SESSION["usuario"]."'");
    if($j = $usuarios->fetchObject()){
        $colorTexto = $j->color_letra;
        $colorFondo = $j->color_fondo;
        $tipoLetra = $j->tipo_letra;
        $tamLetra = $j->tam_letra;
        ?>
<html>
    <style>
        body{
        <?php 
            echo"color:".$colorTexto.";";
            echo"background-color   :".$colorFondo.";";
            echo"font-size: ".$tamLetra."px;";
            echo"font-family: ".$tipoLetra.";";
        ?>
        }
    </style>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Inicio</title>
        <link href="tienda.css.css" rel="stylesheet" type="text/css">
    </head>
<body>
    <h1>Bienvenido <?php echo$j->Nombre; ?></h1>
    <?php 
    if(!isset($_POST["datos"])){
    ?> 
    <form method="post" action="">
        <input type="submit" value="Mis Datos" name="datos"><br/>
    </form>
    <?php 
    }
    else{
    ?>
    <h5>Nombre : <?php echo$j->Nombre; ?></h5>
    <h5>Apellido : <?php echo$j->Apellidos; ?></h5>
    <h5>Dirección : <?php echo$j->Direccion; ?></h5>
    <h5>Localidad : <?php echo$j->Localidad; ?></h5>
    <form method="post" action="">
        <input type="submit" value="Volver" name="volver"><br/>
    </form>
    <?php 
    }
    ?>
    <form method="post" action="login.php">
        <input type="submit" value="Salir" name="salir">
    </form>
<div>

</div>

<?php




?>
</body>
    <?php 
    
}}
     catch (PDOException $exc) {
            echo $exc->getTraceAsString(); 
            echo 'Error:' . $exc->getMessage(); 
            }
    ?>
</html>



