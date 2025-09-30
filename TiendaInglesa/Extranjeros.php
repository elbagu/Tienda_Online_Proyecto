<?php
include('Funciones/conexion.php');
include('includes/header.php');
?>
<main>
<h2>Productos Extranjeros</h2>
<div class="cont-prductos">
    <?php
    $consulta2 = mysqli_query($conn, "SELECT * From Producto as p INNER JOIN Marca as m on p.Id_Marca=m.Id_Marca WHERE p.Extranjero=true;");
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