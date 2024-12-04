<?php    
    include "conexion.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["formato"])) {
        $formato = $_POST["formato"];
        
        // Eliminar el usuario de la base de datos
        $query = "DELETE FROM recepcion WHERE formato = '$formato'";
        
        if (mysqli_query($conexion, $query)) {
            header("location: ../admiFormatos.php"); // Redirigir a la página de administración
            exit;
        } else {
            echo "Error al eliminar el usuario: " . mysqli_error($conexion);
        }
    }

    mysqli_close($conexion);
?>
