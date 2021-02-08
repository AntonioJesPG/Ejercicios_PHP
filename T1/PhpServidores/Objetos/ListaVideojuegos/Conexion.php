<?php
require_once 'Juegos.php';

class Conexion {
    
    private $conexion;
    
    function __construct($conexion) {
        $this->conexion = $conexion;
    }
    
    function alquilarJuego($codigo){
        $alquilar = $this->conexion->prepare("UPDATE juegos SET Alguilado=? WHERE Codigo='".$codigo."';");
        $alquilado="SI";
        $alquilar->bindParam(1,$alquilado);
        $alquilar->execute();

        $alquilarJuego = $this->conexion->prepare("INSERT into alquiler (Cod_juego,DNI_cliente,Fecha_alquiler,Fecha_devol) values (?,?,?,?);");
        $cod = $codigo;
        $nombre = $_SESSION["nombre"];
        $fAl = date("Y-m-d");
        $fDel = date("Y-m-d");
        $alquiler = new Alquiler($cod,$nombre,$fAl, $fDel);

        $alquilarJuego->bindParam(1,$cod);
        $alquilarJuego->bindParam(2,$nombre);
        $alquilarJuego->bindParam(3,$fAl);
        $alquilarJuego->bindParam(4,$fDel);
        $alquilarJuego->execute();
    }
    
    function seleccionarJuegos(){
        $productos = $this->conexion->query("SELECT * FROM juegos");
        return $productos;
    }
    
    function seleccionarJuegosCliente(){
        $productos = $this->conexion->query("SELECT DISTINCT * FROM juegos j, alquiler a, cliente u where j.Alguilado='SI' AND j.Codigo=a.Cod_juego AND a.DNI_cliente=u.DNI AND u.DNI='".$_SESSION["nombre"]."'");
        return $productos; 
    }
    
    function devolverJuego($codigo){
        $alquilar = $this->conexion->prepare("UPDATE juegos SET Alguilado=? WHERE Codigo='".$codigo."';");
        $alquilado="NO";
        $alquilar->bindParam(1,$alquilado);
        $alquilar->execute();

        $alquilarJuego = $this->conexion->prepare("DELETE from alquiler where Cod_juego='".$codigo."' AND DNI_cliente='".$_SESSION["nombre"]."'");
        $alquilarJuego->execute();
    }
    
    function obtenerJuegosAlquilados(){
        $productos = $this->conexion->query("SELECT DISTINCT * FROM juegos j, alquiler a, cliente u where j.Alguilado='SI' AND j.Codigo=a.Cod_juego AND a.DNI_cliente=u.DNI");
        return$productos;     
    }
    
    function obtenerJuego($codigo){
        $productos = $this->conexion->query("SELECT  * FROM juegos where Codigo='".$codigo."'");
        if($juego = $productos->fetch(PDO::FETCH_ASSOC))
        $j = new Juegos($juego['Codigo'],$juego['Nombre_juego'],$juego['Nombre_consola'],$juego['Anno'],$juego['Precio'],$juego['descripcion'],$juego['Alguilado'],$juego['Imagen']);
        return$j;     
    }
    
    function obtenerJuegosNoAlquilados(){
        $productos = $this->conexion->query("SELECT DISTINCT * FROM juegos j where j.Alguilado='NO'");
        return$productos;
        
    }
    
    function insertarJuego(Juegos $juego){
        $insertarJuego = $this->conexion->prepare("INSERT into juegos (Codigo,Nombre_juego,Nombre_consola,Anno,Precio,Alguilado,Imagen,descripcion) values (?,?,?,?,?,?,?,?);");
        $cod = $juego->getCodigo();
        $nombre = $juego->getNombre_juego();
        $consola = $juego->getNombre_consola();
        $anno = $juego->getAnio();
        $precio = $juego->getPrecio();
        $alquilado = $juego->getAlquilado();
        $img = $juego->getImagen();
        $descripcion = $juego->getDescripcion();

        $insertarJuego->bindParam(1,$cod);
        $insertarJuego->bindParam(2,$nombre);
        $insertarJuego->bindParam(3,$consola);
        $insertarJuego->bindParam(4,$anno);
        $insertarJuego->bindParam(5,$precio);
        $insertarJuego->bindParam(6,$alquilado);
        $insertarJuego->bindParam(7,$img);
        $insertarJuego->bindParam(8,$descripcion);
        $insertarJuego->execute();
    }
    
    function modificarJuego(Juegos $juego){
        $modificarJuego = $this->conexion->prepare("Update juegos set Nombre_juego=?, Nombre_consola=?, Anno=?, Precio=?, Alquilado=?, Imagen=?, descripcion=? where Codigo='".$juego->getCodigo()."';");
        $nombre = $juego->getNombre_juego();
        $consola = $juego->getNombre_consola();
        $anno = $juego->getAnio();
        $precio = $juego->getPrecio();
        $alquilado = $juego->getAlquilado();
        $img = $juego->getImagen();
        $descripcion = $juego->getDescripcion();

        $modificarJuego->bindParam(1,$nombre);
        $modificarJuego->bindParam(2,$consola);
        $modificarJuego->bindParam(3,$anno);
        $modificarJuego->bindParam(4,$precio);
        $modificarJuego->bindParam(5,$alquilado);
        $modificarJuego->bindParam(6,$img);
        $modificarJuego->bindParam(7,$descripcion);
        $modificarJuego->execute();
    }
    
    function eliminarJuego(Juegos $juego){
        $eliminarJuego = $this->conexion->prepare("Delete from juegos where Codigo='".$juego->getCodigo()."';");
        $eliminarJuego->execute();
    }
}
