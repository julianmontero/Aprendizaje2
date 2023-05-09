<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

try{
   
    require "../config/db.config.php";
    
   $base=new PDO("mysql:host=localhost; dbname=$db_nombre" , "$db_usuario" , "$db_clave");
   $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql="SELECT * FROM usuarios WHERE id_usuario= :login AND clave= :password";
   $resultado=$base->prepare($sql);
   $login=  htmlentities(addslashes($_POST["login"]));
   $password=  htmlentities(addslashes($_POST["password"]));
   $resultado->bindvalue(":login", $login);
   $resultado->bindvalue(":password", $password);
   $resultado->execute();
   $numero_registro=$resultado->rowCount();
   
   if($numero_registro!=0){
       session_start();
       $_SESSION["usuario"]=$_POST["login"];
      header("location:../index.php?pagina=admin_sesion");
   }else{
        header ("location:../index.php?pagina=admin_sesion_error");        
} 
}catch (Exception $e){
    die("Error: " . $e->getMessage());
}
?>