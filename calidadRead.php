<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calidad</title>
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/form.css">
</head>
<body>
    <?php
        // Conexión a la base de datos 
        include '../formato-de-recepcion/conexion/conexion.php';
        
        // Obtener información de un registro específico
        $id = $_GET["formato"]; // filtrar por parametro
        $sql = "SELECT * FROM calidad WHERE formato = '$id'";
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
                <h1>Calidad</h1>
            </div>            
        </header>
        <main>
            <div class="contenido">
                <form>
                    <label>Numero de Formato:</label>
                    <input type="number" name="formato" value="<?php echo $row["formato"]; ?>" readonly>
                    <br>                    
                    <label>Humedad:</label>
                    <input type="text" name="bultosrecibidos" value="<?php echo $row["humedad"]; ?>" readonly>
                    <br>
                    <label>Impurezas:</label>
                    <input type="number" name="cantidad" value="<?php echo $row["impurezas"]; ?>" readonly>
                    <br>
                    <div class="radio-container">
                        <div class="radio-group">
                            <label for="partido">Grano Partido:</label>
                            <input type="checkbox" id="partido" name="partido" <?php echo $row["grano_partido"] ? 'checked' : ''; ?> disabled>  
                        </div>
                        <div class="radio-group">
                            <label for="yesado">Grano Yesado:</label>
                            <input type="checkbox" id="yesado" name="yesado" <?php echo $row["grano_yesado"] ? 'checked' : ''; ?> disabled>
                        </div>
                        <div class="radio-group">
                            <label for="rojo">Grano rojo:</label>
                            <input type="checkbox" id="rojo" name="rojo" <?php echo $row["grano_rojo"] ? 'checked' : ''; ?> disabled>
                        </div>                      
                        <div class="radio-group">
                            <label for="olor">Olor:</label>
                            <input type="checkbox" id="olor" name="olor" <?php echo $row["olor"] ? 'checked' : ''; ?> disabled>
                        </div>    
                        <div class="radio-group">
                            <label for="hongo">Daño por Hongo:</label>
                            <input type="checkbox" id="hongo" name="hongo" <?php echo $row["danio_por_hongo"] ? 'checked' : ''; ?> disabled> 
                        </div> 
                        <div class="radio-group">
                            <label for="calor">Daño por Calor:</label>
                            <input type="checkbox" id="calor" name="calor" <?php echo $row["danio_por_calor"] ? 'checked' : ''; ?> disabled> 
                        </div> 
                        <div class="radio-group">
                            <label for="inmaduro">Inmaduro:</label>
                            <input type="checkbox" id="inmaduro" name="inmaduro" <?php echo $row["inmaduro"] ? 'checked' : ''; ?> disabled>
                        </div> 
                        <div class="radio-group">
                            <label for="aceptado">Aceptado:</label>
                            <input type="checkbox" id="aceptado" name="aceptado" <?php echo $row["aceptado_rechazado"] ? 'checked' : ''; ?> disabled> 
                        </div>                                     
                    </div>
                </form>                     
            </div>
        </main>                        
    </section> 
    <footer>
        © Todos los derechos reservados 2023
    </footer>
</body>
</html>