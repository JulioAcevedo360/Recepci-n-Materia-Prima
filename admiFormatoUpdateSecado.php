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
        $sql = "SELECT * FROM secado WHERE formato = '$id'";
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
                <p>Secado</p>
                <form action="../formato-de-recepcion/conexion/updateSecado.php" method="POST">
                    <label>Numero de Formato:</label>
                    <input type="number" name="formato" value="<?php echo $row["formato"]; ?>" readonly>
                    <br>                    
                    <label>Fecha de inicio:</label>
                    <input type="date" name="fechainicial" value="<?php echo $row["fecha_inicio"]; ?>">
                    <br>
                    <label>Hora de inicio:</label>
                    <input type="time" name="horainicial" value="<?php echo $row["hora_inicio"]; ?>">
                    <br>
                    <label>Fecha de Finalización:</label>
                    <input type="date" name="fechafinal" value="<?php echo $row["fecha_fin"]; ?>">
                    <br>
                    <label>Hora de Finalización:</label>
                    <input type="time" name="horafinal" value="<?php echo $row["hora_fin"]; ?>">
                    <br>
                    <label>Temperatura de Secado:</label>
                    <input type="text" name="temperatura" value="<?php echo $row["temperatura_secado"]; ?>">
                    <br>          
                    <label>Baretria de Secado:</label>
                    <input type="text" name="bateria" value="<?php echo $row["bateria_secado"]; ?>">
                    <br>
                    <label>Humedad Final:</label>
                    <input type="text" name="humedad" value="<?php echo $row["humedad_final"]; ?>">
                    <br>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <button type="submit">Guardar</button>
                </form>                     
            </div>
        </main>                        
    </section>
    <footer>
        © Todos los derechos reservados 2023
    </footer>
</body>
</html>