
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
try{
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
    $conexion = new PDO('mysql:host=localhost;dbname=usuarios', 'dwes', 'abc123.');
    $error = $conexion->errorInfo();
    echo $error[2];

    $encontrado = true;
    session_start();
    
if(isset($_POST["enviar"]) && isset($_POST["usuario"]) && isset($_POST["password"])){
    if(!isset($_SESSION[$_POST["usuario"]])){
    $usuarios = $conexion->query("SELECT * FROM usuario where user='".$_POST["usuario"]."' && password='".md5($_POST["password"])."'");
    if($usuarios->fetchObject()){
        $_SESSION[$_POST["usuario"]][] = date("d-m-y h:i:s"); 
    }    else{
        $encontrado = false;
        echo"<h3>Datos erroneos</h3>";
    }
    }
    else{
        $_SESSION[$_POST["usuario"]][] = date("d-m-y h:i:s"); 
        
    }
    if($encontrado == true){
        header('Location: '.'productos.php');
    }
    }
    if(!isset($_POST["enviar"]) || $encontrado == false){
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label>Usuario</label>
            <input type="text" name="usuario" <?php if(isset($_POST["recordarme"])){ echo"value='".$_POST["usuario"]."'"; }?>>

            <p/>
            <label>Password</label>
            <input type="password" name="password" <?php if(isset($_POST["recordarme"])){ echo"value='".$_POST["password"]."'"; }?>>
            </p>
            <input type="submit" value="enviar" name="enviar">
    </body>
    <?php 
    
}}
     catch (PDOException $exc) {
            echo $exc->getTraceAsString(); 
            echo 'Error:' . $exc->getMessage(); 
            }
    ?>
</html>
