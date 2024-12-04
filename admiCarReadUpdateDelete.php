<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de Vehiculos</title>
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/form.css">
</head>
<body>
    <?php
        // Conexión a la base de datos 
        include '../formato-de-recepcion/conexion/conexion.php';
        
        // Obtener información de un registro específico
        $id = $_GET["placa"]; // filtrar por parametro
        $sql = "SELECT * FROM vehiculos WHERE placa = '$id'";
        $result = mysqli_query($conexion, $sql);
        $row = $result->fetch_assoc();

        // Cerrar la conexión
        $conexion->close();                            
    ?>
    <section>
        <header>
            <a href="../formato-de-recepcion/admiVehiculos.php" class="arrowLeft">
                <img src="../formato-de-recepcion/imagenes/arrow-left.svg" alt="arrow left">
            </a>
            <div class="headerText">
                <h1>Aministración de Vehiculo</h1>
            </div>            
        </header>
        <main>
            <div class="contenido">
                <form action="../formato-de-recepcion/conexion/updateCar.php" method="POST">
                    <label>Placa:</label>
                    <input type="text" name="placa" value="<?php echo $row["placa"]; ?>" readonly>
                    <br>
                    <label>Modelo:</label>
                    <input type="text" name="modelo" value="<?php echo $row["modelo"]; ?>" readonly>
                    <br>
                    <label>Marca:</label>
                    <input type="text" name="marca" value="<?php echo $row["marca"]; ?>" readonly>
                    <br>                                      
                    <button type="button" id="editarBtn">Editar</button>
                    <button type="submit" id="guardarBtn" style="display: none;">Guardar</button>
                </form>
                <form action="../formato-de-recepcion/conexion/eliminarCar.php" method="POST">
                    <input type="hidden" name="placa" value="<?php echo $row["placa"]; ?>">
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
            document.querySelectorAll("input, select").forEach(element => {               
                    element.removeAttribute("readonly");
                    element.removeAttribute("disabled");                               
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