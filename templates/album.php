



<?php

    require "../lib/funciones.php";

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
    
    //Es decir que lo que esperamos que devuelva en este caso
    //Es:
    
    /*
    * $listado = Array(
    *      "salchobo_1.jpg",
    *      "salchobo_2.jpg",
    *      "salchobo_3.jpg",
    *      "salchobo_4.jpg",
    *      "salchobo_5.jpg",
    *      "salchobo_6.jpg"
    * );
    */
    
  

    $listado    =   leerDirectorio(PATH_IMAGENES,TRUE);
    
    if(!sizeof($listado)){
        die("No hay nada para mostrar :(");
    }//Else nuevamente IMPLICITO

    foreach($listado as $imagen){
        
        echo "$imagen";
  
    }
    
?>