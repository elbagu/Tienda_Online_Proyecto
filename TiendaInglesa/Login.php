<?php
session_start();
include('Funciones/conexion.php');

if(isset($_POST['email'] , $_POST['contraseña'])){
$usuario = $_POST['email'];
$contraseña = MD5($_POST['contraseña']);
$consulta1 = mysqli_query($conn,"SELECT Correo, Contraseña from Cliente;");
while($cliente = mysqli_fetch_array($consulta1)){
if($usuario == $cliente['Correo']){
    if($contraseña == $cliente['Contraseña']) {
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
    }
    else{
        echo "Error, Contraseña Incorrecta";
    }
}else{
    echo "Error, Usuario Incorrecto";
}
}
}

if(isset($_SESSION['usuario'])){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/css/estilo.css">
    <link rel="shortcut icon" type="image/x-icon" href="Assets/Img/favicon.ico">
    <title>Login </title>
    <script src="https://kit.fontawesome.com/0de0c0c25e.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div class="header">
        <a class="flecha-atras" href="index.php"><i class="fas fa-long-arrow-alt-left"></i>
            <p>Volver</p>
        </a>
        <a class="logo-reg" href="index.php"><img class="logo" src="Assets/Img/Logo_tienda_inglesa.png" alt=""></a>
    </div>
    <div class="contenedor">
        <h2>Login</h2>
        <form class="contacto" action="" method="POST">

            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" placeholder="Tu correo electronico...">

            <label for="contraseña">Contraseña: </label>
            <input type="password" id="contra" name="contraseña" placeholder="Tu contraseña...">

            <a class="recuperar" href="recuperar.php">¿Olvidaste tu contraseña?</a>

            <input type="submit" id="ingresar" value="Ingresar">
        </form>

        <a class="registrarme" href="Registrarse.php">Registrarme</a>
    </div>
    <script src="Assets/js/nav.js"></script>
</body>
</html>