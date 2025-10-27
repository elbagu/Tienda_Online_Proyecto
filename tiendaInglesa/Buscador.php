<?php
include('Funciones/conexion.php');
include('includes/header.php');

if(isset($_POST['buscar'])){
if($_POST['buscar']=="" ){
    if( !isset($_GET['buscar'])){
        header('location:index.php');
    }
} 
}
if(!isset($_POST['buscar'])){
    $buscar = mysqli_real_escape_string($conn,$_GET['buscar']);
}else{
    $buscar=mysqli_real_escape_string($conn,$_POST['buscar']);
}
if(isset($_GET['ordenar'])){
    if($_GET['ordenar'] == "menor"){
        $registros0 = mysqli_query($conn, "SELECT * FROM producto as p INNER JOIN categoria as c on p.Id_Categoria=c.Id_Categoria INNER JOIN marca as m on p.Id_Marca=m.Id_Marca WHERE p.Nombre_Producto LIKE '%$buscar%' OR c.Nombre_Categoria LIKE '%$buscar%' OR m.Nombre_Marca LIKE '%$buscar%' ORDER BY p.Precio ASC;");
    }
    else if($_GET['ordenar'] == "mayor"){
        $registros0 = mysqli_query($conn, "SELECT * FROM producto as p INNER JOIN categoria as c on p.Id_Categoria=c.Id_Categoria INNER JOIN marca as m on p.Id_Marca=m.Id_Marca WHERE p.Nombre_Producto LIKE '%$buscar%' OR c.Nombre_Categoria LIKE '%$buscar%' OR m.Nombre_Marca LIKE '%$buscar%' ORDER BY p.Precio DESC;");
    }
}
else{
    $registros0 = mysqli_query($conn, "SELECT * FROM producto as p INNER JOIN categoria as c on p.Id_Categoria=c.Id_Categoria INNER JOIN marca as m on p.Id_Marca=m.Id_Marca WHERE p.Nombre_Producto LIKE '%$buscar%' OR c.Nombre_Categoria LIKE '%$buscar%' OR m.Nombre_Marca LIKE '%$buscar%';");
}

if(mysqli_num_rows($registros0)>0){
?>
<main class="productos_busca">
    <a href="Ofertas.php" class="ima"><img src="Assets/Img/Banner3.webp" alt=""></a>
<div class="cont_MM">
    <form onchange="f_ordenar('<?php echo $buscar;?>');">
    <select name="ordenar" id="MM">
            <option value="" disabled selected>-- Ordenar por Precio---</option>
            <option value="menor">Menor a Mayor</option>
            <option value="mayor">Mayor a menor</option>
        </select>
    </form>
    </div>
    <div class="cont-productos3">
        <?php
        while ($product = mysqli_fetch_array($registros0)) {
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
<?php }
else { ?>
<div class="no_encontrado">
<i class="fas fa-exclamation-triangle"></i>
    <h3>Lo sentimos, no hemos encontrado ningún resultado</h3>
</div>
    
    <?php } ?>
<?php
include('includes/footer.php');
?>