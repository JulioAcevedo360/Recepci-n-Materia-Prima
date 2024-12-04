<?php

if(isset($_POST['submit'])){

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
    $query = "INSERT INTO secado (formato, fecha_inicio, hora_inicio, fecha_fin, hora_fin, temperatura_secado, bateria_secado, humedad_final, usuario_id) VALUES ('$formato', '$fechainicial', '$horainicial', '$fechafinal', '$horafinal', '$temperatura', '$bateria', '$humedad', '$usuario')";


    if (mysqli_query($conexion, $query)) {
        // Redirigir a la página de recepcion
        header("location: ../controlador/almaControler.php?formato=$formato");
        exit;
    } else {
        echo "Error al registrar la recepción: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);

}


?>