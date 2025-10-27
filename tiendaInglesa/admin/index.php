<?php include("inc/funciones/funciones.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administracion Tienda Inglesa</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body class="login">
  
    <div class="contenedor-formulario">
        <div class="logoI"><img src="../Assets/Img/Logo_tienda_inglesa.png" alt="Administracion Tienda Inglesa"></div>
        <form id="formulario" class="caja-login" method="POST" >
            <div class="campo">
                <label for="usuario">Usuario: </label>
                <input type="text" name="usuario" id="usuario" placeholder="Usuario">
            </div>
            <div class="campo">
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <div class="campo enviar">
                <input type="submit" class="boton" value="Iniciar Sesión">
            </div>
        </form>
    </div>
<?php
include 'inc/templates/footer.php';
?>