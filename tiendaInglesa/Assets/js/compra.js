
var maximo = document.getElementById('maximo').value;
var inicio = 1;
function aumentar() {
    if (inicio < 100 && inicio < maximo) {
        var cantidad = document.getElementById("cantidad").value = ++inicio;
    }
}
function restar() {
    if (inicio > 1) {
        var cantidad = document.getElementById("cantidad").value = --inicio;
    }
}

function añadirCarrito() {
    var formulario = document.getElementById('formCarrito'),
        id_Producto = formulario.id_Producto,
        nombreProducto = formulario.nombre,
        precio = formulario.precio,
        imagen = formulario.imagen;
    var cantidad = document.getElementById("cantidad");
    var xhr = new XMLHttpRequest();
    // crear formdata
    var datos = new FormData();
    datos.append('Id_producto', id_Producto.value);
    datos.append('nombreProducto', nombreProducto.value);
    datos.append('precioProducto', parseFloat(precio.value));
    datos.append('cantidad', cantidad.value);
    datos.append('imagen', imagen.value);
    // Abrir la conexion
    xhr.open('POST', 'Carrito.php', true);
    // ejecutarlo y respuesta
    // Enviar la consulta
    xhr.send(datos);
}

function cantidadProductos() {
    var cantidad = document.getElementById("cantidad");
    var xhr = new XMLHttpRequest();
    var datos = new FormData();
    datos.append('cantidad', cantidad.value);
    xhr.open('POST', 'carrito/cantidadproductos.php', true);
    // ejecutarlo y respuesta
    xhr.onload = function () {
        var respuesta = xhr.responseText;
        var cant = document.getElementById('cantProductos');
        cant.style.display = 'unset';
        cant.textContent = respuesta;
        añadirCarrito();
    }
    xhr.send(datos);
}
