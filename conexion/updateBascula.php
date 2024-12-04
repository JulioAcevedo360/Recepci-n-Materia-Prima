<?php

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
    
    

    // Insertar los datos en la tabla Recepcion
    $query = "UPDATE pesajes
    SET tipo = '$bultosrecibidos', cantidad = '$cantidad', 
    bultos_devueltos = '$bultosdevueltos', kilos_brutos = '$kilosbrutos', destare = '$destare',
    usuario_id = '$usuario', kilos_netos = '$kilosnetos' 
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