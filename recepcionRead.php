<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepción</title>
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
            <a href="../formato-de-recepcion/recepcion.php" class="arrowLeft">
                <img src="../formato-de-recepcion/imagenes/arrow-left.svg" alt="arrow left">
            </a>
            <div class="headerText">
                <h1>Recepción</h1>
            </div>            
        </header>
        <main>
            <div class="contenido">
                <form>
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
                </form>                                                            
            </div>
        </main>                        
    </section> 
    <footer>
        © Todos los derechos reservados 2023
    </footer>
</body>
</html>