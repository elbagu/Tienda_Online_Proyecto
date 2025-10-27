<?php
include('conexion.php');
$usuario = $_GET['usuario'];
$consulta = mysqli_query($conn,"SELECT * FROM cliente WHERE Correo = '$usuario';");
$cliente = mysqli_fetch_array($consulta);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/estilos.css">
    <link rel="shortcut icon" type="image/x-icon" href="Assets/Img/favicon.ico">
    <title>Datos Usuario </title>
    <script src="https://kit.fontawesome.com/0de0c0c25e.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
<div class="header">
<a class="flecha-atras" href="../index.php"><i class="fas fa-long-arrow-alt-left"></i><p>Volver</p></a>
    <a class="logo-reg" href="../index.php"><img class="logo" src="../Assets/Img/Logo_tienda_inglesa.png" alt=""></a>
    </div>
<div class="contenedor">
        <h2>Mis datos</h2>
        <form class="contacto" action="" id="registro-div" method="POST">

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" value="<?php echo $cliente['Correo'];?>">

        <label for="ciudad">Ciudad:</label>
        <select name="ciudad" id="ciudad">
            <option value="San Ramón" <?php if($cliente['Ciudad']=="San Ramón"){echo "selected";}?>>San Ramón</option>
            <option value="San Bautista" <?php if($cliente['Ciudad']=="San Bautista"){echo "selected";}?>>San Bautista</option>
            <option value="Santa Rosa" <?php if($cliente['Ciudad']=="Santa Rosa"){echo "selected";}?>>Santa Rosa</option>
            <option value="Tala" <?php if($cliente['Ciudad']=="Tala"){echo "selected";}?>>Tala</option>
            <option value="Chamizo" <?php if($cliente['Ciudad']=="Chamizo"){echo "selected";}?>>Chamizo</option>
        </select>

        <label for="direccion">Direccion:</label>
        <input type="text" name="direccion" id="direccion" value="<?php echo $cliente['Calle'];?>">

        <input type="submit"  value="Editar">
        </form>
</div>
<script src="Assets/js/ValidarRegistro.js"></script>
</body>
</html>

<?php

if(isset($_POST['direccion'])){

    $ci = $cliente['CI'];
    $email = $_POST['email'];
    $ciudad = $_POST['ciudad'];
    $direccion = $_POST['direccion'];

        $stmt = $conn->prepare("UPDATE cliente SET  Correo = ?, Ciudad = ?, Calle = ? WHERE CI = $ci");
        $stmt->bind_param('sss',$email,$ciudad,$direccion);
        $stmt->execute();
        header('Location: ../index.php');
       

}

?>