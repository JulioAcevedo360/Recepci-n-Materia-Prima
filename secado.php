<?php
    session_start();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secado</title>
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/form.css">
</head>
<body>
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
                <p>Por favor, ingrese los datos correspondientes al proceso de secado del producto</p>
                <form action="../formato-de-recepcion/conexion/seca.php" method="POST">
                    <input type="hidden" name="formato" value="<?php echo $_GET['formato']; ?>">
                    <label for="fechainicial">Fecha de Inicio</label>
                    <input type="date" name="fechainicial" id="fechainicial" placeholder="Fecha de Inicio" required>
                    <label for="horainicial">Hora de inicio</label>
                    <input type="time" name="horainicial" id="horainicial" required>
                    <label for="fechafinal">Fecha de Finalización</label>
                    <input type="date" name="fechafinal" id="fechafinal" placeholder="Fecha de Finalización" required>
                    <label for="horafinal">Hora de Finalización</label>
                    <input type="time" name="horafinal" id="horafinal" required>
                    <input type="text" name="temperatura" id="temperatura" placeholder="Temperatura de Secado" required>
                    <input type="text" name="bateria" id="bateria" placeholder="Baretria de Secado" required>
                    <input type="text" name="humedad" id="humedad" placeholder="Humedad Final" required>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <input type="submit" name="submit" id="submit" value="Guardar">
                </form>
            </div>
        </main>      
    </section>        
    <footer>
        Todos los derechos reservados 2023
    </footer>
</body>
</html>