
var formulario = document.getElementById('formulario'),
nombre = formulario.nombre,
precio = formulario.precio,
stock = formulario.stock,
categoria = formulario.categoria,
marca = formulario.marca,
idP = formulario.idP;
eventListeners();
function eventListeners() {
    formulario.addEventListener('submit',actualizarProducto);
}
function actualizarProducto(e) {
    validaciones(e);
    var box = document.getElementById('extranjero');
    var extranjero;
    if(box.checked == true){extranjero = 1;}else{extranjero = 0;}
    if(nombre.value != '' && precio.value != '' && stock.value != '' && categoria.value != '' && marca.value != ''){
        var xhr = new XMLHttpRequest();
        // crear formdata
        var datos = new FormData();
        console.log(idP.value,nombre.value,precio.value,stock.value,marca.value,categoria.value,extranjero);
        datos.append('Id_producto', idP.value);
        datos.append('nombreProducto', nombre.value);
        datos.append('precioProducto', parseFloat(precio.value) );
        datos.append('stockProducto', stock.value);
        datos.append('categoriaProducto', categoria.value);
        datos.append('marcaProducto', marca.value);
        datos.append('extranjero', extranjero);
        // Abrir la conexion
        xhr.open('POST', 'actualizarproducto.php', true);
        // ejecutarlo y respuesta
        xhr.onload = function() {
            if(this.status === 200) {
                // todo correcto
                console.log(xhr.responseText);
                var respuesta = JSON.parse(xhr.responseText);
                console.log(respuesta);
                // asignar valores
                var resultado = respuesta.respuesta
                if(resultado === 'correcto') {
                    // se agregó correctamente
                        swal({
                          type: 'success',
                          title: 'Producto Acualizado',
                          text: 'El Producto se actualizo correctamente'
                        })
                        .then(resultado => {
                            // redireccionar
                       window.location = "ver_productos.php";
                        })
                       
                       
                } else {
                    // hubo un error
                    swal({
                      type: 'error',
                      title: 'Error!',
                      text: 'Hubo un error'
                    })
                }
            }
        }
        // Enviar la consulta
        xhr.send(datos);
    }
}
function validaciones(e) {
    validarNombre(e);
    validarPrecio(e);
    validarStock(e);
    validarCategoria(e);
    validarMarca(e);
}
function validarNombre(e){
    e.preventDefault();
    var alerta = document.getElementById("alertNombre");
    if(nombre.value == ''){
        alerta.style.display = 'block';
    }else{
        alerta.style.display = 'none';
    }
}
function validarPrecio(e){
    e.preventDefault();
    var alerta = document.getElementById("alertPrecio");
    if(precio.value == ''){
        alerta.style.display = 'block';
    }else{
        alerta.style.display = 'none';
    }
}
function validarStock(e){
    e.preventDefault();
    var alerta = document.getElementById("alertStock");
    if(stock.value == ''){
        alerta.style.display = 'block';
    }else{
        alerta.style.display = 'none';
    }
}
function validarCategoria(e){
    e.preventDefault();
    var alerta = document.getElementById("alertCategoria");
    if(categoria.value == ''){
        alerta.style.display = 'block';
    }else{
        alerta.style.display = 'none';
    }
}
function validarMarca(e){
    e.preventDefault();
    var alerta = document.getElementById("alertMarca");
    if(marca.value == ''){
        alerta.style.display = 'block';
    }else{
        alerta.style.display = 'none';
    }
}