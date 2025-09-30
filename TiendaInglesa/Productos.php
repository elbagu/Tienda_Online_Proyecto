<?php
include('Funciones/conexion.php');
include('includes/header.php');
?>
<main>
    <?php
    $consulta2 = mysqli_query($conn, "SELECT * From Categoria");
    while ($categoria = mysqli_fetch_array($consulta2)) {
    ?>
        <a href="">
            <h4><?php echo $categoria['Nombre_Categoria']?></h4>
        </a>

        <div id="card-slider<?php echo $categoria['Id_Categoria'];?>" class="splide cont-productos">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php
                    $consulta4 = mysqli_query($conn, "SELECT * From Producto as p INNER JOIN Marca as m on p.Id_Marca=m.Id_Marca WHERE p.Id_Categoria=$categoria[Id_Categoria];");
                    while ($producto = mysqli_fetch_array($consulta4)) {
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
    <?php
    }
    ?>
</main>
<?php
include('includes/footer.php');
?>