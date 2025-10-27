<?php
include('Funciones/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/css/estilos.css">
    <link rel="shortcut icon" type="image/x-icon" href="Assets/Img/favicon.ico">
    <title>Registro </title>
    <script src="https://kit.fontawesome.com/0de0c0c25e.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
<div class="header">
<a class="flecha-atras" href="index.php"><i class="fas fa-long-arrow-alt-left"></i><p>Volver</p></a>
    <a class="logo-reg" href="index.php"><img class="logo" src="Assets/Img/Logo_tienda_inglesa.png" alt=""></a>
    </div>
<div class="contenedor">
        <h2>Registro de Usuario</h2>
        <form class="contacto" action="" id="registro-div" method="POST">

        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" placeholder="Tu nombre...">

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" placeholder="Tu apellido...">

        <label for="ci">Cedula de Identidad:</label>
        <input type="number" name="ci" id="ci" placeholder="Ej:42587510">
        <p class="alert" id="alertCedula">Error, La cedula contiene 8 digitios</p>
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="Ej: correo@gmail.com">

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
        <input type="text" name="direccion" id="direccion" placeholder="Ej: Calle ...">

        <label for="contraseña">Contraseña: </label>
        <input type="password" name="contraseña" id="contraseña" placeholder="Tu contraseña...">

        <label for="n-contraseña">Confirmar Contraseña: </label>
        <input type="password" name="n-contraseña" id="Ncontraseña" placeholder="Tu contraseña nuevamente...">
        <p class="alert" id="alertContra">Error, Las contraseñas no coinciden</p>
        <p class="alert" id="alertVacio">Error, Completar todos los campos</p>
        <input type="submit"  value="Registrarme">
        </form>
</div>
<script src="Assets/js/ValidarRegistro.js"></script>
</body>
</html>