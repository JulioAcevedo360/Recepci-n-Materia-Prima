<?php
    include "conexion.php";

    // Obtener los valores del formulario
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    
    

    // Insertar los datos en la tabla Conductores
    $query = "UPDATE conductores
    SET nombre = '$nombre', apellido = '$apellido' 
    WHERE cedula = '$cedula'";


    if (mysqli_query($conexion, $query)) {
        // Redirigir a la página de administracion de usuarios
        header("location: ../admiConductores.php");
        exit;
    } else {
        echo "Error al registrar la recepción: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);


?>