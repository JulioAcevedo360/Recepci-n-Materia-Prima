<?php
    include "conexion.php";

    // Obtener los valores del formulario
    $nit = $_POST['nit'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    
    
    // Insertar los datos en la tabla Recepcion
    $query = "INSERT INTO proveedores (NIT, nombre, apellido) 
            VALUES ('$nit', '$nombre', '$apellido')";


    if (mysqli_query($conexion, $query)) {
        // Redirigir a la página de recepcion
        header("location: ../admiProveedores.php");
        exit;
    } else {
        echo "Error al registrar la recepción: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);


?>