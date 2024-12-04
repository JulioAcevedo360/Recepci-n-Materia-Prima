<?php    
    include "conexion.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
        $usuario_id = $_POST["id"];
        
        // Eliminar el usuario de la base de datos
        $query = "DELETE FROM usuarios WHERE usuario_id = '$usuario_id'";
        
        if (mysqli_query($conexion, $query)) {
            header("location: ../admiUsuarios.php"); // Redirigir a la página de administración
            exit;
        } else {
            echo "Error al eliminar el usuario: " . mysqli_error($conexion);
        }
    }

    mysqli_close($conexion);
?>
