<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de Usuario</title>
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/form.css">
</head>
<body>
    <?php
        // Conexión a la base de datos 
        include '../formato-de-recepcion/conexion/conexion.php';
        
        // Obtener información de un registro específico
        $id = $_GET["usuario"]; // filtrar por parametro
        $sql = "SELECT * FROM usuarios WHERE usuario = '$id'";
        $result = mysqli_query($conexion, $sql);
        $row = $result->fetch_assoc();

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
                <h1>Aministración de Usuarios</h1>
            </div>            
        </header>
        <main>
            <div class="contenido">
                <form action="../formato-de-recepcion/conexion/updateUsuario.php" method="POST">
                    <label>Usuario ID:</label>
                    <input type="number" name="id" value="<?php echo $row["usuario_id"]; ?>" readonly>
                    <br>
                    <label>Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $row["nombre"]; ?>" readonly>
                    <br>
                    <label>Apellido:</label>
                    <input type="text" name="apellido" value="<?php echo $row["apellido"]; ?>" readonly>
                    <br>
                    <label>Email:</label>
                    <input type="email" name="email" value="<?php echo $row["correo"]; ?>" readonly>
                    <br>
                    <label>Cedula:</label>
                    <input type="number" name="cedula" value="<?php echo $row["cedula"]; ?>" readonly>
                    <br>
                    <label>Usuario:</label>
                    <input type="text" name="usuario" value="<?php echo $row["usuario"]; ?>" readonly>
                    <br>
                    <label>Contraseña:</label>
                    <input type="text" name="clave" value="<?php echo $row["clave"]; ?>" readonly>
                    <br>
                    <select name="rol" id="rol" disabled>
                        <option value="<?php echo $row["rol"]; ?>" disabled selected><?php echo $row["rol"]; ?></option>
                            
                            <?php foreach ($enum_values as $value) : ?>
                                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                            <?php endforeach; ?>

                    </select>                    
                    <button type="button" id="editarBtn">Editar</button>
                    <button type="submit" id="guardarBtn" style="display: none;">Guardar</button>
                </form>
                <form action="../formato-de-recepcion/conexion/eliminarUsuario.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row["usuario_id"]; ?>">
                    <button type="submit" id="eliminarBtn">Eliminar</button>
                </form>               
            </div>
        </main>                        
    </section> 
    <script>
        const editarBtn = document.getElementById("editarBtn");
        const guardarBtn = document.getElementById("guardarBtn");
        const eliminarBtn = document.getElementById("eliminarBtn");

        editarBtn.addEventListener("click", function() {
            document.querySelectorAll("input, select, option").forEach(element => {               
                    element.removeAttribute("readonly");
                    element.removeAttribute("disabled");
                    element.removeAttribute("disable selected");
            });
            editarBtn.style.display = "none"; // ocultar botón Editar
            eliminarBtn.style.display = "none";
            guardarBtn.style.display = "block"; // mostrar botón Guardar
        });
    </script> 
    <footer>
        © Todos los derechos reservados 2023
    </footer>
</body>
</html>