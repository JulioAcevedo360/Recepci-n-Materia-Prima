<?php

    include "conexion.php";

    // Obtener los valores del formulario   
    $formato = $_POST['formato'];
    $silo = $_POST['silo'];
    $lote = $_POST['lote'];
    $observacion = $_POST['obs'];
    if (isset($_POST['user_id'])) {
        $usuario = $_POST['user_id'];
    }
    
    

    // Insertar los datos en la tabla Recepcion
    $query = "UPDATE almacenamiento
    SET silo_destino = '$silo', observaciones = '$observacion', 
    lote = '$lote', usuario_id = '$usuario'
    WHERE formato = '$formato'";


    if (mysqli_query($conexion, $query)) {
        // Redirigir a la página de administracion de usuarios
        header("location: ../admiformatos.php");
        exit;
    } else {
        echo "Error al actualizar los datos de almacenamiento: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);


?>