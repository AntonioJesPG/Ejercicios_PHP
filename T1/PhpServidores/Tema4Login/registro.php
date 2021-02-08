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
if(isset($_SESSION["usuario"])){
    header('Location: '.'inicio.php');
}
if(isset($_POST["usuario"])){
    $email = $_POST["usuario"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "El formato de email no es correcto";
    }
}

if(isset($_POST["enviar"]) && isset($_POST["usuario"]) && isset($_POST["password"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["direccion"]) && isset($_POST["localidad"]) && isset($_POST["colorLetra"]) && isset($_POST["colorFondo"]) && isset($_POST["tipoLetra"]) && isset($_POST["tamanioLetra"])
            && preg_match("/^[a-zA-Z]{1,50}$/i", $_POST["nombre"]) && preg_match("/^[a-zA-Z]{1,50}$/i", $_POST["apellido"]) && preg_match("/^[a-zA-Z ]{1,50}$/i", $_POST["direccion"]) && preg_match("/^[a-zA-Z]{1,50}$/i", $_POST["localidad"]) && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match("/^[a-zA-Z0-9]{1,50}$/i", $_POST["password"])){
                $introducir = "INSERT into tema4_logueo (Nombre,Apellidos,Direccion,Localidad,user,pass, color_letra, color_fondo, tipo_letra, tam_letra) values (?,?,?,?,?,?,?,?,?,?);";
                $password = md5($_POST["password"]);
                $intr = $conexion -> prepare($introducir);
                 if($intr -> execute([$_POST["nombre"],$_POST["apellido"],$_POST["direccion"],$_POST["localidad"],$_POST["usuario"],$password,$_POST["colorLetra"],$_POST["colorFondo"],$_POST["tipoLetra"],$_POST["tamanioLetra"]])){
                     $_SESSION["usuario"] = $_POST["usuario"];
                     header('Location: '.'inicio.php');
                 }
                 else{
                     $fallado = true;
                     echo"<p style='color:red'>El usuario ya existe en el sistema, use otro email</p>";
                     
            }}else{
                $fallado = true;
            }
if(!isset($_POST["enviar"]) || $fallado == true){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Ejemplo: Tienda web. login.php -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 4: TIENDA</title>
        <link href="tienda.css.css" rel="stylesheet" type="text/css">
    </head>
<body>
<div>
    <form action='' method='post'>
     <fieldset >
        <legend>Registro</legend>
        <div><span class='error'>	</span></div>
        <div class='campo'>
        <label for='nombre' >Nombre:</label><br/>
        <input type='text' name='nombre' id='nombre' maxlength="50" <?php if(isset($_POST["nombre"]) && preg_match("/^[a-zA-Z]{1,50}$/i", $_POST["nombre"])){ echo"value='".$_POST["nombre"]."'"; }?> /><br/>
        <?php 
        if(isset($_POST["nombre"]) && !preg_match("/^[a-zA-Z]{1,50}$/i", $_POST["nombre"])){
            echo"<p style='color:red'>El nombre solo puede contener letras </p>";
        } ?>
    </div>
        <div class='campo'>
        <label for='apellido' >Apellido:</label><br/>
        <input type='apellido' name='apellido' id='apellido' maxlength="50" <?php if(isset($_POST["apellido"]) && preg_match("/^[a-zA-Z]{1,50}$/i", $_POST["apellido"])){ echo"value='".$_POST["apellido"]."'"; }?> /><br/>
        <?php 
        if(isset($_POST["apellido"]) && !preg_match("/^[a-zA-Z]{1,50}$/i", $_POST["apellido"])){
            echo"<p style='color:red'>El apellido solo puede contener letras </p>";
        } ?>
    </div>
        <div class='campo'>
        <label for='direccion' >Dirección:</label><br/>
        <input type='direccion' name='direccion' id='direccion' maxlength="50" <?php if(isset($_POST["direccion"]) && preg_match("/^[a-zA-Z ]{1,50}$/i", $_POST["direccion"])){ echo"value='".$_POST["direccion"]."'"; }?>/><br/>
        <?php 
        if(isset($_POST["direccion"]) && !preg_match("/^[a-zA-Z ]{1,50}$/i", $_POST["direccion"])){
            echo"<p style='color:red'>La direccion no puede estar vacia </p>";
        } ?>
    </div>
        <div class='campo'>
        <label for='localidad' >Localidad:</label><br/>
        <input type='localidad' name='localidad' id='localidad' maxlength="50" <?php if(isset($_POST["localidad"]) && preg_match("/^[a-zA-Z]{1,50}$/i", $_POST["localidad"])){ echo"value='".$_POST["localidad"]."'"; }?>/><br/>
        <?php 
        if(isset($_POST["localidad"]) && !preg_match("/^[a-zA-Z]{1,50}$/i", $_POST["localidad"])){
            echo"<p style='color:red'>El nombre solo puede contener letras </p>";
        } ?>
    </div>
    <div class='campo'>
        <label for='usuario' >Email:</label><br/>
        <input type='text' name='usuario' id='usuario' maxlength="50" <?php if(isset($_POST["usuario"]) && filter_var($email, FILTER_VALIDATE_EMAIL)){ echo"value='".$_POST["usuario"]."'"; }?>/><br/>
        <?php 
        if(isset($_POST["usuario"]) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo"<p style='color:red'>".$emailErr."</p>";
        } ?>
    </div>
    <div class='campo'>
        <label for='password' >Contraseña:</label><br/>
        <input type='password' name='password' id='password' maxlength="50" /><br/>
        <?php 
        if(isset($_POST["enviar"]) && empty($_POST["password"])){
            echo"<p style='color:red'>La contraseña no puede estar vacia </p>";
        } ?>
    </div><br/>
    <select name="colorLetra" id="colorLetra">
          <option value="red">Rojo</option>
          <option value="blue">Azul</option>
          <option value="green">Verde</option>
          <option value="yellow">Amarillo</option>
        </select>
        <select name="colorFondo" id="colorFondo">
          <option value="red">Rojo</option>
          <option value="blue">Azul</option>
          <option value="green">Verde</option>
          <option value="yellow">Amarillo</option>
        </select>
        <select name="tipoLetra" id="tipoLetra">
          <option value="monospace">MonoSpace</option>
          <option value="arial">Arial</option>
          <option value="serif">Serif</option>
          <option value="fantasy">Fantasy</option>
        </select>
        <select name="tamanioLetra" id="tamanioLetra">
          <option value="10">10</option>
          <option value="20">20</option>
          <option value="30">30</option>
          <option value="40">40</option>
        </select>
    <div class='campo'>
        <a href="login.php"><button type="button" name="volver" value="volver">Volver</button></a>
        <input type='submit' name='enviar' value='Enviar' />
    </div>
      </fieldset>
    </form>
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





