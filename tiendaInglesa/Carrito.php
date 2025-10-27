<?php
session_start();
if(!isset($_SESSION['usuario'])){header("Location: index.php");}
session_write_close();
include('Funciones/conexion.php');
include('includes/header.php');


$repetido="no";
	
if(isset($_POST["precioProducto"])){

	$total=$_POST["precioProducto"]*$_POST["cantidad"];
	
	if(isset($_SESSION['total'])){
		$_SESSION['total']=$total+$_SESSION['total'];
	}
	else{
		$_SESSION['total']=$total;
	}
	if(isset($_SESSION['mi_carrito'])){
		for($i=0;$i<count($_SESSION['mi_carrito']);$i++){
			if($_SESSION['mi_carrito'][$i]["nombre"]==$_POST["nombreProducto"]){
				$_SESSION['mi_carrito'][$i]["cantidad"]=$_SESSION['mi_carrito'][$i]["cantidad"]+$_POST["cantidad"];
				$repetido="si";
			}
		}
	}
	if($repetido=="no"){
	$_SESSION["mi_carrito"][]=array("nombre"=>$_POST["nombreProducto"],"precio"=>$_POST["precioProducto"],"cantidad"=>$_POST["cantidad"],"id_producto"=>$_POST["Id_producto"],"imagen"=>$_POST["imagen"]);
	}
}
 ?>
<main class="main_carro">
<?php if(isset($_SESSION['mi_carrito']) && !empty($_SESSION['mi_carrito'])){
            ?>
    <h2>Mi Carrito</h2>
    <div class="cabezas">
        <p>Producto</p>
        <p>Precio</p>
        <p>Cantidad</p>
        <p>Total</p>
    </div>
    <div class="contenedor-carro">
        <ul>
        <?php for($i=0;$i<count($_SESSION['mi_carrito']);$i++){ ?>
            <li id="producto:<?php echo $i;?>" class="tarea">
            <div class="cont-img"><img src="Imagenes/<?php echo $_SESSION["mi_carrito"][$i]["imagen"]; ?>" alt=""></div>
                        <p id="titulo"><?php echo $_SESSION["mi_carrito"][$i]["nombre"]; ?></p>
                        <p id="precio"><?php echo $_SESSION["mi_carrito"][$i]["precio"]; ?></p>
                        <p id="cantidad"><?php echo $_SESSION["mi_carrito"][$i]["cantidad"]; ?></p>
                        <p id="total"><?php echo ($_SESSION["mi_carrito"][$i]["precio"] * $_SESSION["mi_carrito"][$i]["cantidad"]); ?></p>
                    <i onclick="eliminarProducto(<?php echo $i; ?>)" class="fas fa-trash"></i>
            </li>
            <?php }?>
        </ul>
    </div>

    <div class="detalle">
        <div class="tipo-envio">
            <h4>Como obtener tu pedido:</h4>
            <div>
                <div>
                <input type="radio" name="pedido" id="delivery">
                <label for="delivery">Delivery</label>
                </div>
                <div>
                <input type="radio" name="pedido" id="local">
                <label for="local">Retiro en local</label>
                </div>
            </div>
        </div>
        <div class="tipo-envio metodoPago">
        <h4>Seleccionar metodo de pago:</h4>
            <div>
                <div>
                <input type="radio" name="pago" id="visa">
                <label for="visa">Visa</label>
                </div>
                <div>
                <input type="radio" name="pago" id="master">
                <label for="master">Mastercard</label>
                </div>
                <div>
                <input type="radio" name="pago" id="paypal">
                <label for="paypal">Paypal</label>
                </div>
                <div>
                <input type="radio" name="pago" id="american">
                <label for="american">American Express</label>
                </div>
                <div id="divLocal">
                <input type="radio" name="pago" id="Plocal">
                <label for="Plocal">Pagar en local</label>
                </div>
            </div>
        </div>
        <div class="totales">
            <?php $_SESSION['total_iva']=$_SESSION['total']-(($_SESSION['total']*22)/100);
            $_SESSION['total_iva']=round($_SESSION['total_iva'] * 100)/100;
            ?>
            <h4>Total a pagar</h4>
            <div><p>Sub-Total</p><p id="totalPagar" >$<?php echo $_SESSION['total_iva'];?></p></div>
            <div><p>IVA - 22%</p><p id="Iva">$<?php echo  round((($_SESSION['total']*22)/100),2);?></p></div>
            <div><p>Total</p><p id="totalIva">$<?php echo $_SESSION['total'];?></p></div>
            <form action="" id="pago">
            <input type="submit" id="pagar" value="Pagar">
            </form>
        </div>
    </div>
    <p class="alert" id="alertaEnvio" >Debe seleccionar como recibir el pedido</p>
    <p class="alert" id="alertaPago">Debe seleccionar un metodo De pago</p>
    <?php } else {?>
        <h3>Carrito Vacio</h3>
        <div class="car"><i class="fas fa-shopping-basket"></i></div>
        
        <?php } 
        ?>
</main>

<?php
include('includes/footer.php');
?>