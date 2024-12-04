<?php

    if(isset($_POST['submit'])){
        
        include "conexion.php";

        // Obtener los valores del formulario
        $formato = $_POST['formato'];
        $bultosrecibidos = $_POST['bultosrecibidos'];
        $cantidad = $_POST['cantidad'];
        $bultosdevueltos = $_POST['bultosdevueltos'];
        $kilosbrutos = $_POST['kilosbrutos'];
        $destare = $_POST['destare'];
        $kilosnetos = $_POST['kilosnetos'];
        if (isset($_POST['user_id'])) {
            $usuario = $_POST['user_id'];
        }

        // Insertar los datos en la tabla Pesajes
        $query = "INSERT INTO pesajes (formato, tipo, cantidad, bultos_devueltos, kilos_brutos, destare, kilos_netos, usuario_id) 
                VALUES ('$formato', '$bultosrecibidos', '$cantidad', '$bultosdevueltos', '$kilosbrutos', '$destare', '$kilosnetos', '$usuario')";

        if (mysqli_query($conexion, $query)) {
            // Redirigir a la página de recepcion
            header("location: ../bascula.php");
            exit;
        } else {
            echo "Error al registrar la recepción: " . mysqli_error($conexion);
        }

        // Cerrar la conexión
        mysqli_close($conexion);
    }
?>