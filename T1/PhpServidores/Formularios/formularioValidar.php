<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        
        if(!empty($_POST["nombre"])&& preg_match('/^[a-z]{0,30}$/i',$_POST["nombre"]) && !empty($_POST["DNI"]) && preg_match('/^[0-9]{8}[a-z]{1}$/i',$_POST["DNI"]) && !empty($_POST["fechaNac"]) && preg_match('/^[0-9]{2}-[0-9]{2}-[0-9]{4}$/',$_POST["fechaNac"]) && !empty($_POST["edad"]) && preg_match('/^(?:[1-9]\d{2,}+|[2-9]\d|1[89])$/',$_POST["edad"])){
            echo"<p>Nombre : ".$_POST["nombre"]."</p>";
            echo"<p>DNI : ".$_POST["DNI"]."</p>";
            echo"<p>Fecha Nacimiento : ".$_POST["fechaNac"]."</p>";
            echo"<p>Edad : ".$_POST["edad"]."</p>";
        }
        else{
        ?>
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label>Nombre</label>
            <input type="text" name="nombre"
            <?php if(!empty($_POST["nombre"])){
                if(preg_match('/^[a-z]{1,30}$/i',$_POST["nombre"])){
                    echo"value='".$_POST["nombre"]."'";
                }
                else{
                    echo"></p><p>Nombre ha de tener 0-30 letras</p";
                }
            } 
            ?>
            ></p>
            <label>DNI</label>
            <input type="text" name="DNI"
            <?php if(!empty($_POST["DNI"])){
                if(preg_match('/^[0-9]{8}[a-z]{1}$/i',$_POST["DNI"])){
                    echo"value='".$_POST["DNI"]."'";
                }
                else{
                    echo"></p><p>DNI debe tener 8 digitos y 1 letra</p";
                }
            } 
            ?>
            ></p>
            <label>Fecha Nacimiento</label>
            <input type="text" name="fechaNac"
            <?php if(!empty($_POST["fechaNac"])){
                if(preg_match('/^[0-9]{2}-[0-9]{2}-[0-9]{4}$/',$_POST["fechaNac"])){
                    echo"value='".$_POST["fechaNac"]."'";
                }
                else{
                    echo"></p><p>Fecha formato dd-mm-yyyy</p";
                }
            } 
            ?>
            ></p>
            <label>Edad</label>
            <input type="text" name="edad"
            <?php if(!empty($_POST["edad"])){
                if(preg_match('/^(?:[1-9]\d{2,}+|[2-9]\d|1[89])$/',$_POST["edad"])){
                    echo"value='".$_POST["edad"]."'";
                }
                else{
                    echo"></p><p>Edad >= 18</p";
                }
            } 
            ?>
            ></p>
            <input type="submit" name="aceptar" value="aceptar"></p>
        </form>
        <?php
            }
        ?>
    </body>
</html>

