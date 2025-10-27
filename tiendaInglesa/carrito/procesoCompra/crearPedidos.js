document.getElementById('pagar').addEventListener('click', crearPedido);
document.getElementById('local').addEventListener("change",activarPagarAca);
document.getElementById('delivery').addEventListener("change",desactivarPagarAca);
function crearPedido(e) {
    e.preventDefault();
    var delivery = document.getElementById('delivery');
    var local = document.getElementById('local');
    if (delivery.checked == false && local.checked == false) {
        document.getElementById("alertaEnvio").style.display = "block";
    }
    else {
        document.getElementById("alertaEnvio").style.display = "none";
        if (local.checked == true) {
            var recibir = "local";}
        else { var recibir = "delivery"; }
        var visa = document.getElementById('visa'); var master = document.getElementById('master'); var paypal = document.getElementById('paypal'); var american = document.getElementById('american'); var pLocal = document.getElementById('Plocal');
        if (visa.checked == false && master.checked == false && paypal.checked == false && american.checked == false && pLocal.checked == false) {
            document.getElementById("alertaPago").style.display = "block";
        }
        else {
            document.getElementById("alertaPago").style.display = "none";
            var pago;
            if (visa.checked == true) { pago = "Visa" } else if (master.checked == true) { pago = "Master Card" } else if (paypal.checked == true) { pago = "PayPal" } else if (american.checked == true) { pago = "American Express" } else if (pLocal.checked == true) { pago = "Pago en Local" }
            var xhr = new XMLHttpRequest();
            var datos = new FormData();
            datos.append('recibir', recibir);
            datos.append('pago', pago);
            xhr.open('POST', 'carrito/procesoCompra/crearPedido.php', true);
            // ejecutarlo y respuesta
            xhr.onload = function () {
                var respuesta = xhr.responseText;
                if(respuesta == "exito"){
                    window.location = "index.php?exito=1";
                }
                else{
                    window.location = "index.php?exito=2";
                }
            }
            xhr.send(datos);
        }
    }
}
function activarPagarAca(e) {
    e.preventDefault();
    document.getElementById("divLocal").style.display = "flex";
}
function desactivarPagarAca(e) {
    e.preventDefault();
    document.getElementById("divLocal").style.display = "none";
}