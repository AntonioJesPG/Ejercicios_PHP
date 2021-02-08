
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
try{
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
    $conexion = new PDO('mysql:host=localhost;dbname=dwes', 'dwes', 'abc123.');
    $error = $conexion->errorInfo();
    echo $error[2];

    $encontrado = true;
    session_start();
    
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
        <meta charset="UTF-8">
        <title>Listado productos</title>
    </head>
    <body>
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
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
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
            <input type="submit" value="vaciar" name="vaciar">
            <input type="submit" value="comprar" name="comprar">
    </body>
    <?php 
}
     catch (PDOException $exc) {
            echo $exc->getTraceAsString(); 
            echo 'Error:' . $exc->getMessage(); 
            }
    ?>
</html>

