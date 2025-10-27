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
    <?php include '../inc/templates/sidebar.php'; ?>

    <main class="contenido-principal">

        <h1> Pedidos:</h1>
        <?php
        // paginador
        $registros0 = mysqli_query($conn, "SELECT Id_Pedido FROM pedido;");
        $numero_total_registros = mysqli_num_rows($registros0);
        $TAMANO_PAGINA = 10;
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
        $registros1 = mysqli_query($conn, "SELECT * FROM pedido as p INNER JOIN cliente as c on c.CI=p.Ci_Cliente LIMIT " . $inicio . "," . $TAMANO_PAGINA);
        // paginador
        ?>

        <div class="listado-pendientes pedidos">
            <div class="titulos">
                <h3>Id</h3>
                <h3>Cliente</h3>
                <h3>Fecha</h3>
                <h3>Total</h3>
                <h3>Entregado</h3>
            </div>
            <ul>
           <?php
                while ($pedido = mysqli_fetch_array($registros1)) { ?>
                    <li id="pedido:<?php echo $pedido['Id_Pedido']; ?>" class="tarea">
                        <p id="id">ID:<?php echo $pedido['Id_Pedido']; ?></p>
                        <p id="tituloCat"><?php echo $pedido['Nombre'] . " " . $pedido['Apellido']; ?></p>
                        <p id="marca"><?php echo $pedido['Fecha']; ?></p>
                        <p id="stock">$<?php echo $pedido['Total']; ?></p>
                        <div class="acciones">
                        <i class="far fa-check-circle <?php echo ($pedido['Entregado'] === '1' ? 'completo' : ''); ?>"></i>
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