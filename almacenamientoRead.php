<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacenamiento</title>
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/form.css">
</head>
<body>
    <?php
        // Conexión a la base de datos 
        include '../formato-de-recepcion/conexion/conexion.php';
        
        // Obtener información de un registro específico
        $id = $_GET["formato"]; // filtrar por parametro
        $sql = "SELECT * FROM almacenamiento WHERE formato = '$id'";
        $result = mysqli_query($conexion, $sql);
        $row = $result->fetch_assoc();

        // Cerrar la conexión
        $conexion->close();                            
    ?>
    <section>
        <header>    
            <a href="../formato-de-recepcion/laboratorioMenu.php?formato=<?php echo $_GET['formato']; ?>" class="arrowLeft">
                <img src="../formato-de-recepcion/imagenes/arrow-left.svg" alt="arrow left">
            </a>         
            <div class="headerText">
                <h1>Almacenamiento</h1>
            </div>            
        </header>
        <main>
            <div class="contenido">
                <form>
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
                </form>                     
            </div>
        </main>                        
    </section>
    <footer>
        © Todos los derechos reservados 2023
    </footer>
</body>
</html>