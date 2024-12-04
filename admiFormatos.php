<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formatos</title>
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/cards.css">
    <script src="https://kit.fontawesome.com/88a36f4c42.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        // Incluir el archivo de conexión
        include "../formato-de-recepcion/conexion/conexion.php";

        function obtenerRegistrosDesdeDB($conexion) {
            // Código para obtener los registros desde la base de datos utilizando $conexion
            $query = "SELECT formato FROM recepcion";
            $resultado = $conexion->query($query);

            $registros = [];

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    $registros[] = $fila;
                }
            }

            $conexion->close();

            return $registros;
        }

        $registros = obtenerRegistrosDesdeDB($conexion);
    ?>
    <section>
        <header>             
            <a href="../formato-de-recepcion/admiMenu.php" class="arrowLeft">
                <img src="../formato-de-recepcion/imagenes/arrow-left.svg" alt="arrow left">
            </a>  
            <div class="headerText">
                <h1>Aministración de Formatos</h1>
            </div>                   
        </header>
        <main>                        
            <?php if (!empty($registros)): ?>
                <?php foreach ($registros as $registro): ?>
                    <a class="card2" href="../formato-de-recepcion/admiFormatoReadDeleteRecepcion.php?formato=<?php echo $registro['formato']; ?>">
                        <i class="fa-regular fa-file-pdf"></i>
                        <div class="containerText2">
                            <p><?php echo $registro["formato"]; ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay registros disponibles.</p>
            <?php endif; ?>
        </main>
    </section>
    <script>
        //Script para cambiar las card al hacer click
        //Seleccionar todas las cards por su clase y agregar un evento de clic a cada una
        const cards = document.querySelectorAll(".card2");
        let activeCard = null; // variable para almacenar la card activa actualmente

        cards.forEach(function(card2) {
            card2.addEventListener("click", function() {
                // Si hay una card activa y no es la misma que la que se hizo clic, desactivarla
                if (activeCard !== null && activeCard !== this) {
                activeCard.style.backgroundColor = "";
                activeCard.querySelector(".svg-inline--fa").style.color = ""; // Cambia esto a tu propiedad deseada
                activeCard.querySelector("p").style.color = "";
                // activeCard.querySelector("span").style.display = "none"; // desactivar el icono activo
                }

                // Si la card está inactiva, cambiar su estilo de fondo a un nuevo color y marcarla como activa
                if (this.style.backgroundColor === "") {
                    this.style.backgroundColor = "#a6a6a6"; // aqui se cambia el atributo
                    this.querySelector(".svg-inline--fa").style.color = "#737373"; // Cambia esto a tu propiedad deseada
                    this.querySelector("p").style.color = "#737373";
                    this.querySelector("p").style.fontWeight = "bold";
                    // this.querySelector("span").style.display = ""; // activar el icono correspondiente
                    activeCard = this; // actualizar la referencia de la card activa
                } else { // Si la card está activa, cambiar su estilo de fondo a su color original y marcarla como inactiva
                    this.style.backgroundColor = "";
                    this.querySelector(".svg-inline--fa").style.color = ""; // Cambia esto a tu propiedad deseada
                    this.querySelector("p").style.color = "";
                    // this.querySelector("span").style.display = "none"; // desactivar el icono activo
                    activeCard = null; // actualizar la referencia de la card activa
                }
            });
        });
    </script>   
</body>
</html>