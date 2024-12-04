<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/cards.css">
    <script src="https://kit.fontawesome.com/88a36f4c42.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        // Incluir el archivo de conexión
        include "../formato-de-recepcion/conexion/conexion.php";

        function obtenerRegistrosDesdeDB($conexion) {
            // Código para obtener los registros desde la base de datos utilizando $conexion
            $query = "SELECT usuario FROM usuarios";
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
                <h1>Aministración de Usuarios</h1>
            </div>
            <!-- <a href="#" class="imagenPrint">
                <img src="https://cdn.iconscout.com/icon/free/png-256/free-printer-1629573-1383399.png" id="iconoPrint" alt="printIcon">
            </a>
            <a href="../formato-de-recepcion/admiUserReadAndUpdate.php?formato=<?php echo $registro["usuario"]; ?>" class="span2">
                <img src="https://cdn.iconscout.com/icon/free/png-256/eye-1767966-1502302.png" id="iconoEye" alt="eyetIcon">
            </a>
            <a href="#" class="delete">
                <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg" id="iconoDelete">
                    <g stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="m3 6h18m-16 0v14c0 1.1046.89543 2 2 2h10c1.1046 0 2-.8954 2-2v-14m-11 0v-2c0-1.10457.89543-2 2-2h4c1.1046 0 2 .89543 2 2v2"/>
                        <path d="m14 11v6"/>
                        <path d="m10 11v6"/>
                    </g>
                </svg>
            </a>            -->
        </header>
        <main>                        
            <?php if (!empty($registros)): ?>
                <?php foreach ($registros as $registro): ?>
                    <a class="card2" href="../formato-de-recepcion/admiUserReadUpdateDelete.php?usuario=<?php echo $registro["usuario"]; ?>">
                        <!-- Icono -->
                        <div class="icon-card-container">
                            <svg height="108" viewBox="0 0 32 32" width="108" xmlns="http://www.w3.org/2000/svg">
                                <path d="m16 8a5 5 0 1 0 5 5 5 5 0 0 0 -5-5z" fill="#a6a6a6"/>
                                <path d="m16 2a14 14 0 1 0 14 14 14.0158 14.0158 0 0 0 -14-14zm7.9925 22.9258a5.0016 5.0016 0 0 0 -4.9925-4.9258h-6a5.0016 5.0016 0 0 0 -4.9925 4.9258 12 12 0 1 1 15.985 0z" fill="#a6a6a6"/>
                                <path d="m0 0h32v32h-32z" fill="none"/>
                            </svg>                        
                        </div>
                        <!-- texto correspondiente a la card  -->
                        <div class="containerText2">
                            <p><?php echo $registro["usuario"]; ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay usuarios registrados.</p>
            <?php endif; ?>
        </main>
        <button type="button" class="floating-button">
            <a href="../formato-de-recepcion/admiUserCreate.php">
                <div>
                    <svg height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path d="m14.5 10c2.4853 0 4.5 2.0147 4.5 4.5s-2.0147 4.5-4.5 4.5-4.5-2.0147-4.5-4.5 2.0147-4.5 4.5-4.5zm-.25-7c1.4625481 0 2.6584055 1.14170743 2.7449813 2.58247798l.0050187.16752202v3.84971c-.3724-.190384-.769376-.3395584-1.1849376-.4415072l-.3150624-.0675128v-3.34069c0-.6472125-.4918359-1.17953437-1.1221875-1.24354644l-.1278125-.00645356h-8.5c-.6472125 0-1.17953437.49187109-1.24354644 1.12219409l-.00645356.12780591v8.5c0 .64725.49187109 1.1795391 1.12219409 1.2435469l.12780591.0064531h3.34069c.07796.42448.2046496.831872.3740528 1.2161856l.1349672.2838144h-3.84971c-1.46252889 0-2.65840406-1.1416889-2.74498119-2.5824759l-.00501881-.1675241v-8.5c0-1.46252889 1.14170743-2.65840406 2.58247798-2.74498119l.16752202-.00501881zm.25 9c-.2454222 0-.4496.1769086-.4919429.4101355l-.0080571.0898645v1.5h-1.5c-.2761 0-.5.2239-.5.5 0 .2454222.1769086.4496.4101355.4919429l.0898645.0080571h1.5v1.5c0 .2761.2239.5.5.5.2454222 0 .4496-.1769086.4919429-.4101355l.0080571-.0898645v-1.5h1.5c.2761 0 .5-.2239.5-.5 0-.2454222-.1769086-.4496-.4101355-.4919429l-.0898645-.0080571h-1.5v-1.5c0-.2761-.2239-.5-.5-.5z" fill="#212121"/>
                    </svg>
                </div>
            </a>            
        </button>
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
                activeCard.querySelector("path").style.fill = "";
                activeCard.querySelector("path:nth-child(2)").style.fill = "";
                activeCard.querySelector("p").style.color = "";
                // activeCard.querySelector("span").style.display = "none"; // desactivar el icono activo
                }

                //obtener el elemento icono
                const iconoHeaderPrint = document.getElementById("iconoPrint");
                const iconoHeaderEye = document.getElementById("iconoEye");
                const iconoHeaderDelete = document.getElementById("iconoDelete");

                // Si la card está inactiva, cambiar su estilo de fondo a un nuevo color y marcarla como activa
                if (this.style.backgroundColor === "") {
                    this.style.backgroundColor = "#a6a6a6"; // aqui se cambia el atributo
                    this.querySelector("path").style.fill = "#737373";
                    this.querySelector("path:nth-child(2)").style.fill = "#737373";
                    this.querySelector("p").style.color = "#737373";
                    this.querySelector("p").style.fontWeight = "bold";
                    // this.querySelector("span").style.display = ""; // activar el icono correspondiente
                    activeCard = this; // actualizar la referencia de la card activa
                    //activar el icono si hay card activa
                    iconoHeaderPrint.style.display = "block";
                    iconoHeaderEye.style.display = "block";
                    iconoHeaderDelete.style.display = "block";
                } else { // Si la card está activa, cambiar su estilo de fondo a su color original y marcarla como inactiva
                    this.style.backgroundColor = "";
                    this.querySelector("path").style.fill = "";
                    this.querySelector("path:nth-child(2)").style.fill = "";
                    this.querySelector("p").style.color = "";
                    // this.querySelector("span").style.display = "none"; // desactivar el icono activo
                    activeCard = null; // actualizar la referencia de la card activa
                }
                //Para desactivar el icono si no hay card activa
                if (activeCard === null) {
                    iconoHeaderPrint.style.display = "none";
                    iconoHeaderEye.style.display = "none";
                    iconoHeaderDelete.style.display = "none";
                }
            });
        });
    </script>   
</body>
</html>