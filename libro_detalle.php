<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Data Science: Libros</title>
<link href="css/multiColumnTemplate.css" rel="stylesheet" type="text/css">
<link href="css/tablas.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
  <header>
    <div class="primary_header">
      <h1 class="title">Data Science: Libros</h1>
    </div>
    <nav class="secondary_header" id="menu">
		 <?php
		require TEMPLATE_PATH.'/menuds.php';?>
    </nav>
  </header>
  <section>
    <h2 class="noDisplay">Main Content</h2>
    <article class="">
      <?php
       ini_set("display_errors","Off");
       require "config/db.config.php";
        $i=1;
        $conexion=mysqli_connect($db2_host,$db2_usuario,$db2_clave,$db2_nombre);
       
        if(mysqli_connect_errno()){
        
            echo "Fallo al conectar con la Base de datos";
            exit();
        
       }
        
        
        mysqli_set_charset($conexion, "utf8");

        
        $consulta="SELECT id_Libro, Titulo, Subtitulo, Apellido, Nombre, Portada_vinculo, Editorial, id_Autor, Edicion, Anio, Link, Link_afiliado, Link_muestra FROM`libros_1` LEFT JOIN `libros_autores_inter`ON libros_1.id_Libro=libros_autores_inter.libros_id LEFT JOIN `libros_autores`ON libros_autores_inter.autores_id=libros_autores.id_Autor LEFT JOIN `libros_editoriales`ON libros_1.Editorial_id=libros_editoriales.id_Editorial WHERE id_Libro = 588 group by id_Libro";
        
        $resultados=mysqli_query($conexion, $consulta);
        
	 
		
       while(($fila=mysqli_fetch_assoc($resultados))==true) {
        
        echo "<h3>".$fila["Apellido"]. ", ". $fila["Nombre"] . ". (" . $fila["Anio"]. ") " . $fila["Titulo"].". " . $fila["Subtitulo"] . " " . $fila["Editorial"] . " ".$fila["Link_afiliado"] . " ".$fila["Link_muestra"] . "</h3>";
		    echo "<br><br><img src='imagenes/portadas/". $fila["Portada_vinculo"] . "' title='". $fila["Titulo"] . "' alt='' style='width:15%;'></a> ";
         
         
       }
         echo "</table>";
        mysqli_close($conexion); 

?>
		
	<br>	<a href="archivos/L-Aprende-ML-Bagnato.pdf" target="_blank" onClick="ga('send', 'event', 'enlace', 'click', 'L-Aprende-ML-Bagnato', 1 );">descargar pdf</a>
		
		
      <p></p>
    </article>
   
  </section>
  <div class="row">
    <div class="columns">
      <p class="thumbnail_align"> <img src="images/bkg_06.jpg" alt="" class="thumbnail"/> </p>
      <h4>TITLE</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
    </div>
    <div class="columns">
      <p class="thumbnail_align"> <img src="images/bkg_06.jpg" alt="" class="thumbnail"/> </p>
      <h4>TITLE</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
    </div>
    <div class="columns">
      <p class="thumbnail_align"> <img src="images/bkg_06.jpg" alt="" class="thumbnail"/> </p>
      <h4>TITLE</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
    </div>
    <div class="columns">
      <p class="thumbnail_align"> <img src="images/bkg_06.jpg" alt="" class="thumbnail"/> </p>
      <h4>TITLE</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
    </div>
  </div>
  <div class="row blockDisplay">
    <div class="column_half left_half">
      <h2 class="column_title">LEFT COLUMN</h2>
    </div>
    <div class="column_half right_half">
      <h2 class="column_title">RIGHT COLUMN</h2>
    </div>
  </div>
  <div class="social">
    <p class="social_icon"><img src="images/bkg_06.jpg" width="100" alt="" class="thumbnail"/></p>
    <p class="social_icon"><img src="images/bkg_06.jpg" width="100" alt="" class="thumbnail"/></p>
    <p class="social_icon"><img src="images/bkg_06.jpg" width="100" alt="" class="thumbnail"/></p>
    <p class="social_icon"><img src="images/bkg_06.jpg" width="100" alt="" class="thumbnail"/></p>
  </div>
  <footer class="secondary_header footer">
    <div class="copyright">&copy;2015 - <strong>SIMPLE Theme</strong></div>
  </footer>
</div>
</body>
</html>
