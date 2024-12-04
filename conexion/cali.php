<?php

    if(isset($_POST['submit'])){

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

        // Insertar los datos en la tabla Recepcion
        $query = "INSERT INTO calidad (formato, humedad, impurezas, grano_partido, grano_yesado, grano_rojo, olor, danio_por_hongo, danio_por_calor, inmaduro, aceptado_rechazado, usuario_id) VALUES ('$formato', '$humedad', '$impureza', '$partido', '$yesado', '$rojo', '$olor', '$hongo', '$calor', '$inmaduro', '$aceptado', '$usuario')";


        if (mysqli_query($conexion, $query)) {
            // Redirigir a la página de recepcion
            header("location: ../controlador/secadoControler.php?formato=$formato");
            exit;
        } else {
            echo "Error al registrar la recepción: " . mysqli_error($conexion);
        }

        // Cerrar la conexión
        mysqli_close($conexion);

    }


?>