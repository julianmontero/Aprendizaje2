<!DOCTYPE>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name= "Description" content="Proceso de negociación"/>
<title>egociación por principios</title>
    <link rel="stylesheet" href="../../css/default.css" type="text/css" media="screen" />
   
    <link rel="stylesheet"href="../../css/menu_horizontal.css" />
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<style>
    #galeria {
        margin:0 auto 0 auto;
      
        width:800px;
        height:600px;
        /*Sombra*/
        -webkit-box-shadow: 0px 1px 5px 0px #4a4a4a;
        -moz-box-shadow: 0px 1px 5px 0px #4a4a4a;
        box-shadow: 0px 1px 5px 0px #4a4a4a;
    }
   
</style>

    <script type="text/javascript" src="../../scripts/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="../../scripts/jquery.nivo.slider.pack.js"></script>

<script type="text/javascript">
            $(window).load(function() {
                    $('#slider').nivoSlider({
                        pauseTime: 15000
                    });
            });
    </script>
<?php
		require TEMPLATE_PATH.'/Analytics.php';?>
</head>


<div id="encabezado">

   <header>

</header> 

</div>
<body>
  
  

    
<div id="galeria">

<div id="slider" class="nivoSlider">

<?php

    require "../../lib/funciones.php";

    //Las constantes NO varian el valor se mantiene durante
    //La ejecucion de todo el programa.
    
    define("PATH_IMAGENES","img");
    
    //Lo que queremos hacer:
    //
    //Queremos leer los archivos los cuales se encuentran
    //albergados en la constante PATH_IMAGENES
    
    //Como lo hacemos?

    //Primero, creamos una funcion la cual se va a llamar leer directorio
    //Esta funcion, como primer parametro toma un directorio
    //Como valor de retorno, vamos a obtener una coleccion (Array) de 
    //archivos, los cuales estan dentro de dicho directorio.
    
   

   

    $listado    =   leerDirectorio(PATH_IMAGENES,TRUE);
    sort($listado);
    
    if(!sizeof($listado)){
        die("No hay nada para mostrar :(");
    }//Else nuevamente IMPLICITO

    foreach($listado as $imagen){
        
        echo "<img width=\"600\" src=\"$imagen\">";
  
    }
    
?>
   
</div>
      <div id="eval">
    <div id="eval_I">
    <a href="../../index.php">volver al inicio</a> </div>  
    <div id="eval_D">
    <a href="../../index.php?pagina=autoevaluacion_c2_01_negociacion">Hacer Autoevaluación</a> 
</div>
</div>
</div>

</body>
</html>