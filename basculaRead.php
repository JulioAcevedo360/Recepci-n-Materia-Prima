<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bascula</title>
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/form.css">
</head>
<body>
    <?php
        // Conexión a la base de datos 
        include '../formato-de-recepcion/conexion/conexion.php';
        
        // Obtener información de un registro específico
        $id = $_GET["formato"]; // filtrar por parametro
        $sql = "SELECT * FROM pesajes WHERE formato = '$id'";
        $result = mysqli_query($conexion, $sql);
        $row = $result->fetch_assoc();

        // Cerrar la conexión
        $conexion->close();                            
    ?>
    <section>
        <header>  
            <a href="../formato-de-recepcion/bascula.php" class="arrowLeft">
                <img src="../formato-de-recepcion/imagenes/arrow-left.svg" alt="arrow left">
            </a>          
            <div class="headerText">
                <h1>Bascula</h1>
            </div>            
        </header>
        <main>
            <div class="contenido">
                <form>
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
                </form>                       
            </div>
        </main>                        
    </section>
    <footer>
        © Todos los derechos reservados 2023
    </footer>
</body>
</html>