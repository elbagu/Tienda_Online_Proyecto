<?php 
session_start();
$cantidad_producto=$_POST["cantidad"];
if(isset($_SESSION['cant_productos'])){
    $_SESSION['cant_productos']=$cantidad_producto+$_SESSION['cant_productos'];
}
else{
    $_SESSION['cant_productos']=$cantidad_producto;
}

echo $_SESSION['cant_productos'];

?>