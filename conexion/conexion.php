<?php

//variables para establecer conexión a base de datos mediante servidor xampp

$servidor = "localhost";
$usuario = "root";
$clave = "";
$db = "formatorecibo";


// crear conexión

$conexion = new mysqli($servidor, $usuario, $clave, $db);

//comentado porque me causa problemas
// if($conexion){
//     echo "conexion establecida";
// }
// else{
//     echo "Error: no se pudo conectar";
// }

?>