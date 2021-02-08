<h1>Pago realizado correctamente</h1>
<form name="input" action="productos.php" method="post">
    <?php 
    session_start();
    unset($_SESSION['cesta']);
    ?>
    <input type="submit" name="seguir" value="Seguir Comprando">
</form>
<form name="input" action="logoff.php" method="post">
    <input type="submit" name="salir" value="salir">
</form>

