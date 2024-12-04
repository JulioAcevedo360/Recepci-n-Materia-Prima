<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion de Vehiculo</title>
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/form.css">
</head>
<body>
    <section>
        <header>
            <a href="admiVehiculos.php" class="arrowLeft">
                <img src="../formato-de-recepcion/imagenes/arrow-left.svg" alt="arrow left">
            </a>
            <div class="headerText">
                <h1>Creación de Vehiculo</h1>
            </div>            
        </header>
        <main>
            <div class="contenido">
                <p>Por favor, ingrese los datos del vehiculo a crear</p>
                <form action="../formato-de-recepcion/conexion/createCar.php" method="POST">                   
                    <label>Placa:</label>
                    <input type="text" name="placa">
                    <br>
                    <label>Modelo:</label>
                    <input type="text" name="modelo">
                    <br>
                    <label>Marca:</label>
                    <input type="text" name="marca">
                    <br>                                       
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