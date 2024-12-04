<?php
    if (isset($_GET['formato'])) {
        $formato = $_GET['formato'];

        include "../conexion/conexion.php";

        // Se realiza una consulta para verificar si existen datos para este formato en la base de datos
        // si se encuentran datos, se establece una variable $datosExisten a true, de lo contrario a false.      
        $resultado = mysqli_query($conexion, "SELECT COUNT(*) AS total FROM calidad WHERE formato = '$formato'");

        if ($resultado) {
            // Leer el valor de 'total' desde el resultado
            $fila = mysqli_fetch_assoc($resultado);
            $total = $fila['total'];

            // Verificar si existen datos
            if ($total > 0) {
                $datosExisten = true;
            } else {
                $datosExisten = false;
            }
        } else {
            // Error al ejecutar la consulta
            echo "Error: " . mysqli_error($conexion);
        }
        if ($datosExisten) {
            // Si existen datos, incluye el formulario en modo lectura
            header("location: ../calidadRead.php?formato=$formato");
            exit;
        } else {
            // Si no existen datos, incluye el formulario de ingreso de datos
            header("location: ../calidad.php?formato=$formato");
            exit;
        }
    } else {
        // Si no se ha proporcionado un formato válido en la URL, muestra un mensaje de error.
        echo "Error: No se ha proporcionado un formato existente.";
        exit; // Termina la ejecución del script.
    }
?>


    
    
