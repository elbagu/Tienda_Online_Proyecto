<?php
include('Funciones/conexion.php');
include('includes/header.php');
?>
<main class="ofertas">
    <h3>Ofertas</h3>
    <div class="cont-productos3">
        <?php
        $registros0 = mysqli_query($conn, "SELECT Id_Oferta From oferta  LIMIT 15;");
        $numero_total_registros = mysqli_num_rows($registros0);
        $TAMANO_PAGINA = 12;
        $pagina = false;
        if (isset($_GET["pagina"]))
            $pagina = $_GET["pagina"];
        if (!$pagina) {
            $inicio = 0;
            $pagina = 1;
        } else {
            $inicio = ($pagina - 1) * $TAMANO_PAGINA;
        }
        $total_paginas = ceil($numero_total_registros / $TAMANO_PAGINA);
        // paginador
        $consulta4 = mysqli_query($conn, "SELECT * From producto as p INNER JOIN marca as m on p.Id_Marca=m.Id_Marca INNER JOIN oferta as o on o.Id_Producto=p.Id_Producto WHERE o.Id_Producto=p.Id_Producto AND p.Stock > 2 LIMIT $inicio , $TAMANO_PAGINA");
        while ($producto = mysqli_fetch_array($consulta4)) {
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
    <ul class="pagination">
            <?php
            if ($total_paginas > 1) {
                if ($pagina != 1)
                    echo '<li><a href="Ofertas.php?pagina=' . ($pagina - 1) . '" aria-label="Previous">&laquo;</a></li>';
                for ($i = 1; $i <= $total_paginas; $i++) {
                    if ($pagina == $i)
                        echo '<li class="active"><a href="#"><div >' . $pagina . '</div></a></li>';
                    else
                        echo ' <li><a href="Ofertas.php?pagina=' . $i . '">' . $i . '</a></li> ';
                }
                if ($pagina != $total_paginas)
                    echo '<li><a href="Ofertas.php?pagina=' . ($pagina + 1) . '" aria-label="Next">&raquo;</a></li>';
            }
            ?>
        </ul>
</main>
<?php
include('includes/footer.php');
?>