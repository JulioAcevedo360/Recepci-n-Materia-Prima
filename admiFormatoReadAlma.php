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
        $id = $_POST["formato"]; // filtrar por parametro
        $sql = "SELECT * FROM almacenamiento WHERE formato = '$id'";
        $result = mysqli_query($conexion, $sql);
        $row = $result->fetch_assoc();

        // Cerrar la conexión
        $conexion->close();                            
    ?>
    <section>
        <header>            
            <div class="headerText">
                <h1>Aministración de Formatos</h1>
            </div>            
        </header>
        <main>
            <div class="contenido">
                <p>Almacenamiento</p>
                <form action="../formato-de-recepcion/admiFormatoUpdateAlma.php" method="POST">
                    <label>Numero de Formato:</label>
                    <input type="number" name="formato" value="<?php echo $row["formato"]; ?>" readonly>
                    <br>                    
                    <label>Silo de destino:</label>
                    <input type="text" name="silo" value="<?php echo $row["silo_destino"]; ?>" readonly>
                    <br>
                    <label>Lote:</label>
                    <input type="text" name="lote" value="<?php echo $row["lote"]; ?>" readonly>
                    <br>
                    <label>Observaciones:</label>
                    <textarea name="obs" cols="32" rows="13" readonly><?php echo $row["observaciones"]; ?></textarea>
                    <br>                    
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <button type="submit">Editar</button>
                </form>                   
                <form action="../formato-de-recepcion/admiFormatos.php" method="POST">
                    <input type="hidden" name="formato" value="<?php echo $row["formato"]; ?>">
                    <button type="submit" id="siguienteBtn">Menu</button>                    
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