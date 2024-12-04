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
        $sql = "SELECT * FROM recepcion WHERE formato = '$id'";
        $result = mysqli_query($conexion, $sql);
        $row = $result->fetch_assoc();

        //Bloque de codigo para obtener el nombre y apellido del Proveedor para colocarlo como dato de entrada en el form
        $nit = $row["proveedor_id"]; //asigno el valor del nit del proveedor a la variable $nit
        $consProv = "SELECT NIT, nombre, apellido FROM proveedores WHERE NIT = '$nit'";
        $resultConsProv = mysqli_query($conexion, $consProv);
        $prow = $resultConsProv->fetch_assoc();
        $prov = $prow["nombre"] .  " " . $prow["apellido"];

        //Bloque de codigo para obtener el nombre y apellido del Conductor para colocarlo como dato de entrada en el form
        $cedula = $row["conductor_id"]; //asigno el valor del nit del proveedor a la variable $nit
        $consProv = "SELECT cedula, nombre, apellido FROM conductores WHERE cedula = '$cedula'";
        $resultConsProv = mysqli_query($conexion, $consProv);
        $prow = $resultConsProv->fetch_assoc();
        $cond = $prow["nombre"] .  " " . $prow["apellido"];      


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
                <p>Recepción</p>
                <form action="../formato-de-recepcion/conexion/updateRecep.php" method="POST">
                    <label>Numero de Formato:</label>
                    <input type="number" name="formato" value="<?php echo $row["formato"]; ?>" readonly>
                    <br>                    
                    <label>Proveedor:</label>                    
                    <select name="proveedor" id="proveedor">
                    <option value='<?php echo $row["proveedor_id"] ?>'><?php echo $prov; ?></option>
                        <?php
                            // Conexión a la base de datos 
                            include '../formato-de-recepcion/conexion/conexion.php';
                            
                            // Consulta para obtener los proveedores
                            $consulta = "SELECT NIT, nombre, apellido FROM Proveedores";
                            $result = mysqli_query($conexion, $consulta);
                            
                            // Generar opciones a partir de los datos obtenidos
                            while ($prow = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $prow['NIT'] . '">' . $prow['nombre'] . '  ' . $prow['apellido'] . '</option>';
                            }
                            
                            // Cerrar la conexión
                            mysqli_close($conexion);
                        ?>
                    </select>
                    <br>
                    <label>Conductor:</label>                    
                    <select name="conductor" id="conductor">
                        <option value="<?php echo $row["conductor_id"] ?>"><?php echo $cond; ?></option>
                            <?php
                                // Conexión a la base de datos 
                                include '../formato-de-recepcion/conexion/conexion.php';
                                
                                // Consulta para obtener los conductores
                                $consulta = "SELECT cedula, nombre, apellido FROM conductores";
                                $result = mysqli_query($conexion, $consulta);
                                
                                // Generar opciones a partir de los datos obtenidos
                                while ($crow = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $crow['cedula'] . '">' . $crow['nombre'] . '  ' . $crow['apellido'] . '</option>';
                                }
                                
                                // Cerrar la conexión
                                mysqli_close($conexion);
                            ?>
                    </select>
                    <br>
                    <label>Vehiculo:</label>
                    <select name="vehiculo" id="vehiculo">
                        <option value="<?php echo $row["vehiculo_id"] ?>"><?php echo $row["vehiculo_id"]; ?></option>
                            <?php
                                // Conexión a la base de datos 
                                include '../formato-de-recepcion/conexion/conexion.php';
                                
                                // Consulta para obtener los vehiculos
                                $consulta = "SELECT placa FROM vehiculos";
                                $result = mysqli_query($conexion, $consulta);
                                
                                // Generar opciones a partir de los datos obtenidos
                                while ($vrow = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $vrow['placa'] . '">' . $vrow['placa'] . '</option>';
                                }
                                
                                // Cerrar la conexión
                                mysqli_close($conexion);
                            ?>
                    </select>
                    <br>
                    <label>Fecha de Recibo:</label>
                    <input type="date" name="fechaRecibo" value="<?php echo $row["fecha_recibo"]; ?>">
                    <br>
                    <label>Variedad:</label>
                    <input type="text" name="variedad" value="<?php echo $row["variedad"]; ?>">
                    <br>          
                    <label>Procedencia:</label>
                    <input type="text" name="procedencia" value="<?php echo $row["procedencia"]; ?>">
                    <br>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">                        
                    <button type="button" id="editarBtn" style="display: none;">Editar</button>
                    <button type="submit" id="guardarBtn">Guardar</button>
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