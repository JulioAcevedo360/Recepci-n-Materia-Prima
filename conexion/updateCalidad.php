<?php
    include "conexion.php";

    // Obtener los valores del formulario
    $formato = $_POST['formato'];
    $humedad = $_POST['humedad'];
    $impureza = $_POST['impureza'];
    $partido = isset($_POST['partido']) ? 1 : 0; // Convertir checkbox a booleano
    $yesado = isset($_POST['yesado']) ? 1 : 0;
    $rojo = isset($_POST['rojo']) ? 1 : 0;
    $olor = isset($_POST['olor']) ? 1 : 0;
    $hongo = isset($_POST['hongo']) ? 1 : 0;
    $calor = isset($_POST['calor']) ? 1 : 0;
    $inmaduro = isset($_POST['inmaduro']) ? 1 : 0;
    $aceptado = isset($_POST['aceptado']) ? 1 : 0;
    if (isset($_POST['user_id'])) {
        $usuario = $_POST['user_id'];
    }
    

    // Insertar los datos en la tabla usuarios
    $query = "UPDATE calidad
    SET humedad = '$humedad', impurezas = '$impureza', grano_partido = '$partido',
    grano_yesado = '$yesado', grano_rojo = '$rojo', olor = '$olor', danio_por_hongo = '$hongo',
    danio_por_calor = '$calor', inmaduro = '$inmaduro', aceptado_rechazado = '$aceptado', usuario_id = '$usuario'
    WHERE formato = '$formato'";


    if (mysqli_query($conexion, $query)) {
        // Redirigir a la página de administracion de usuarios
        header("location: ../admiFormatos.php");
        exit;
    } else {
        echo "Error al actualizar los datos de calidad: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);


?>