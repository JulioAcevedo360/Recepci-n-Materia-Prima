<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion de Usuario</title>
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/form.css">
</head>
<body>
    <?php
        // Conexión a la base de datos 
        include '../formato-de-recepcion/conexion/conexion.php';
            
        // Realizar consulta para obtener los valores del enum
        $query = "SHOW COLUMNS FROM usuarios LIKE 'rol'";
        $resultt = mysqli_query($conexion, $query);
        $roww = mysqli_fetch_assoc($resultt);
        $enum_values = explode("','", substr($roww['Type'], 6, -2));

        // Cerrar la conexión
        $conexion->close();                            
    ?>
    <section>
        <header>
            <a href="../formato-de-recepcion/admiUsuarios.php" class="arrowLeft">
                <img src="../formato-de-recepcion/imagenes/arrow-left.svg" alt="arrow left">
            </a>
            <div class="headerText">
                <h1>Creación de Usuario</h1>
            </div>            
        </header>
        <main>
            <div class="contenido">
                <p>Por favor, ingrese los datos del usuario a crear</p>
                <form action="../formato-de-recepcion/conexion/createUsuario.php" method="POST">                   
                    <label>Nombre:</label>
                    <input type="text" name="nombre">
                    <br>
                    <label>Apellido:</label>
                    <input type="text" name="apellido">
                    <br>
                    <label>Email:</label>
                    <input type="email" name="email">
                    <br>
                    <label>Cedula:</label>
                    <input type="number" name="cedula">
                    <br>
                    <label>Usuario:</label>
                    <input type="text" name="usuario">
                    <br>
                    <label>Contraseña:</label>
                    <input type="text" name="clave">
                    <br>
                    <select name="rol" id="rol">
                        <option value="" disabled selected>Seleccione un Rol</option>
                            
                            <?php foreach ($enum_values as $value) : ?>
                                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                            <?php endforeach; ?>

                    </select>                    
                    <input type="submit" value="ENVIAR">
                </form>                             
            </div>
        </main>                        
    </section>     
    <footer>
        © Todos los derechos reservados 2023
    </footer>
</body>
</html>