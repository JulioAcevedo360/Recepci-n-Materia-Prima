<?php    
    include "conexion.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nit"])) {
        $nit = $_POST["nit"];
        
        // Eliminar el usuario de la base de datos
        $query = "DELETE FROM proveedores WHERE NIT = '$nit'";
        
        if (mysqli_query($conexion, $query)) {
            header("location: ../admiProveedores.php"); // Redirigir a la página de administración
            exit;
        } else {
            echo "Error al eliminar el usuario: " . mysqli_error($conexion);
        }
    }

    mysqli_close($conexion);
?>
