<?php
    include "conexion.php";

    // Obtener los valores del formulario
    $fecha_recibo = $_POST['fecha_recibo'];
    $proveedor = $_POST['proveedor'];
    $conductor = $_POST['conductor'];
    $vehiculo = $_POST['vehiculo'];
    $variedad = $_POST['variedad'];
    // $usuario = $_POST['user_id'];
    $procedencia = $_POST['procedencia'];
    if (isset($_POST['user_id'])) {
        $usuario = $_POST['user_id'];
    }

    // Insertar los datos en la tabla Recepcion
    $query = "INSERT INTO Recepcion (fecha_recibo, proveedor_id, conductor_id, vehiculo_id, variedad, usuario_id, procedencia) 
            VALUES ('$fecha_recibo', '$proveedor', '$conductor', '$vehiculo', '$variedad', '$usuario', '$procedencia')";


    if (mysqli_query($conexion, $query)) {
        // Redirigir a la página de recepcion
        header("location: ../recepcion.php");
        exit;
    } else {
        echo "Error al registrar la recepción: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);


?>