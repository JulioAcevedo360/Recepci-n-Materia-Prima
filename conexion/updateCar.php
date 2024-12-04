<?php
    include "conexion.php";

    // Obtener los valores del formulario
    $placa = $_POST['placa'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    
    

    // Insertar los datos en la tabla vehiculos
    $query = "UPDATE vehiculos
    SET modelo = '$modelo', marca = '$marca' 
    WHERE placa = '$placa'";


    if (mysqli_query($conexion, $query)) {
        // Redirigir a la página de administracion de usuarios
        header("location: ../admiVehiculos.php");
        exit;
    } else {
        echo "Error al registrar la recepción: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);


?>