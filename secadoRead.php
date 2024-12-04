<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secado</title>
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/form.css">
</head>
<body>
    <?php
        // Conexión a la base de datos 
        include '../formato-de-recepcion/conexion/conexion.php';
        
        // Obtener información de un registro específico
        $id = $_GET["formato"]; // filtrar por parametro
        $sql = "SELECT * FROM secado WHERE formato = '$id'";
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
                <h1>Secado</h1>
            </div>            
        </header>
        <main>
            <div class="contenido">
                <form>
                    <label>Numero de Formato:</label>
                    <input type="number" name="formato" value="<?php echo $row["formato"]; ?>" readonly>
                    <br>                    
                    <label>Fecha de inicio:</label>
                    <input type="date" name="fechainicial" value="<?php echo $row["fecha_inicio"]; ?>" readonly>
                    <br>
                    <label>Hora de inicio:</label>
                    <input type="time" name="horainicial" value="<?php echo $row["hora_inicio"]; ?>" readonly>
                    <br>
                    <label>Fecha de Finalización:</label>
                    <input type="date" name="fechafinal" value="<?php echo $row["fecha_fin"]; ?>" readonly>
                    <br>
                    <label>Hora de Finalización:</label>
                    <input type="time" name="horafinal" value="<?php echo $row["hora_fin"]; ?>" readonly>
                    <br>
                    <label>Temperatura de Secado:</label>
                    <input type="text" name="temperatura" value="<?php echo $row["temperatura_secado"]; ?>" readonly>
                    <br>          
                    <label>Baretria de Secado:</label>
                    <input type="text" name="bateria" value="<?php echo $row["bateria_secado"]; ?>" readonly>
                    <br>
                    <label>Humedad Final:</label>
                    <input type="text" name="humedad" value="<?php echo $row["humedad_final"]; ?>" readonly>
                </form>                       
            </div>
        </main>                        
    </section>
    <footer>
        © Todos los derechos reservados 2023
    </footer>
</body>
</html>