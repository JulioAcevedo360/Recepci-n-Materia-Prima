<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion de Proveedor</title>
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/form.css">
</head>
<body>
    <section>
        <header>
            <a href="admiProveedores.php" class="arrowLeft">
                <img src="../formato-de-recepcion/imagenes/arrow-left.svg" alt="arrow left">
            </a>
            <div class="headerText">
                <h1>Creación de Proveedor</h1>
            </div>            
        </header>
        <main>
            <div class="contenido">
                <p>Por favor, ingrese los datos del proveedor a crear</p>
                <form action="../formato-de-recepcion/conexion/createProveedor.php" method="POST">                   
                    <label>NIT:</label>
                    <input type="number" name="nit">
                    <br>
                    <label>Nombre:</label>
                    <input type="text" name="nombre">
                    <br>
                    <label>Apellido:</label>
                    <input type="text" name="apellido">
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