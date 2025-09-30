<?php
include('Funciones/conexion.php');
session_start();

if(isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $ci = $_POST['ci'];
    $email = $_POST['email'];
    $ciudad = $_POST['ciudad'];
    $direccion = $_POST['direccion'];
    $contraseña = MD5($_POST['contraseña']);

    mysqli_query($conn, "INSERT INTO cliente (CI, Nombre, Apellido, Correo, Ciudad, Calle, Contraseña) VALUES ($ci,'$nombre','$apellido','$email','$ciudad','$direccion','$contraseña');");
    header("Location: Login.php");
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
    <title>Registro </title>
    <script src="https://kit.fontawesome.com/0de0c0c25e.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
<div class="header">
<a class="flecha-atras" href="Login.php"><i class="fas fa-long-arrow-alt-left"></i><p>Volver</p></a>
    <a class="logo-reg" href="index.php"><img class="logo" src="Assets/Img/Logo_tienda_inglesa.png" alt=""></a>
    </div>
<div class="contenedor">
        <h2>Registro de Usuario</h2>
        <form class="contacto" action="" method="POST">

        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" placeholder="Tu nombre...">

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" placeholder="Tu apellido...">

        <label for="ci">Cedula de Identidad:</label>
        <input type="number" name="ci" id="ci" placeholder="Tu cedula de identidad...">

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="Tu correo electronico...">

        <label for="ciudad">Ciudad:</label>
        <select name="ciudad" id="ciudad">
            <option value="" disabled selected>-- Seleccione su ciudad</option>
            <option value="San Ramón">San Ramón</option>
            <option value="San Bautista">San Bautista</option>
            <option value="Santa Rosa">Santa Rosa</option>
            <option value="Tala">Tala</option>
            <option value="Chamizo">Chamizo</option>
        </select>

        <label for="direccion">Direccion:</label>
        <input type="text" name="direccion" id="direccion" placeholder="EJ. Calle ...">

        <label for="contraseña">Contraseña: </label>
        <input type="password" name="contraseña" id="contraseña" placeholder="Tu contraseña...">

        <label for="n-contraseña">Confirmar Contraseña: </label>
        <input type="password" name="n-contraseña" id="n-contraseña" placeholder="Tu contraseña nuevamente...">
        
        <input type="submit" value="Registrarme">
        </form>
</div>
<script src="Assets/js/nav.js"></script>
</body>
</html>