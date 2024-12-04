<?php
    include "conexion.php";

    // Obtener los valores del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $cedula = $_POST['cedula'];
    $usuario = $_POST['usuario'];
    $rol = $_POST['rol'];
    $clave = $_POST['clave'];
    
    // Insertar los datos en la tabla Recepcion
    $query = "INSERT INTO usuarios (nombre, apellido, correo, cedula, usuario, rol, clave) 
            VALUES ('$nombre', '$apellido', '$email', '$cedula', '$usuario', '$rol', '$clave')";


    if (mysqli_query($conexion, $query)) {
        // Redirigir a la página de recepcion
        header("location: ../admiUsuarios.php");
        exit;
    } else {
        echo "Error al registrar la recepción: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);


?>