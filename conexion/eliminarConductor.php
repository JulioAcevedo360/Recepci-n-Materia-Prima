<?php    
    include "conexion.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cedula"])) {
        $cedula = $_POST["cedula"];
        
        // Eliminar el usuario de la base de datos
        $query = "DELETE FROM conductores WHERE cedula = '$cedula'";
        
        if (mysqli_query($conexion, $query)) {
            header("location: ../admiConductores.php"); // Redirigir a la página de administración
            exit;
        } else {
            echo "Error al eliminar el usuario: " . mysqli_error($conexion);
        }
    }

    mysqli_close($conexion);
?>
