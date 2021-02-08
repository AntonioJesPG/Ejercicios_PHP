<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $conexion = new mysqli('localhost','dwes','abc123.','dwes');
            if(!$conexion->connect_errno){
                
                
                
            }
            echo $conexion->connect_errno."</p>";
            echo $conexion->connect_error."</p>";
            //echo $conexion->server_info;    
        ?>
    </body>
</html>

