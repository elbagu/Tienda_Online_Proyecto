<?php
include('Funciones/conexion.php');
include('includes/header.php');
?>
<main>
<h3>Productos Extranjeros</h3>
<div class="cont-productos3 .ext">
    <?php
    $consulta2 = mysqli_query($conn, "SELECT * From producto as p INNER JOIN marca as m on p.Id_Marca=m.Id_Marca WHERE p.Extranjero=true AND p.Stock > 2;");
    while ($producto = mysqli_fetch_array($consulta2)) {
    ?>
        <div class="producto FL">
            <a href="Producto.php?producto=<?php echo $producto['Id_Producto'];?>" style="text-decoration: none;">
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