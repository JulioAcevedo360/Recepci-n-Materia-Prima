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
        $sql = "SELECT * FROM pesajes WHERE formato = '$id'";
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
                <p>Bascula</p>
                <form action="../formato-de-recepcion/admiFormatoUpdateBascula.php" method="POST">
                    <label>Numero de Formato:</label>
                    <input type="number" name="formato" value="<?php echo $row["formato"]; ?>" readonly>
                    <br>                    
                    <label>Presentación:</label>
                    <input type="text" name="bultosrecibidos" value="<?php echo $row["tipo"]; ?>" readonly>
                    <br>
                    <label>Numero de Empaques:</label>
                    <input type="number" name="cantidad" value="<?php echo $row["cantidad"]; ?>" readonly>
                    <br>
                    <label>Empaques Devueltos:</label>
                    <input type="number" name="bultosdevueltos" value="<?php echo $row["bultos_devueltos"]; ?>" readonly>
                    <br>
                    <label>Kilos Brutos:</label>
                    <input type="number" name="kilosbrutos" value="<?php echo $row["kilos_brutos"]; ?>" readonly>
                    <br>
                    <label>Destare:</label>
                    <input type="number" name="destare" value="<?php echo $row["destare"]; ?>" readonly>
                    <br>          
                    <label>Kilos Netos:</label>
                    <input type="number" name="kilosnetos" value="<?php echo $row["kilos_netos"]; ?>" readonly>
                    <br>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <button type="submit">Editar</button>
                </form>                   
                <form action="../formato-de-recepcion/admiFormatoReadCalidad.php" method="POST">
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