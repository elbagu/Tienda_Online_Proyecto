<?php
include('conexion.php');
$usuario = $_GET['usuario'];
$consulta = mysqli_query($conn,"SELECT * FROM cliente WHERE Correo = '$usuario';");
$cliente = mysqli_fetch_array($consulta);
$CI = $cliente['CI'];
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

<main class="mainPedidos">

 <h2>Mis Pedidos</h2>
    <div class="cabezasP">
        <p>Fecha</p>
        <p>Metodo de Pago</p>
        <p>Estado</p>
        <p>Recibido en:</p>
        <p>Total</p>
    </div>
    <div class="misPedidos">
        <ul>
        <?php 
        $consulta2 = mysqli_query($conn,"SELECT * FROM pedido WHERE CI_Cliente = $CI GROUP BY Id_Pedido;");
        while($pedido = mysqli_fetch_array($consulta2)){ ?>
            <li id="producto:<?php echo $i;?>" class="pedido">
                        <p id="fecha"><?php echo $pedido['Fecha']; ?></p>
                        <p id="pago"><?php echo $pedido['Metodo_Pago']; ?></p>
                        <p id="estado"><?php if($pedido['Entregado'] == 1){echo "Entregado";}else{echo "Pendiente";} ?></p>
                        <p id="metodo"><?php if($pedido['Entregado'] != 0){if($pedido['Id_Entrega'] == 1){echo "Domicilo";}else{echo "Local";}}else { echo "-----------";} ?></p>
                        <p id="total">$ <?php echo  $pedido['Total']; ?></p>
                        <p>Ver Factura </p><i class="fas fa-arrow-right"></i>
                        <a target='_blank' href='verFactura.php?pedido=<?php echo $pedido['Id_Pedido'];?>'><img src='../Assets/Img/pdf.png' alt='Descargar factura' width='80px'></a>
            </li>
            <?php }?>
        </ul>
    </div>

</main>




</body>
</html>

<?php


?>