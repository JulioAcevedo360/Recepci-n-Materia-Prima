<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio Menu</title>
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/labMenu.css">
    <script src="https://kit.fontawesome.com/88a36f4c42.js" crossorigin="anonymous"></script>
</head>
<body>
    <section>
        <header>  
            <a href="../formato-de-recepcion/laboratorio.php" class="arrowLeft">
                <img src="../formato-de-recepcion/imagenes/arrow-left.svg" alt="arrow left">
            </a>       
            <div class="headerText">
                <h1>Laboratorio</h1>
            </div>                      
        </header>
        <main>                       
            <a class="card2" href="../formato-de-recepcion/controlador/calidadControler.php?formato=<?php echo $_GET['formato']; ?>">
                <img class="icon-card" src="../formato-de-recepcion/imagenes/data-quality.svg" alt="quality">
                <div class="containerText2">
                  <p>Calidad</p>
                </div>
            </a>
            <a class="card2" href="../formato-de-recepcion/controlador/secadoControler.php?formato=<?php echo $_GET['formato']; ?>">
                <img class="icon-card" src="../formato-de-recepcion/imagenes/drying-tumble.svg" alt="drying-tumble">
                <div class="containerText2">
                  <p>Secado</p>
                </div>
            </a>
            <a class="card2" href="../formato-de-recepcion/controlador/almaControler.php?formato=<?php echo $_GET['formato']; ?>">
                <img class="icon-card" src="../formato-de-recepcion/imagenes/silo.svg" alt="silo">
                <div class="containerText2">
                  <p>Almacenamiento</p>
                </div>
            </a>            
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
                    this.querySelector(".svg-inline--fa").style.color = "#737373"; // Cambia esto a la propiedad deseada
                    this.querySelector("p").style.color = "#737373";
                    this.querySelector("p").style.fontWeight = "bold";
                    // this.querySelector("span").style.display = ""; // activar el icono correspondiente
                    activeCard = this; // actualizar la referencia de la card activa
                } else { // Si la card está activa, cambiar su estilo de fondo a su color original y marcarla como inactiva
                    this.style.backgroundColor = "";
                    this.querySelector(".svg-inline--fa").style.color = ""; // Cambia esto la propiedad deseada
                    this.querySelector("p").style.color = "";
                    // this.querySelector("span").style.display = "none"; // desactivar el icono activo
                    activeCard = null; // actualizar la referencia de la card activa
                }
            });
        });
    </script>    
</body>
</html>