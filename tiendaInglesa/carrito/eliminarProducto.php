<?php 
session_start();

$restar=$_SESSION["mi_carrito"][$_POST["indice"]]["precio"]*$_SESSION["mi_carrito"][$_POST["indice"]]["cantidad"];

$_SESSION['cant_productos']=($_SESSION['cant_productos'])-($_SESSION["mi_carrito"][$_POST["indice"]]["cantidad"]);

$_SESSION['total']=$_SESSION['total']-$restar;

array_splice($_SESSION["mi_carrito"], $_POST["indice"], 1);
$respuesta = array(
    'cantidad' => $_SESSION['cant_productos'],
    'total' => $_SESSION['total']
);
echo json_encode($respuesta);  

?>