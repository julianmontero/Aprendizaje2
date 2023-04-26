<?php
       ini_set("display_errors","Off");
       require "config/db.config.php";
    
        $conexion=mysqli_connect($db_host,$db_usuario,$db_clave,$db_nombre);
 
        mysqli_close($conexion); 
        echo "Compras";

?>