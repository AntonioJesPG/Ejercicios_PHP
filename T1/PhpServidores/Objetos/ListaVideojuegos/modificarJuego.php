<?php 
    try{  
    include_once 'Conexion.php';
    include_once 'Juegos.php';
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
    $conexion = new PDO('mysql:host=localhost;dbname=alquiler_juegos', 'dwes', 'abc123.');
    $error = $conexion->errorInfo();
    $conex = new Conexion($conexion);

    if(isset($_POST["eliminar"])){
        $juego = $conex->obtenerJuego($_POST["eliminar"]);
        $conex->eliminarJuego($juego);
        header('Location: '.'AdministrarJuegos.php');
    }
    
    if(isset($_POST["modificar"])){
        $juego = $conex->obtenerJuego($_POST["modificar"]);
    }
    
    if(isset($_POST["enviar"])){
        
        $result = $_POST["codigo"];
        
        if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
            $fich_unic = time()."-".$_FILES['imagen']['name'];
            $ruta="img/".$fich_unic;
            
            move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);
            $juego = new Juegos($_POST['codigo'],$_POST['nombreJuego'],$_POST['consola'],$_POST['anyo'],$_POST['precio'],$_POST['descripcion'],'NO',$ruta);
            $conex->modificarJuego($juego);
            header('Location: '.'AdministrarJuegos.php');
        }
        else{
            $juego = new Juegos($_POST['codigo'],$_POST['nombreJuego'],$_POST['consola'],$_POST['anyo'],$_POST['precio'],$_POST['descripcion'],'NO',"");
            $conex->modificarJuego($juego);
            header('Location: '.'AdministrarJuegos.php');
        }
    }
?>

<form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="codigo" value="<?php echo$_POST["modificar"]; ?>">
    <label>Nombre Juego</label>
    <input type="text" name="nombreJuego" value="<?php echo$juego->getNombre_juego(); ?>"></p>
    <label>Consola</label>
    <input type="text" name="consola" value="<?php echo$juego->getNombre_consola(); ?>"></p>
    <label>Año</label>
    <input type="number" name="anyo" min="1990" max="2020" placeholder="2020" value="<?php echo$juego->getAnio(); ?>"></p>
     <label>Precio</label>
    <input type="number" name="precio" min="1" placeholder="1" value="<?php echo$juego->getPrecio(); ?>"></p>
     <label>Descripcion</label>
    <textarea name="descripcion" rows="4" cols="50"><?php echo$juego->getDescripcion(); ?></textarea></p>
     <label>Imagen</label>
    <input type="file" name="imagen" value="<?php echo$juego->getImagen(); ?>"></p>
    <input type="submit" name="enviar" value="Enviar">
</form>

<?php 
    }        
    catch (PDOException $exc) {
        echo $exc->getTraceAsString(); 
        echo 'Error:' . $exc->getMessage(); 
    }
?>