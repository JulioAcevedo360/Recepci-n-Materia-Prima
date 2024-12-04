<?php
    session_start();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calidad</title>
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/form.css">
</head>
<body>
    <section>
        <header>
            <a href="../formato-de-recepcion/laboratorioMenu.php?formato=<?php echo $_GET['formato']; ?>" class="arrowLeft">
                <img src="../formato-de-recepcion/imagenes/arrow-left.svg" alt="arrow left">
            </a>       
            <div class="headerText">
                <h1>Control de calidad al recibo de la materia prima</h1>
            </div>
        </header>
        <main>
            <div class="contenido">
                <p>Por favor, ingrese los datos correspondientes a la calidad del producto</p>
                <form action="../formato-de-recepcion/conexion/cali.php" method="POST">
                    <input type="hidden" name="formato" value="<?php echo $_GET['formato']; ?>">
                    <input type="text" name="humedad" id="humedad" placeholder="Humedad" required>
                    <input type="text" name="impureza" id="impureza" placeholder="Impurezas" required>
                    <div class="radio-container">
                        <div class="radio-group">
                            <label for="partido">Grano Partido:</label>
                            <input type="checkbox" id="partido" name="partido">  
                        </div>
                        <div class="radio-group">
                            <label for="yesado">Grano Yesado:</label>
                            <input type="checkbox" id="yesado" name="yesado">
                        </div>
                        <div class="radio-group">
                            <label for="rojo">Grano rojo:</label>
                            <input type="checkbox" id="rojo" name="rojo">
                        </div>                      
                        <div class="radio-group">
                            <label for="olor">Olor:</label>
                            <input type="checkbox" id="olor" name="olor">
                        </div>    
                        <div class="radio-group">
                            <label for="hongo">Daño por Hongo:</label>
                            <input type="checkbox" id="hongo" name="hongo"> 
                        </div> 
                        <div class="radio-group">
                            <label for="calor">Daño por Calor:</label>
                            <input type="checkbox" id="calor" name="calor"> 
                        </div> 
                        <div class="radio-group">
                            <label for="inmaduro">Inmaduro:</label>
                            <input type="checkbox" id="inmaduro" name="inmaduro">
                        </div> 
                        <div class="radio-group">
                            <label for="aceptado">Aceptado:</label>
                            <input type="checkbox" id="aceptado" name="aceptado"> 
                        </div>                                     
                    </div> 
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