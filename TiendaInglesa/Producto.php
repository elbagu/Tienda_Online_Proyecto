<?php
include('Funciones/conexion.php');
include('includes/header.php');
$produ = $_GET["producto"];
$consulta2 = mysqli_query($conn, "SELECT * From Producto as p INNER JOIN Categoria as c on p.Id_Categoria=c.Id_Categoria INNER JOIN Marca as m on p.Id_Marca=m.Id_Marca WHERE Id_Producto = $produ;");
while ($product = mysqli_fetch_array($consulta2)) {
    $categoria = $product['Id_Categoria'];
?>
    <main>
        <div class="guia"><a class="indice" href="index.php">Home</a><span>/</span><a href="Productos.php"><?php echo $product['Nombre_Categoria']; ?></a><span>/</span><a href="Producto.php?producto=<?php echo $product['Id_Producto']; ?>"><?php echo $product['Nombre_Producto']; ?></a></div>
        <div class="izquierda">
            <div class="cont-img">
                <img src="Imagenes/<?php echo $product['Imagen']; ?>" alt="Producto">
            </div>
        </div>
        <div class="derecha">
            <h3><?php echo $product['Nombre_Producto'] . " " . $product['Nombre_Marca']; ?></h3>
            <div class="precio">
                <p>Precio:</p><span>$ <?php echo $product['Precio'] ?></span>
            </div>
            <div><button id="menos" class="menos" onclick="restar()">
                <i class="fas fa-minus"></i></button>
            <input type="text" name="cantidad" id="cantidad" value="1" > 
            <button class="mas" id="mas" onclick="aumentar()"><i class="fas fa-plus"></i></button>
            <button class="añadir">Añadir</button>
        </div>
        </div>
        <div class="abajo">
            <h4>Productos Similares</h4>
   
        <div id="card-slider1" class="splide cont-productos">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php
                    $consulta3 = mysqli_query($conn, "SELECT * From Producto as p INNER JOIN Marca as m on p.Id_Marca=m.Id_Marca WHERE p.Id_Categoria=$categoria ORDER BY RAND () ;");
                    while ($producto = mysqli_fetch_array($consulta3)) {
                    ?>
                        <li class="splide__slide producto">
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
        </div>
        <?php
    }
        ?>

    </main>
    <?php
    include('includes/footer.php');
    ?>