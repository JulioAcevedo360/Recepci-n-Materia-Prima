<?php
    include "conexion.php";

    // Obtener los valores del formulario
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    
    
    // Insertar los datos en la tabla Recepcion
    $query = "INSERT INTO conductores (cedula, nombre, apellido) 
            VALUES ('$cedula', '$nombre', '$apellido')";


    if (mysqli_query($conexion, $query)) {
        // Redirigir a la página de recepcion
        header("location: ../admiConductores.php");
        exit;
    } else {
        echo "Error al registrar la recepción: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);


?>