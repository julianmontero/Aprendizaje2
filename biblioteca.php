<h3> Biblioteca: Lista de libros referidos</h3>

<?php
       ini_set("display_errors","Off");
       require "config/db.config.php";
        $i=1;
        $conexion=mysqli_connect($db_host,$db_usuario,$db_clave,$db_nombre);
       
        if(mysqli_connect_errno()){
        
            echo "Fallo al conectar con la Base de datos";
            exit();
        
       }
        
        
        mysqli_set_charset($conexion, "utf8");

        
        $consulta="SELECT id_Libro, Titulo, Subtitulo, Apellido, Nombre, Portada_vinculo, Editorial, id_Autor, Edicion, Anio FROM`libros_1` LEFT JOIN `libros_autores_inter`ON libros_1.id_Libro=libros_autores_inter.libros_id LEFT JOIN `libros_autores`ON libros_autores_inter.autores_id=libros_autores.id_Autor LEFT JOIN `libros_editoriales`ON libros_1.Editorial_id=libros_editoriales.id_Editorial group by id_Libro Order by Titulo";
        
        $resultados=mysqli_query($conexion, $consulta);
        
	echo "<table class='tabla' summary='Tabla genérica'><tr><th>Nro</th><th>Portada</th><th>Título</th></tr>";
		
       while(($fila=mysqli_fetch_assoc($resultados))==true) {
        echo "<tr><td width='5%'>";
        echo  $i++ . "</td><td width='10%'>";
         echo "<img src='imagenes/portadas/". $fila[Portada_vinculo]."' title='". $fila[Titulo]." " . $fila[Subtitulo] . "' alt='' style='width:90%;'></td><td width='45%'>";
        echo $fila[Apellido]. ", ". $fila[Nombre] . ". (" . $fila[Anio]. ") " . $fila[Titulo].". " . $fila[Subtitulo] . "  Editorial " . $fila[Editorial] . "</td></tr>";
         
         
       }
         echo "</table>";
        mysqli_close($conexion); 

?>