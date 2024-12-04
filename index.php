<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="/reset.css"> -->
    <link rel="stylesheet" href="../formato-de-recepcion/estilos/index.css">
</head>
<body>
    <section>
        <img src="https://icons.veryicon.com/png/o/internet--web/prejudice/user-128.png" alt="foto de perfil">
        <p>Por favor, ingrese su usuario y contraseña</p>
        <form action="./conexion/login.php" method="POST">
            <input type="text" placeholder="usuario" name="Nusuario" id="username">
            <input type="password" placeholder="Ingresa contraseña" name="pass" id="password">
            <input type="submit" value="INICIAR SESIÓN">
        </form>
        <a href="/signUp.html">Sign Up</a>
    </section>    
</body>
</html>