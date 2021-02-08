<?php 
    try{  
    include_once 'Conexion.php';
    include_once 'Juegos.php';
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
    $conexion = new PDO('mysql:host=localhost;dbname=alquiler_juegos', 'dwes', 'abc123.');
    $error = $conexion->errorInfo();
    $conex = new Conexion($conexion);

    if(isset($_POST["enviar"])){
        
        $string = $_POST["nombreJuego"];
        $expr = '/(?<=\s|^)[a-z]/i';
        
        preg_match_all($expr,$string,$matches);
        $result = implode('',$matches[0]);
        $result = strtoupper($result);
        
        if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
            $fich_unic = time()."-".$_FILES['imagen']['name'];
            $ruta="img/".$fich_unic;
            
            move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);
            $juego = new Juegos($result,$_POST['nombreJuego'],$_POST['consola'],$_POST['anyo'],$_POST['precio'],$_POST['descripcion'],'NO',$ruta);
            $conex->insertarJuego($juego);
            header('Location: '.'AdministrarJuegos.php');
        }
        else{
            $juego = new Juegos($result,$_POST['nombreJuego'],$_POST['consola'],$_POST['anyo'],$_POST['precio'],$_POST['descripcion'],'NO',"");
            $conex->insertarJuego($juego);
            header('Location: '.'AdministrarJuegos.php');
        }
        
        
    }

?>

<form method="POST" action="" enctype="multipart/form-data">
    <label>Nombre Juego</label>
    <input type="text" name="nombreJuego"></p>
    <label>Consola</label>
    <input type="text" name="consola"></p>
    <label>Año</label>
    <input type="number" name="anyo" min="1990" max="2020" placeholder="2020"></p>
    <label>Precio</label>
    <input type="number" name="precio" min="1" placeholder="1"></p>
    <label>Descripción</label>
    <textarea name="descripcion" rows="4" cols="50"></textarea></p>
    <label>Imagen</label>    
    <input type="file" name="imagen"></p>
    <input type="submit" name="enviar" value="Enviar">
</form>
<a href="listadoJuegos.php"><button>Volver</button></a>
<?php 
    }        
    catch (PDOException $exc) {
        echo $exc->getTraceAsString(); 
        echo 'Error:' . $exc->getMessage(); 
    }
?>