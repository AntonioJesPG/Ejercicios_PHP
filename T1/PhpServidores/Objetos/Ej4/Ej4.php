<?php
include_once 'zona.php';
session_start();
if(!isset($_SESSION['principal'])){
    $_SESSION['principal'] = new Zona("Principal",1000);
    $_SESSION['compra'] = new Zona("Compra-Venta",200);
    $_SESSION['vip'] = new Zona("Vip",25);
}
?>

<h1>Bienvenido a Expocoches Campanilla</h1>
<p>Seleccione el número de entradas que desea</p>

<?php
if(isset($_POST['reservar'])){
    $_SESSION[$_POST['nZona']]->venderEntradas($_POST['plazas']);
}
?>


<form method="post" action="">
    <label> Zona </label>
    <select name='nZona'>
        <option value='principal'>Principal</option>
        <option value='compra'>Compra-Venta</option>
        <option value='vip'>Vip</option>
    </select>
    <select name='plazas'>
    <?php 
        for($i = 1; $i <= 1000; $i++){
            echo"<option value='".$i."'>".$i."</option>";
        }
    ?>
    </select>
    <input type='submit' name='reservar' value='reservar'>
</form>

<?php 

echo"<p>Zona principal: ".$_SESSION['principal']->getPlazasRestantes()." de ".$_SESSION['principal']->getPlazasTotales()." plazas</p>";
echo"<p>Zona principal: ".$_SESSION['compra']->getPlazasRestantes()." de ".$_SESSION['compra']->getPlazasTotales()." plazas</p>";
echo"<p>Zona principal: ".$_SESSION['vip']->getPlazasRestantes()." de ".$_SESSION['vip']->getPlazasTotales()." plazas</p>";
?>
