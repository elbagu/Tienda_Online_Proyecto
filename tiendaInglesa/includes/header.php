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
    <link rel="stylesheet" href="Assets/css/estilos.css">
    <link rel="stylesheet" href="Assets/css/splide.min.css">
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
                <li id="btnCat" class="categorias"><i class="fas fa-bars"></i><p>Categorias</p> 
                    <ul id="categorias"><?php
                    $consulta1 = mysqli_query($conn,"SELECT Id_Categoria, Nombre_Categoria from categoria;");
                    while($categoria= mysqli_fetch_array($consulta1)){
                        ?>
                        <li><a href="Categorias.php?categoria=<?php echo $categoria['Id_Categoria']?>"><?php echo $categoria['Nombre_Categoria']?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
            </ul>
            <a class="cont-logo" id="cont-logo" href="index.php"><img class="logo" src="Assets/Img/Logo_tienda_inglesa.png"></a>
            <form action="Buscador.php" method="POST">
            <input class="buscador" type="search" name="buscar" placeholder="Buscar productos...">
            <input class="botton" src="Assets/Img/lupita.png" type="image">
            </form>
            <ul id="userCosas" class="usuarioCosas"> 
                <li><a href="Funciones/ConfigurarUser.php?usuario=<?php echo $_SESSION['usuario'];?>">Mis Datos</a></li>
                <li><a href="Funciones/misPedidos.php?usuario=<?php echo $_SESSION['usuario'];?>">Mis Pedidos</a></li>
                <li><a href="Funciones/Logout.php">Cerrar Sesion</a></li>
            </ul>
            <?php if(isset($_SESSION['usuario'])){?>
                <p class="nombreUser">Hola, <?php echo $_SESSION['nombre_usuario']; ?></p>
            <?php } ?>
            <div class="iconos" <?php if(isset($_SESSION['usuario'])){ echo 'style="margin-left: 1%;"'; } ?> >
          <i id="user" class="fas fa-user usuario "  <?php if(isset($_SESSION['usuario'])){echo 'onclick="mostrarMenuUser();"';}else{echo 'onclick="mostrarLogin()"';}?>></i>
          <a <?php if(!isset($_SESSION['usuario'])){echo 'onclick="mostrarLogin()"';} else { ?> href="Carrito.php" <?php } ?> class="carro" ><i id="carro" class="fas fa-shopping-cart carrito"></i></a><span id="cantProductos" <?php if(isset($_SESSION['cant_productos'])){?> style="display: unset;" class="cant-productos"><?php echo $_SESSION['cant_productos'];}?></span>
            </div>
            
        </div>
        </div>
        <div class="MenuInferior">
            <a  href="Sobre_nosotros.php">
                <span>|</span><p id="nosotros">Sobre nosotros</p>
            </a>
            <a  href="Extranjeros.php">
                <span>|</span><p id="extranjeros">Productos extranjeros</p>
            </a>
            <a  href="Ofertas.php">
                <span>|</span><p id="ofertas">Ofertas</p>
            </a>
            <a    href="index.php">
                <p id="home">Home</p>
            </a>
        </div>
    </nav>

        <form class="login-div" id="login-div" action="" method="POST">
            <h2>Login<i id="cerrar" class="fas fa-times"></i></h2>
            <input type="email" name="email" id="email" placeholder="Tu correo electronico...">
            <p class="alert" id="alertUser">Error, El usuario no existe</p>
            <input type="password" id="contra" name="contraseña" placeholder="Tu contraseña...">
            <p class="alert" id="alertContra">Error, contraseña incorrecta</p>
            <p class="alert" id="alertVacio">Error, Completar ambos campos</p>
            <a class="recuperar" href="Funciones/recuperar.php">¿Olvidaste tu contraseña?</a>
            <div>
            <input type="submit" id="ingresar" value="Ingresar">
            <a class="registrarme" href="Registrarse.php">Registrarme</a>
            </div>
            
        </form>
