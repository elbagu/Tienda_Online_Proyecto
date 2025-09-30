<?php
include('Funciones/conexion.php');
include('includes/header.php'); 
if (isset($_SESSION['usuario']) == false){
    header("Location: index.php");
}?>
<div class="cont-cargando">
<img class="cargando" src="Assets/Img/loading.gif" alt="Cargando...">
</div>

<?php
include('includes/footer.php'); 
?>


