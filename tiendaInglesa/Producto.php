<?php
include('Funciones/conexion.php');
include('includes/header.php');
$produ = $_GET["producto"];
$consulta2 = mysqli_query($conn, "SELECT * From producto as p INNER JOIN categoria as c on p.Id_Categoria=c.Id_Categoria INNER JOIN marca as m on p.Id_Marca=m.Id_Marca WHERE Id_Producto = $produ;");
while ($product = mysqli_fetch_array($consulta2)) {
?>
    <main>
        <div class="login-div debesDiv" id="debesDiv"><h2><i class="fas fa-exclamation-triangle"></i></h2><p>Debes Logerate para comprar</p></div>
        <div class="guia"><a class="indice" href="index.php">Home</a><span>/</span><a href="Categorias.php?categoria=<?php echo $product['Id_Categoria'];?>"><?php echo $product['Nombre_Categoria']; ?></a><span>/</span><a href="Producto.php?producto=<?php echo $product['Id_Producto']; ?>"><?php echo $product['Nombre_Producto']; ?></a></div>
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
            <input type="text" name="cantidad" id="cantidad" value="1" disabled> 
            <button class="mas" id="mas" onclick="aumentar()"><i class="fas fa-plus"></i></button>
            <form id="formCarrito" method="POST">
                <input type="hidden" name="id_Producto" value="<?php echo $product['Id_Producto']; ?>">
                <input type="hidden" name="nombre" value="<?php echo $product['Nombre_Producto']; ?>">
                <input type="hidden" name="imagen" value="<?php echo $product['Imagen']; ?>">
                <input type="hidden" name="precio" value="<?php echo $product['Precio']; ?>">
                <input type="hidden" name="maximo"  id="maximo" value="<?php echo $product['Stock']; ?>">
                <input <?php if(isset($_SESSION['usuario'])){ echo 'type="submit" onclick="cantidadProductos() ;"';}else{echo ' type="button" onclick="mostrarDebesLog();"'; }?>  value="Añadir" class="añadir" >
            </form>
          
        </div>
        </div>
        <div class="abajo">
            <h4>Productos Similares</h4>
        <div id="card-slider1" class="splide cont-productos">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php
                    $CATproducto = $product['Id_Categoria'];
                    $IDproducto = $product['Id_Producto'];
                    
                    $consulta3 = mysqli_query($conn, "SELECT * From producto as p INNER JOIN marca as m on p.Id_Marca=m.Id_Marca INNER JOIN categoria as c on p.Id_Categoria=c.Id_Categoria WHERE p.Id_Categoria=$CATproducto AND p.Stock > 2 AND p.Id_Producto != $IDproducto ORDER BY RAND () ;");
                    while ($producto = mysqli_fetch_array($consulta3)) {
                    ?>
                        <li class="splide__slide producto">
                            <a href="Producto.php?producto=<?php echo $producto['Id_Producto']; ?>" style="text-decoration: none;">
                                <div class="cont-img" style="height: 60%;">
                                    <img src="Imagenes/<?php echo $producto['Imagen']; ?>" alt=" Imagen-Producto">
                                </div>
                                <p class="nombre"><?php echo $producto['Nombre_Producto'] . " " . $producto['Nombre_Marca']; ?></p>
                                <p class="precio">$<?php echo $producto['Precio']; ?></p>
                            </a>
                        </li>
                    <?php
                    }
    }
        ?>
                </ul>
            </div>
        </div>
        </div>
    </main>
    <?php
    include('includes/footer.php');
    ?>