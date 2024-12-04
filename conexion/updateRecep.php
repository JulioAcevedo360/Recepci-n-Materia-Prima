<?php

    include "conexion.php";

    // Obtener los valores del formulario   
    $formato = $_POST['formato']; 
    $fecha_recibo = $_POST['fechaRecibo'];
    $proveedor = $_POST['proveedor'];
    $conductor = $_POST['conductor'];
    $vehiculo = $_POST['vehiculo'];
    $variedad = $_POST['variedad'];
    $procedencia = $_POST['procedencia'];
    if (isset($_POST['user_id'])) {
        $usuario = $_POST['user_id'];
    }
    
    

    // Insertar los datos en la tabla Recepcion
    $query = "UPDATE recepcion
    SET fecha_recibo = '$fecha_recibo', proveedor_id = '$proveedor', 
    conductor_id = '$conductor', vehiculo_id = '$vehiculo', variedad = '$variedad',
    usuario_id = '$usuario', procedencia = '$procedencia' 
    WHERE formato = '$formato'";


    if (mysqli_query($conexion, $query)) {
        // Redirigir a la página de administracion de usuarios
        header("location: ../admiformatos.php");
        exit;
    } else {
        echo "Error al registrar la recepción: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);


?>