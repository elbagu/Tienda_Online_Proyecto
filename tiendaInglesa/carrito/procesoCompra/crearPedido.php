<?php 
session_start();
if(!isset($_SESSION["usuario"])) {header("location: ../../index.php");}
if(!isset($_SESSION["mi_carrito"])){header("location:../../index.php");}
include("../../Funciones/conexion.php");

$Mpago = $_POST['pago'];
$recibir;
if($_POST['recibir'] == "local"){$recibir = 2;}
else {
    $recibir = 1;
}

$usuario = $_SESSION['usuario'];
$consulta = mysqli_query($conn,"SELECT CI FROM cliente WHERE Correo = '$usuario';");
$user = mysqli_fetch_array($consulta);
$ci_usuario = $user['CI'];
$pedido;
$registros=mysqli_query($conn,"SELECT Id_Pedido FROM lista_pedido WHERE Id_Pedido=(SELECT MAX(Id_Pedido) FROM lista_pedido);"); 
	if(mysqli_num_rows($registros)==0){
		$pedido=1;
	}
	else {
		$fila=mysqli_fetch_array($registros);
		$pedido=$fila["Id_Pedido"]+1;
	}

for($i=0; $i < count($_SESSION["mi_carrito"]); $i++){
	
	$idProducto = $_SESSION["mi_carrito"][$i]["id_producto"];
	$conStock = mysqli_query($conn,"SELECT Stock FROM producto WHERE Id_Producto = $idProducto;");$dato = mysqli_fetch_array($conStock);
	$stockP = $dato['Stock'];
	$cantidad = $_SESSION["mi_carrito"][$i]["cantidad"];
	
	mysqli_query($conn,"INSERT INTO lista_pedido (Id_Pedido,Id_Producto,Cantidad) VALUES ($pedido, $idProducto, $cantidad);");
	mysqli_query($conn,"UPDATE producto SET Stock =  $stockP - $cantidad WHERE Id_Producto = $idProducto;");

}

$total=$_SESSION["total"];
$fecha = date("Y-m-d");


mysqli_query($conn,"INSERT INTO pedido (Id_Pedido, CI_Cliente, Fecha, Id_Entrega,Metodo_Pago , Total) VALUES($pedido,$ci_usuario,'$fecha',$recibir,'$Mpago',$total);");

unset($_SESSION["mi_carrito"]);
unset($_SESSION["total"]);
unset($_SESSION["total_iva"]);
unset($_SESSION['cant_productos']);

echo "exito";