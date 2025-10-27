<?php 
session_start();
include("conexion.php");
include("fpdf/fpdf.php");
$pedido = $_GET['pedido'];
$cliente = $_SESSION['usuario'];
if(isset($_SESSION["usuario"]) && isset($_GET["pedido"])){
	
	$registros1=mysqli_query($conn,"SELECT * FROM lista_pedido as l INNER JOIN producto as p on p.Id_Producto=l.Id_Producto INNER JOIN marca as m on p.Id_marca=m.Id_Marca WHERE Id_Pedido = $pedido;");
	$registros2=mysqli_query($conn,"SELECT * FROM pedido WHERE Id_Pedido = $pedido;");
	$fila2=mysqli_fetch_array($registros2);
	$registros3=mysqli_query($conn,"SELECT * FROM cliente WHERE Correo='$cliente';");
	$fila3=mysqli_fetch_array($registros3);
	
	$pdf=new FPDF("P","pt","A4");
	$pdf->AddPage();
	$pdf->SetFont("Times","B",25);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(0,26,"Tienda Inglesa S.R.L",0,0,"L");
	
	
	$pdf->SetXY(30,75);
	$pdf->SetFont("Times","",12);
	$pdf->SetTextColor(0,0,0);

	$pdf->SetXY(30,100);
	$pdf->SetFont("Times","",17);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(280,13,utf8_decode("San Ramón - Av.Batlle Y Ordoñez"),0,0,"L");
	$pdf->SetTextColor(0,102,255);
	
	
	$pdf->image("../Assets/Img/logo.png",340,20,220,0,"png");
	
	$pdf->SetDrawColor(0,102,255);
	$pdf->Line(20,160,575,160);
	$pdf->Line(20,160.5,575,160.5);
	
	$pdf->SetXY(30,185);
	$pdf->SetFont("Times","B",12);
	$pdf->SetTextColor(0,102,255);
	$pdf->Cell(280,13,"Facturar a",0,0,"L");
	$pdf->Cell(55,13,"Fecha:",0,0,"L");
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont("Times","",12);
	$pdf->Cell(0,13,$fila2["Fecha"],0,1,"L");
	
	$pdf->SetXY(30,210);
	$pdf->SetFont("Times","",12);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(280,13,$fila3["Nombre"]." ".$fila3["Apellido"],0,0,"L");
	$pdf->SetTextColor(0,102,255);
	$pdf->SetFont("Times","B",12);
	$pdf->Cell(95,13,"Numero Factura:",0,0,"L");
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont("Times","",12);
	$pdf->Cell(0,13,$fila2["Id_Pedido"],0,1,"L");
	
	$pdf->SetXY(30,235);
	$pdf->SetFont("Times","",12);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(280,13,($fila3["Calle"]),0,0,"L");
	$pdf->SetTextColor(0,102,255);
	$pdf->SetFont("Times","B",12);
	$pdf->Cell(45,13,"Ciudad:",0,0,"L");
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont("Times","",12);
	$pdf->Cell(0,13,utf8_decode($fila3["Ciudad"]),0,1,"L");
	
	$pdf->SetXY(30,285);
	$pdf->SetFont("Times","",12);
	$pdf->SetFillColor(0,102,255);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(60,30,"Cantidad",1,0,"C",true);
	$pdf->Cell(270,30,utf8_encode("Descripcion"),1,0,"C",true);
	$pdf->Cell(105,30,"Precio Unitario",1,0,"C",true);
	$pdf->Cell(105,30,"Importe",1,1,"C",true);
	
	while($fila1=mysqli_fetch_array($registros1)){
		$pdf->SetX(30);
		$pdf->SetFont("Times","",9);
		$pdf->SetTextColor(0,0,0);
		$pdf->Cell(60,30,$fila1["Cantidad"],1,0,"C");
		$pdf->Cell(270,30,utf8_decode($fila1["Nombre_Producto"]) . " " . utf8_decode($fila1["Nombre_Marca"]) ,1,0,"C");
		$pdf->Cell(105,30,"$ ".$fila1["Precio"],1,0,"C");
		$pdf->Cell(105,30,"$ ".($fila1["Cantidad"]*$fila1["Precio"]),1,1,"C");
	}
	
	
	$pdf->SetFont("Times","",11);
	$pdf->Cell(450,20,"",0,1,"R");
	$pdf->Cell(450,20,"Subtotal:",0,0,"R");
	$pdf->Cell(80,20,"$ ".$fila2["Total"]- round((($fila2["Total"]*22)/(100))*100)/(100),0,1,"L");
	
	$pdf->Cell(450,20,"I.V.A. 22%:",0,0,"R");
	$pdf->Cell(80,20,"$ ".round((($fila2["Total"]*22)/(100))*100)/(100),0,1,"L");
	
	$pdf->Cell(450,20,"TOTAL:",0,0,"R");
	$pdf->Cell(80,20,"$ ".round((($fila2["Total"]))*100)/(100),0,0,"L");
	
	$pdf->SetXY(30,773);
	$pdf->SetFont("Times","U",12);
	$pdf->SetTextColor(0,102,255);
	$pdf->Cell(85,12,"Forma de Pago:",0,0,"L");
	$pdf->SetFont("Times","B",12);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(190,12,$fila2["Metodo_Pago"],0,0,"L");
	$pdf->SetXY(500,773);
	$pdf->SetFont("Times","",12);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(0,12,"IVA al dia",0,0,"L");
	$pdf->Output("factura.pdf","I");
}

else header("location:../index.php");
?>