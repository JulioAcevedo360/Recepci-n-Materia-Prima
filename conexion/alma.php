<?php

    if(isset($_POST['submit'])){

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
        $query = "INSERT INTO almacenamiento (formato, silo_destino, observaciones, lote, usuario_id) VALUES ('$formato', '$silo', '$observacion', '$lote', '$usuario')";


        if (mysqli_query($conexion, $query)) {
            // Redirigir a la página de recepcion
            header("location: ../laboratorio.php");
            exit;
        } else {
            echo "Error al registrar el almacenamiento: " . mysqli_error($conexion);
        }

        // Cerrar la conexión
        mysqli_close($conexion);

    }


?>