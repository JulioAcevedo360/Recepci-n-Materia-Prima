<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion Menu</title>
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/labMenu.css">
    <script src="https://kit.fontawesome.com/88a36f4c42.js" crossorigin="anonymous"></script>
</head>
<body>
    <section>
        <header>  
            <a class="logout-container" href="../formato-de-recepcion/index.php">
                <img src="../formato-de-recepcion/imagenes/logout.svg" alt="logout">
            </a>       
            <div class="headerText">
                <h1>Administración</h1>
            </div>                      
        </header>
        <main>                       
            <a class="card2" href="../formato-de-recepcion/admiUsuarios.php">
                <img class="icon-card" src="../formato-de-recepcion/imagenes/people.svg" alt="usuarios">
                <div class="containerText2">
                  <p>Usuarios</p>
                </div>
            </a>
            <a class="card2" href="../formato-de-recepcion/admiProveedores.php">
                <img class="icon-card" src="../formato-de-recepcion/imagenes/people-carry.svg" alt="proveedores">
                <div class="containerText2">
                  <p>Proveedores</p>
                </div>
            </a>
            <a class="card2" href="../formato-de-recepcion/admiConductores.php">
                <img class="icon-card" src="../formato-de-recepcion/imagenes/truck-driver.svg" alt="conductor">
                <div class="containerText2">
                  <p>Conductores</p>
                </div>
            </a>  
            <a class="card2" href="../formato-de-recepcion/admiVehiculos.php">
                <img class="icon-card" src="../formato-de-recepcion/imagenes/delivery.svg" alt="vehiculo">
                <div class="containerText2">
                  <p>Vehiculos</p>
                </div>
            </a>
            <a class="card2" href="../formato-de-recepcion/admiFormatos.php">
                <img class="icon-card" src="../formato-de-recepcion/imagenes/records.svg" alt="formatos">
                <div class="containerText2">
                  <p>Formatos</p>
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

                //obtener el elemento icono
                const iconoHeaderPrint = document.getElementById("iconoPrint");
                const iconoHeaderEye = document.getElementById("iconoEye");

                // Si la card está inactiva, cambiar su estilo de fondo a un nuevo color y marcarla como activa
                if (this.style.backgroundColor === "") {
                this.style.backgroundColor = "#a6a6a6"; // aqui se cambia el atributo
                this.querySelector(".svg-inline--fa").style.color = "#737373"; // Cambia esto a la propiedad deseada
                this.querySelector("p").style.color = "#737373";
                this.querySelector("p").style.fontWeight = "bold";
                // this.querySelector("span").style.display = ""; // activar el icono correspondiente
                activeCard = this; // actualizar la referencia de la card activa
                //activar el icono si hay card activa
                iconoHeaderPrint.style.display = "block";
                iconoHeaderEye.style.display = "block";
                } else { // Si la card está activa, cambiar su estilo de fondo a su color original y marcarla como inactiva
                this.style.backgroundColor = "";
                this.querySelector(".svg-inline--fa").style.color = ""; // Cambia esto la propiedad deseada
                this.querySelector("p").style.color = "";
                // this.querySelector("span").style.display = "none"; // desactivar el icono activo
                activeCard = null; // actualizar la referencia de la card activa
                }
                //Para desactivar el icono si no hay card activa
                if (activeCard === null) {
                    iconoHeaderPrint.style.display = "none";
                    iconoHeaderEye.style.display = "none";
                }
            });
        });
    </script>    
</body>
</html>