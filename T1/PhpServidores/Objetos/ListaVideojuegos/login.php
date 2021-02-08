<?php
try{
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
    $conexion = new PDO('mysql:host=localhost;dbname=alquiler_juegos', 'dwes', 'abc123.');
    $error = $conexion->errorInfo();
    echo $error[2];
    session_start();
    if(isset($_POST["cerrarSesion"])){
        unset($_SESSION["nombre"]);
    }
    if(isset($_SESSION["mensaje"])){
        echo"<h3>Debe de identificarse para acceder a esta página</h3>";
    }
    $encontrado = false;
    
if(isset($_POST["enviar"]) && isset($_POST["usuario"]) && isset($_POST["password"])){

    $usuarios = $conexion->query("SELECT * FROM cliente where DNI='".$_POST["usuario"]."' && clave='".md5($_POST["password"])."'");
    if($usuarios->fetchObject()){

        $_SESSION["nombre"] = $_POST["usuario"]; 
        $encontrado = true;
    }else{
        $encontrado = false;
        echo"<h3>Datos erroneos</h3>";
    }
    
    if($encontrado == true){
        header('Location: '.'listadoJuegos.php');
    }
    }
    if(!isset($_POST["enviar"]) || $encontrado == false){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Ejemplo: Tienda web. login.php -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Alquiler de juegos</title>
    </head>
<body>

    <form action='login.php' method='post'>
        <legend>Login</legend>

        <label>Usuario:</label><br/>
        <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>

        <label>Contraseña:</label><br/>
        <input type='password' name='password' id='password' maxlength="50" /><br/>

        <input type='submit' name='enviar' value='Enviar' />
    </form>


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



