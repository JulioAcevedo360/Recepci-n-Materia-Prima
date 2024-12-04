<?php    
    include "conexion.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["placa"])) {
        $placa = $_POST["placa"];
        
        // Eliminar el usuario de la base de datos
        $query = "DELETE FROM vehiculos WHERE placa = '$placa'";
        
        if (mysqli_query($conexion, $query)) {
            header("location: ../admiVehiculos.php"); // Redirigir a la página de administración
            exit;
        } else {
            echo "Error al eliminar el usuario: " . mysqli_error($conexion);
        }
    }

    mysqli_close($conexion);
?>
