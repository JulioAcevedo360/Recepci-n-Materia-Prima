<?php
    include "conexion.php";

    // Obtener los valores del formulario
    $usuario_id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['email'];
    $cedula = $_POST['cedula'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $rol = $_POST['rol'];
    

    // Insertar los datos en la tabla usuarios
    $query = "UPDATE usuarios
    SET nombre = '$nombre', apellido = '$apellido', correo = '$correo',
    cedula = '$cedula', usuario = '$usuario', rol = '$rol', clave = '$clave' 
    WHERE usuario_id = '$usuario_id'";


    if (mysqli_query($conexion, $query)) {
        // Redirigir a la página de administracion de usuarios
        header("location: ../admiUsuarios.php");
        exit;
    } else {
        echo "Error al registrar la recepción: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);


?>