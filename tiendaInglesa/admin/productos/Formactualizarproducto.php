<?php
session_start();
if (!isset($_SESSION['administrador']) && $_GET['Id_producto']!="") {
    header('location:../index.php');
}
include('../../Funciones/conexion.php');
include '../inc/funciones/funciones.php';
include '../inc/templates/header.php';
include '../inc/templates/barra.php';
$id = $_GET['Id_producto'];
$registros = mysqli_query($conn,"SELECT * FROM producto as p INNER JOIN categoria as c on p.Id_Categoria=c.Id_Categoria INNER JOIN marca as m on p.Id_Marca=m.Id_Marca WHERE Id_Producto = $id;");
$producto=mysqli_fetch_array($registros);
?>
<div class="contenedor">
    <?php
    include '../inc/templates/sidebar.php';
    ?>
    <main class="contenido-principal">
        <h1>Actualizar Producto: </h1>

        <div class="cont-form">
            <form id="formulario" class="contacto" method="POST">
                <div>
                    <label for="nombre">Nombre Producto: </label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $producto['Nombre_Producto'];?>">
                </div>
                <p class="alert" id="alertNombre">El Nombre del producto es Obligatorio</p>
                <div>
                    <label for="precio">Precio:</label>
                    <input type="text" name="precio" id="precio" value="<?php echo $producto['Precio'];?>">
                </div>
                <p class="alert ocultar" id="alertPrecio">El Precio del producto es Obligatorio</p>
                <div>
                    <label for="stock">Stock:</label>
                    <input type="number" name="stock" id="stock" value="<?php echo $producto['Stock'];?>">
                </div>
                <p class="alert ocultar" id="alertStock">El Stock del producto es Obligatorio</p>
                <div>
                    <label for="categoria">Categoria:</label>
                    <select name="categoria" id="categoria">
                        <?php
                        $consulta1 = mysqli_query($conn, "SELECT * FROM categoria;");
                        while ($categoria = mysqli_fetch_array($consulta1)) { ?>
                            <option value="<?php echo $categoria['Id_Categoria'];?>" <?php if($categoria['Id_Categoria']==$producto['Id_Categoria']){echo "selected";}?> ><?php echo $categoria['Nombre_Categoria'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <p class="alert ocultar" id="alertCategoria">La Categoria del producto es Obligatoria</p>
                <div>
                    <label for="marca">Marca:</label>
                    <select name="marca" id="marca">
                        <?php
                        $consulta2 = mysqli_query($conn, "SELECT * FROM marca;");
                        while ($marca = mysqli_fetch_array($consulta2)) { ?>
                            <option value="<?php echo $marca['Id_Marca'];?>" <?php if($marca['Id_Marca']==$producto['Id_Marca']){echo "selected";}?>  ><?php echo $marca['Nombre_Marca'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <p class="alert ocultar" id="alertMarca">La Marca del producto es Obligatoria</p>
                <div>
                    <label for="extranjero">Producto extranjero</label>
                    <input type="checkbox" name="extranjero" id="extranjero" <?php if($producto['Extranjero']==1){echo "checked";}?>>
                    <p>Dicho producto podra ser comercializado a nivel internacional</p>
                </div>
                <input type="hidden" name="idP" id="idP" value="<?php echo $producto['Id_Producto'];?>">

                <input type="submit" value="Actualizar" id="actualizarProducto">
            </form>
        </div>
    </main>
</div>
<!--.contenedor-->
<?php
include '../inc/templates/footer.php';
?>