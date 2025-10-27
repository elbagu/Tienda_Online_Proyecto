<?php 
session_start();
if (!isset($_SESSION['administrador'])){header('location:../index.php');}
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
        <h1>Añadir Marca: </h1>
        <form method="POST" class="agregar-tarea" >
            <div class="campo">
                <input type="text" placeholder="Nombre Marca" name="nombreMarca" id="nombreMarca"> 
            </div>
            <div class="campo enviar">
                <input type="submit" class="boton nueva-tarea" value="Agregar">
            </div>
        </form>
        
        <h2>Marca:</h2>
        <div class="listado-pendientes">
            <ul>
            <?php
                 $registros=mysqli_query($conn,"SELECT * FROM marca ORDER BY Id_Marca ASC;");
                 while ($marca = mysqli_fetch_array($registros)){?>
                        <li id="marca:<?php echo $marca['Id_Marca']; ?>" class="tarea">
                            <p id="tituloCat"><?php echo $marca['Nombre_Marca']; ?></p>
                            <form class="actCat" method="POST">
                                <input type="text" class="Catactualizado" name="Catactualizado" id="Catactualizado">
                                <input type="submit" value="Actualizar" class="boton act">
                            </form>
                                
                            <div class="acciones">
                                <i class="fas fa-pencil-alt"></i>
                                <i class="fas fa-trash"></i>
                            </div>
                        </li>
                <?php }?>
            </ul>
        </div>
    </main>
</div><!--.contenedor-->
<?php
    include '../inc/templates/footer.php';
?>