<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepcion Form</title>
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/form.css">
</head>
<body>
    <section>
        <header>
            <div class="imagenLogo">
                <img src="https://creazilla-store.fra1.digitaloceanspaces.com/cliparts/13077/windmill-clipart-md.png" alt="logo molino">
            </div>
            <div class="headerText">
                <h1>Recepción</h1>
            </div>            
        </header>
        <main>
            <div class="contenido">
                <p>Por favor, ingrese los datos del proveedor y del conductor</p>
                <form action="../formato-de-recepcion/conexion/recep.php" method="POST">
                    <select name="proveedor" id="proveedor" required>
                    <option value="" disabled selected>Selecciona un proveedor</option>
                        <?php
                            // Conexión a la base de datos 
                            include '../formato-de-recepcion/conexion/conexion.php';
                            
                            // Consulta para obtener los proveedores
                            $consulta = "SELECT NIT, nombre, apellido FROM Proveedores";
                            $result = mysqli_query($conexion, $consulta);
                            
                            // Generar opciones a partir de los datos obtenidos
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['NIT'] . '">' . $row['nombre'] . '  ' . $row['apellido'] . '</option>';
                            }
                            
                            // Cerrar la conexión
                            mysqli_close($conexion);
                        ?>
                    </select>
                    <select name="conductor" id="conductor" required>
                    <option value="" disabled selected>Selecciona un conductor</option>
                        <?php
                            // Conexión a la base de datos 
                            include '../formato-de-recepcion/conexion/conexion.php';
                            
                            // Consulta para obtener los conductores
                            $consulta = "SELECT cedula, nombre, apellido FROM conductores";
                            $result = mysqli_query($conexion, $consulta);
                            
                            // Generar opciones a partir de los datos obtenidos
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['cedula'] . '">' . $row['nombre'] . '  ' . $row['apellido'] . '</option>';
                            }
                            
                            // Cerrar la conexión
                            mysqli_close($conexion);
                        ?>
                    </select>
                    <select name="vehiculo" id="vehiculo" required>
                    <option value="" disabled selected>Seleccione un vehiculo</option>
                        <?php
                            // Conexión a la base de datos 
                            include '../formato-de-recepcion/conexion/conexion.php';
                            
                            // Consulta para obtener los vehiculos
                            $consulta = "SELECT placa FROM vehiculos";
                            $result = mysqli_query($conexion, $consulta);
                            
                            // Generar opciones a partir de los datos obtenidos
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['placa'] . '">' . $row['placa'] . '</option>';
                            }
                            
                            // Cerrar la conexión
                            mysqli_close($conexion);
                        ?>
                    </select>
                    <label for="fecha_recibo">Fecha de recibo</label>
                    <input type="date" name="fecha_recibo" id="fecha_recibo" required>            
                    <input type="text" placeholder="Variedad" name="variedad" id="variedad" required>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <input type="text" placeholder="Procedencia" name="procedencia" id="procedencia" required>
                    <input type="submit" value="ENVIAR">
                </form>               
            </div>
        </main>                        
    </section>  
    <footer>
        © Todos los derechos reservados 2023
    </footer>
</body>
</html>