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
        $sql = "SELECT * FROM calidad WHERE formato = '$id'";
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
                <p>Calidad</p>
                <form action="../formato-de-recepcion/conexion/updateCalidad.php" method="POST">
                    <label>Numero de Formato:</label>
                    <input type="number" name="formato" value="<?php echo $row["formato"]; ?>" readonly>
                    <br>                    
                    <label>Humedad:</label>
                    <input type="text" name="humedad" value="<?php echo $row["humedad"]; ?>">
                    <br>
                    <label>Impurezas:</label>
                    <input type="number" name="impureza" value="<?php echo $row["impurezas"]; ?>">
                    <br>
                    <div class="radio-container">
                        <div class="radio-group">
                            <label for="partido">Grano Partido:</label>
                            <input type="checkbox" id="partido" name="partido" <?php echo $row["grano_partido"] ? 'checked' : ''; ?>>  
                        </div>
                        <div class="radio-group">
                            <label for="yesado">Grano Yesado:</label>
                            <input type="checkbox" id="yesado" name="yesado" <?php echo $row["grano_yesado"] ? 'checked' : ''; ?>>
                        </div>
                        <div class="radio-group">
                            <label for="rojo">Grano rojo:</label>
                            <input type="checkbox" id="rojo" name="rojo" <?php echo $row["grano_rojo"] ? 'checked' : ''; ?>>
                        </div>                      
                        <div class="radio-group">
                            <label for="olor">Olor:</label>
                            <input type="checkbox" id="olor" name="olor" <?php echo $row["olor"] ? 'checked' : ''; ?>>
                        </div>    
                        <div class="radio-group">
                            <label for="hongo">Daño por Hongo:</label>
                            <input type="checkbox" id="hongo" name="hongo" <?php echo $row["danio_por_hongo"] ? 'checked' : ''; ?>> 
                        </div> 
                        <div class="radio-group">
                            <label for="calor">Daño por Calor:</label>
                            <input type="checkbox" id="calor" name="calor" <?php echo $row["danio_por_calor"] ? 'checked' : ''; ?>> 
                        </div> 
                        <div class="radio-group">
                            <label for="inmaduro">Inmaduro:</label>
                            <input type="checkbox" id="inmaduro" name="inmaduro" <?php echo $row["inmaduro"] ? 'checked' : ''; ?>>
                        </div> 
                        <div class="radio-group">
                            <label for="aceptado">Aceptado:</label>
                            <input type="checkbox" id="aceptado" name="aceptado" <?php echo $row["aceptado_rechazado"] ? 'checked' : ''; ?>> 
                        </div>                                     
                    </div> 
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <button type="submit">Guardar</button>
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