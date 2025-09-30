<?php
include('Funciones/conexion.php');
include('includes/header.php');
?>
<a href="Productos.php">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="7000">
                <img src="Assets/Img/Banner.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="Assets/Img/Banner2.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
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
                $consulta2 = mysqli_query($conn, "SELECT * From Producto as p INNER JOIN Marca as m on p.Id_Marca=m.Id_Marca WHERE p.Id_Categoria=1 ORDER BY RAND ();");
                while ($producto = mysqli_fetch_array($consulta2)) {
                ?>
                    <li class="splide__slide producto">
                        <a href="Producto.php?producto=<?php echo $producto['Id_Producto'];?>" style="text-decoration: none;">
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

    <div id="card-slider2" class="splide cont-productos">
        <div class="splide__track">
            <ul class="splide__list">
                <?php
                $consulta3 = mysqli_query($conn, "SELECT * From Producto as p INNER JOIN Marca as m on p.Id_Marca=m.Id_Marca WHERE p.Id_Categoria=2 ORDER BY RAND ();");
                while ($producto = mysqli_fetch_array($consulta3)) {
                ?>
                    <li class="splide__slide producto">
                        <a href="Producto.php?producto=<?php echo $producto['Id_Producto'];?>" style="text-decoration: none;">
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

</main>
<?php
include('includes/footer.php');
?>