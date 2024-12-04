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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Báscula</title>
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/form.css">
</head>
<body>
    <section>
        <header>
            <div class="imagenLogo">
                <img src="https://creazilla-store.fra1.digitaloceanspaces.com/cliparts/13077/windmill-clipart-md.png" alt="logo molino">
            </div>
    
            <div class="headerText">
                <h1>Báscula</h1>
            </div>
        </header>
        <main>
            <div class="contenido">
                <p>Por favor, ingrese los datos correspondientes a los datos de la bascula</p>
                <form action="../formato-de-recepcion/conexion/basc.php" method="POST">
                    <input type="hidden" name="formato" value="<?php echo $_GET['formato']; ?>">
                    <select name="bultosrecibidos" id="bultosrecibidos" required>
                        <option value="" disabled selected>Presentación</option>
                        <?php foreach ($enumMapping as $valor => $etiqueta) : ?>
                            <option value="<?php echo $valor; ?>"><?php echo $etiqueta; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="number" name="cantidad" id="cantidad" placeholder="Numero de Empaques">
                    <input type="number" name="bultosdevueltos" id="bultosdevueltos" placeholder="Empaques devueltos">
                    <input type="number" name="kilosbrutos" id="kilosbrutos" placeholder="Kilos Brutos" step="0.001" required>
                    <input type="number" name="destare" id="destare" placeholder="Destare" step="0.001" required>
                    <input type="number" name="kilosnetos" id="kilosnetos" placeholder="Kilos Netos" step="0.001" readonly>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <input type="submit" name="submit" id="submit" value="Guardar">
                </form>
            </div>
        </main>
    </section>
    <footer>
        Todos los derechos reservados 2023
    </footer>  
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
</body>
</html>