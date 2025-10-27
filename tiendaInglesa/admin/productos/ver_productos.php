<?php
session_start();
if (!isset($_SESSION['administrador'])) {
    header('location:../index.php');
}
include('../../Funciones/conexion.php');
include '../inc/funciones/funciones.php';
include '../inc/templates/header.php';
include '../inc/templates/barra.php';

?>
<div class="contenedor">
    <?php
    include '../inc/templates/sidebar.php';
    ?>
    <main class="contenido-principal">
        <h1> Productos: </h1>
        <?php

// paginador
$registros0=mysqli_query($conn,"SELECT Id_Producto FROM producto;");
$numero_total_registros=mysqli_num_rows($registros0);
$TAMANO_PAGINA = 10;
       $pagina = false;
       if (isset($_GET["pagina"]))
           $pagina = $_GET["pagina"];
   if (!$pagina) {
       $inicio = 0;
       $pagina = 1;
   }
   else {
       $inicio = ($pagina - 1) * $TAMANO_PAGINA;
   }
   $total_paginas = ceil($numero_total_registros / $TAMANO_PAGINA);
   $registros1=mysqli_query($conn,"SELECT * FROM producto as p INNER JOIN marca as m on p.Id_Marca=m.Id_Marca ORDER BY Id_Producto ASC LIMIT ".$inicio."," .$TAMANO_PAGINA);
// paginador
?>
        <div class="listado-pendientes productos">
        <span>Stock</span>
            <span>Marca</span>
            <ul>
                <?php
                //$registros = mysqli_query($conn, "SELECT * FROM Producto ORDER BY Id_Producto ASC;");
                while ($producto = mysqli_fetch_array($registros1)) { ?>
                    <li id="producto:<?php echo $producto['Id_Producto']; ?>" class="tarea">
                        <div class="cont-img"><img src="../../Imagenes/<?php echo $producto['Imagen']; ?>" alt=""></div>
                        <p id="tituloCat"><?php echo $producto['Nombre_Producto']; ?></p>
                        <p id="marca"><?php echo $producto['Nombre_Marca']; ?></p>
                        <p id="stock"><?php echo $producto['Stock']; ?></p>
                        <div class="acciones">
                            <a href="Formactualizarproducto.php?Id_producto=<?php echo $producto['Id_Producto'];?>"><i class="fas fa-pencil-alt"></i></a>
                            <i class="fas fa-trash"></i>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <ul class="pagination">
                <?php
                if ($total_paginas > 1) {
                    if ($pagina != 1)
                        echo '<li><a href="ver_productos.php?pagina=' . ($pagina - 1) . '" aria-label="Previous">&laquo;</a></li>';
                    for ($i = 1; $i <= $total_paginas; $i++) {
                        if ($pagina == $i)
                            echo '<li class="active"><a href="#"><div >' . $pagina . '</div></a></li>';
                        else
                            echo ' <li><a href="ver_productos.php?pagina=' . $i . '">' . $i . '</a></li> ';
                    }
                    if ($pagina != $total_paginas)
                        echo '<li><a href="ver_productos.php?pagina=' . ($pagina + 1) . '" aria-label="Next">&raquo;</a></li>';
                }
                ?>
            </ul>
        </div>
    </main>
</div>
<!--.contenedor-->
<?php
include '../inc/templates/footer.php';
?>