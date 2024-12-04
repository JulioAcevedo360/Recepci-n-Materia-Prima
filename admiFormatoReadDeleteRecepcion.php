<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de Formatos</title>
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/form.css">
</head>
<body>
    <?php
        // Conexión a la base de datos 
        include '../formato-de-recepcion/conexion/conexion.php';
        
        // Obtener información de un registro específico
        $id = $_GET["formato"]; // filtrar por parametro
        $sql = "SELECT * FROM recepcion WHERE formato = '$id'";
        $result = mysqli_query($conexion, $sql);
        $row = $result->fetch_assoc();

        // Cerrar la conexión
        $conexion->close();                            
    ?>
    <section>
        <header>
            <a href="../formato-de-recepcion/admiFormatos.php" class="arrowLeft">
                <img src="../formato-de-recepcion/imagenes/arrow-left.svg" alt="arrow left">
            </a>
            <div class="headerText">
                <h1>Aministración de Formatos</h1>
            </div>            
        </header>
        <main>
            <div class="contenido">
                <p>Recepción</p>
                <form action="../formato-de-recepcion/admiFormatoUpdateRecepcion.php" method="POST">
                    <label>Numero de Formato:</label>
                    <input type="number" name="formato" value="<?php echo $row["formato"]; ?>" readonly>
                    <br>                    
                    <label>Proveedor:</label>
                    <input type="number" name="proveedor" value="<?php echo $row["proveedor_id"]; ?>" readonly>
                    <br>
                    <label>Conductor:</label>
                    <input type="number" name="conductor" value="<?php echo $row["conductor_id"]; ?>" readonly>
                    <br>
                    <label>Vehiculo:</label>
                    <input type="text" name="vehiculo" value="<?php echo $row["vehiculo_id"]; ?>" readonly>
                    <br>
                    <label>Fecha de Recibo:</label>
                    <input type="date" name="fechaRecibo" value="<?php echo $row["fecha_recibo"]; ?>" readonly>
                    <br>
                    <label>Variedad:</label>
                    <input type="text" name="variedad" value="<?php echo $row["variedad"]; ?>" readonly>
                    <br>          
                    <label>Procedencia:</label>
                    <input type="text" name="procedencia" value="<?php echo $row["procedencia"]; ?>" readonly>
                    <br>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <button type="submit">Editar</button>
                </form>                               
                <form action="../formato-de-recepcion/conexion/eliminarFormato.php" method="POST">
                    <input type="hidden" name="formato" value="<?php echo $row["formato"]; ?>">
                    <button type="submit" id="eliminarBtn">Eliminar</button>                    
                </form>
                <form action="../formato-de-recepcion/admiFormatoReadBascula.php" method="POST">
                    <input type="hidden" name="formato" value="<?php echo $row["formato"]; ?>">
                    <button type="submit" id="siguienteBtn">Siguiente</button>                    
                </form>                                              
            </div>
        </main>                        
    </section> 
    <!-- <script>
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
    </script>  -->
    <footer>
        © Todos los derechos reservados 2023
    </footer>
</body>
</html>