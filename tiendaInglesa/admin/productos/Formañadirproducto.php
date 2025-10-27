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
        <h1>Añadir Producto: </h1>

        <div class="cont-form">
            <form id="formulario" class="contacto" method="POST">
                <div>
                    <label for="nombre">Nombre Producto: </label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre del producto...">
                </div>
                <p class="alert" id="alertNombre">El Nombre del producto es Obligatorio</p>
                <div>
                    <label for="precio">Precio:</label>
                    <input type="text" name="precio" id="precio" placeholder="Precio del producto...">
                </div>
                <p class="alert ocultar" id="alertPrecio">El Precio del producto es Obligatorio</p>
                <div>
                    <label for="stock">Stock:</label>
                    <input type="number" name="stock" id="stock" placeholder="Stock del producto...">
                </div>
                <p class="alert ocultar" id="alertStock">El Stock del producto es Obligatorio</p>
                <div>
                    <label for="categoria">Categoria:</label>
                    <select name="categoria" id="categoria">
                        <option value="" disabled selected>-- Seleccione la categoria</option>
                        <?php
                        $consulta1 = mysqli_query($conn, "SELECT * FROM categoria;");
                        while ($categoria = mysqli_fetch_array($consulta1)) { ?>
                            <option value="<?php echo $categoria['Id_Categoria'];?>"><?php echo $categoria['Nombre_Categoria'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <p class="alert ocultar" id="alertCategoria">La Categoria del producto es Obligatoria</p>
                <div>
                    <label for="marca">Marca:</label>
                    <select name="marca" id="marca">
                        <option value="" disabled selected>-- Seleccione la marca</option>
                        <?php
                        $consulta2 = mysqli_query($conn, "SELECT * FROM marca;");
                        while ($categoria = mysqli_fetch_array($consulta2)) { ?>
                            <option value="<?php echo $categoria['Id_Marca'];?>"><?php echo $categoria['Nombre_Marca'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <p class="alert ocultar" id="alertMarca">La Marca del producto es Obligatoria</p>
                <div>
                    <label for="imagen">Imagen del producto:</label>
                    <input type="file" name="imagen">
                </div>
                <p class="alert ocultar" id="alertImagen">La Imagen del producto es Obligatoria</p>
                <div>
                    <label for="extranjero">Producto extranjero</label>
                    <input type="checkbox" name="extranjero" id="extranjero">
                    <p>Dicho producto podra ser comercializado a nivel internacional</p>
                </div>

                <input type="submit" value="Agregar" class="nuevo-producto">
            </form>
        </div>
    </main>
</div>
<!--.contenedor-->
<?php
include '../inc/templates/footer.php';
?>