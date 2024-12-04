<?php
    session_start();

    $enumMapping = array(
        'bulto' => 'Bulto',
        'granel' => 'Granel'
    ); 
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
                <form action="../formato-de-recepcion/conexion/updateBascula.php" method="POST">
                    <label>Numero de Formato:</label>
                    <input type="number" name="formato" value="<?php echo $row["formato"]; ?>" readonly>
                    <br>                    
                    <label>Presentación:</label>
                    <select name="bultosrecibidos" id="bultosrecibidos">
                        <option value="<?php echo $row["tipo"]; ?>"><?php echo $row["tipo"]; ?></option>
                        <?php foreach ($enumMapping as $valor => $etiqueta) : ?>
                            <option value="<?php echo $valor; ?>"><?php echo $etiqueta; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <label>Numero de Empaques:</label>
                    <input type="number" name="cantidad" value="<?php echo $row["cantidad"]; ?>">
                    <br>
                    <label>Empaques Devueltos:</label>
                    <input type="number" name="bultosdevueltos" value="<?php echo $row["bultos_devueltos"]; ?>">
                    <br>
                    <label>Kilos Brutos:</label>
                    <input type="number" name="kilosbrutos" id="kilosbrutos" value="<?php echo $row["kilos_brutos"]; ?>">
                    <br>
                    <label>Destare:</label>
                    <input type="number" name="destare" id="destare" value="<?php echo $row["destare"]; ?>">
                    <br>          
                    <label>Kilos Netos:</label>
                    <input type="number" name="kilosnetos" id="kilosnetos" value="<?php echo $row["kilos_netos"]; ?>">
                    <br>
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
    <script>
        // Obtener los elementos del formulario
        const kilosBrutosInput = document.getElementById('kilosbrutos');
        const destareInput = document.getElementById('destare');
        const kilosNetosInput = document.getElementById('kilosnetos');

        // Agregar un evento de cambio a los campos de entrada
        kilosBrutosInput.addEventListener('input', calcularKilosNetos);
        destareInput.addEventListener('input', calcularKilosNetos);

        // Función para calcular los kilos netos
        function calcularKilosNetos() {
            const kilosBrutos = parseFloat(kilosBrutosInput.value);
            const destare = parseFloat(destareInput.value);

            if (!isNaN(kilosBrutos) && !isNaN(destare)) {
                const kilosNetos = kilosBrutos - destare;
                kilosNetosInput.value = kilosNetos.toFixed(3);
            }
        }

        // Inicializar el cálculo al cargar la página
        calcularKilosNetos();
    </script>
    <footer>
        © Todos los derechos reservados 2023
    </footer>
</body>
</html>