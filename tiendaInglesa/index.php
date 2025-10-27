<?php

include('Funciones/conexion.php');
include('includes/header.php');
?>
<div class="compra-exsitosa" id="compraE" <?php if(isset($_GET['exito'])){ echo 'style = "display: block"';}?> >
    <h3>Compra Exitosa<i id="cerr" class="fas fa-times"></i></h3>
    <i class="fas fa-thumbs-up pulgar"></i>
    <p>Para mas detalles revisar en "<a href="Funciones/misPedidos.php?usuario=<?php echo $_SESSION['usuario'];?>">Mis Pedidos</a>"</p>
</div>
<a href="Ofertas.php">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="7000">
                <img src="Assets/Img/Banner.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img src="Assets/Img/Banner2.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img src="Assets/Img/Banner3.webp" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
</a>
<main>
    <div id="card-slider1" class="splide cont-productos">
        <div class="splide__track">
            <ul class="splide__list">
                <?php
                $consulta2 = mysqli_query($conn, "SELECT * From producto as p INNER JOIN marca as m on p.Id_Marca=m.Id_Marca WHERE p.Id_Categoria=1 AND p.Stock > 2 ORDER BY RAND ();");
                while ($producto = mysqli_fetch_array($consulta2)) {
                ?>
                    <li class="producto splide__slide ">
                        <span class="descu">Oferta</span>
                        <a href="Producto.php?producto=<?php echo $producto['Id_Producto']; ?>" style="text-decoration: none;">
                            <div class="cont-img">
                                <img src="Imagenes/<?php echo $producto['Imagen']; ?>" alt=" Imagen-Producto">
                            </div>
                            <p class="nombre"><?php echo $producto['Nombre_Producto'] . " " . $producto['Nombre_Marca']; ?></p>
                            <p class="precio">$<?php echo $producto['Precio']; ?></p>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>


    <div class="add">
        <img src="Assets/Img/Skip.webp" alt="Oferta">
    </div>

    <div class="cont-productos2">
        <h2>Ofertas Semanales</h2>
        <?php
        $consulta3 = mysqli_query($conn, "SELECT * From producto as p INNER JOIN marca as m on p.Id_Marca=m.Id_Marca INNER JOIN oferta as o ON o.Id_Producto=p.Id_Producto WHERE o.Id_Producto=p.Id_Producto AND p.Stock > 2 ORDER BY RAND () LIMIT 4;");
        while ($producto = mysqli_fetch_array($consulta3)) {
        ?>
            <div class="producto">
                <span class="descu">Oferta</span>
                <a href="Producto.php?producto=<?php echo $producto['Id_Producto']; ?>" style="text-decoration: none;">
                    <div class="cont-img">
                        <img src="Imagenes/<?php echo $producto['Imagen']; ?>" alt=" Imagen-Producto">
                    </div>
                    <p class="nombre"><?php echo $producto['Nombre_Producto'] . " " . $producto['Nombre_Marca']; ?></p>
                    <p class="precio">$<?php echo $producto['Precio']; ?></p>
                </a>

            </div>
        <?php
        }
        ?>
    </div>

</main>
<?php
include('includes/footer.php');
?>