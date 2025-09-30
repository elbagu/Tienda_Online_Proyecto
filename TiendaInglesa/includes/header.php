<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/css/splide.min.css">
    <link rel="stylesheet" href="Assets/css/estilo.css">
    <link rel="shortcut icon" type="image/x-icon" href="Assets/Img/favicon.ico">
    <title>Tienda Inglesa</title>
    <script src="https://kit.fontawesome.com/0de0c0c25e.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <nav>
        <div class="MenuSuperior">
        <a class="cont-logo" href="index.php"><img class="logo" src="Assets/Img/Logo_tienda_inglesa.png"></a>
            <ul class="menu">
                <li class="categorias"><i class="fas fa-bars"></i><p>Categorias</p> 
                    <ul><?php
                    $consulta1 = mysqli_query($conn,"SELECT Nombre_Categoria from Categoria;");
                    while($categoria= mysqli_fetch_array($consulta1)){
                        ?>
                        <li><a href="Productos.php"><?php echo $categoria['Nombre_Categoria']?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
            </ul>
            <a class="cont-logo" id="cont-logo" href="index.php"><img class="logo" src="Assets/Img/Logo_tienda_inglesa.png"></a>
            <input class="buscador" type="search" placeholder="&nbsp;&nbsp;&nbsp;Buscar productos...">
            <input class="botton <?php if(isset($_SESSION['usuario'])){ echo "ajuste";}?>" src="Assets/Img/lupita.png" type="image">
            <a href="Login.php" class="<?php if(isset($_SESSION['usuario'])){echo "inactivo";}?>" id="logo-usuario"><i id="user" class="fas fa-user usuario"></i></a>
            <a  class="carro" href="Carrito.php"> <i id="carro" class="fas fa-shopping-cart carrito"> </i></a>
            <a class=" logout <?php if(isset($_SESSION['usuario'])){ echo "activo";}else{echo "inactivo";} ?>" href="Logout.php">Cerrar Sesion</a>
            
        </div>
        </div>
        <div class="MenuInferior">
            <a  href="Sobre_nosotros.php">
                <span>|</span><p id="nosotros">Sobre nosotros</p>
            </a>
            <a  href="Extranjeros.php">
                <span>|</span><p id="extranjeros">Productos extranjeros</p>
            </a>
            <a  href="Productos.php">
                <span>|</span><p id="productos">Productos</p>
            </a>
            <a    href="index.php">
                <p id="home">Home</p>
            </a>
        </div>
    </nav>