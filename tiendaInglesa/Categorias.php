<?php
include('Funciones/conexion.php');
include('includes/header.php');
$categoria = $_GET["categoria"];
$registros0 = mysqli_query($conn, "SELECT Id_Producto, Nombre_Categoria FROM producto as p INNER JOIN categoria as c on p.Id_Categoria=c.Id_Categoria WHERE p.Id_Categoria = $categoria AND p.Stock > 2;");
$cate = mysqli_fetch_array($registros0);
?>
<main class="productos_busca">
    <div class="cont_MM">
    <div class="guia"><a class="indice" href="index.php">Home</a><span>/</span><a href="Categorias.php?categoria=<?php echo $categoria;?>"><?php echo $cate['Nombre_Categoria'];?></a></div>
    <form onchange="C_ordenar(<?php echo $categoria;?>);" method="POST">    
    <select name="ordenar" id="MM">
            <option value="" disabled selected>-- Ordenar por Precio---</option>
            <option value="menor">Menor a Mayor</option>
            <option value="mayor">Mayor a menor</option>
        </select>
    </form>
    </div>
    <div class="cont-productos3">
        <?php

        if(isset($_GET['ordenar'])){
            if($_GET['ordenar'] == "menor"){
                $consulta2 = mysqli_query($conn, "SELECT * From producto as p INNER JOIN categoria as c on p.Id_Categoria=c.Id_Categoria INNER JOIN marca as m on p.Id_Marca=m.Id_Marca WHERE p.Id_Categoria = $categoria AND p.Stock > 2 ORDER BY p.Precio ASC ;");
            }
            else if($_GET['ordenar'] == "mayor"){
                $consulta2 = mysqli_query($conn, "SELECT * From producto as p INNER JOIN categoria as c on p.Id_Categoria=c.Id_Categoria INNER JOIN marca as m on p.Id_Marca=m.Id_Marca WHERE p.Id_Categoria = $categoria AND p.Stock > 2 ORDER BY p.Precio DESC;");
            }
        }
        else{
            $consulta2 = mysqli_query($conn, "SELECT * From producto as p INNER JOIN categoria as c on p.Id_Categoria=c.Id_Categoria INNER JOIN marca as m on p.Id_Marca=m.Id_Marca WHERE p.Id_Categoria = $categoria AND p.Stock > 2 ORDER BY p.Id_Producto ASC ;");
        }
        
        while ($product = mysqli_fetch_array($consulta2)) {
        ?>
            <div class="producto">
                <a href="Producto.php?producto=<?php echo $product['Id_Producto']; ?>" style="text-decoration: none;">
                    <div class="cont-img">
                        <img src="Imagenes/<?php echo $product['Imagen']; ?>" alt=" Imagen-Producto">
                    </div>
                    <p class="nombre"><?php echo $product['Nombre_Producto'] . " " . $product['Nombre_Marca']; ?></p>
                    <p class="precio">$<?php echo $product['Precio']; ?></p>
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