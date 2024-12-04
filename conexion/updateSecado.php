<?php

    include "conexion.php";

    // Obtener los valores del formulario   
    $formato = $_POST['formato'];
    $fechainicial = $_POST['fechainicial'];
    $horainicial = $_POST['horainicial'];
    $fechafinal = $_POST['fechafinal'];
    $horafinal = $_POST['horafinal'];
    $temperatura = $_POST['temperatura'];
    $bateria = $_POST['bateria'];
    $humedad = $_POST['humedad'];
    if (isset($_POST['user_id'])) {
        $usuario = $_POST['user_id'];
    }
    
    

    // Insertar los datos en la tabla Recepcion
    $query = "UPDATE secado
    SET fecha_inicio = '$fechainicial', hora_inicio = '$horainicial', 
    fecha_fin = '$fechafinal', hora_fin = '$horafinal', temperatura_secado = '$temperatura',
    humedad_final = '$humedad', bateria_secado = '$bateria', usuario_id = '$usuario'
    WHERE formato = '$formato'";


    if (mysqli_query($conexion, $query)) {
        // Redirigir a la página de administracion de usuarios
        header("location: ../admiformatos.php");
        exit;
    } else {
        echo "Error al actualizar los datos de secado: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);


?>