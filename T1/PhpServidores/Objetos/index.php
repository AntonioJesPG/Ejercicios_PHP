<html>
    <head>
        
    </head>
    <body>
        <?php
        
        require_once 'Persona.php';
        $p = new Persona("Judas", "Tadeo", "57");
        echo$p->nombre;
        echo"</p>";
        $p->nombre = 'Knekro';
        echo$p->nombre;
        echo"</p>";
        echo$p
        ?>
    </body>
</html>