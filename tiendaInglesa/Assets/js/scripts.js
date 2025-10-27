document.addEventListener('DOMContentLoaded', function () {
    var ruta = self.location.href;
    var posicionUltimaBarra = ruta.lastIndexOf("/");
    var nombrePagina = ruta.substring(posicionUltimaBarra + "/".length, ruta.length);
    switch (nombrePagina) {
        case "index.php":
            document.getElementById('home').classList.add('parado');
            break;
        case "Extranjeros.php":
            document.getElementById('extranjeros').classList.add('parado');
            break;
        case "Ofertas.php":
            document.getElementById('ofertas').classList.add('parado');
            break;
        case "Sobre_nosotros.php":
            document.getElementById('nosotros').classList.add('parado');
            break;
        case "Registrarse.php":
            document.getElementById('user').classList.add('parado');
            break;
        case "Carrito.php":
            document.getElementById('carro').classList.add('parado');
            break;
        default:
            break;
    }
    document.getElementById('cerrar').addEventListener('click', ocultarLogin);
    

    new Splide(('#card-slider1'), {
        perPage: 6,
        breakpoints: {
            600: {
                perPage: 2,
            }
        }
    }).mount();



});
var btn = document.getElementById('btnCat');
var caat = document.getElementById('categorias');

function mostrarCat() {
    if( caat.style.display == "none"){
        caat.style.display = "block";
    }else{
        caat.style.display = "none";
    }
        
}
btn.addEventListener('click',mostrarCat,false);



function mostrarLogin() {
    var login = document.getElementById('login-div');
    login.style.display = "block";
}
function ocultarLogin() {
    var login = document.getElementById('login-div');
    login.style.display = "none";
}
function eliminarProducto(indice) {
    var indi = indice;
    var xhr = new XMLHttpRequest();
    var datos = new FormData();
    datos.append('indice', indi);
    xhr.open('POST', 'carrito/eliminarProducto.php', true);
    // ejecutarlo y respuesta
    xhr.onload = function () {
        try {
            var respuesta = JSON.parse(xhr.responseText);
            var cant = document.getElementById('cantProductos');
            if (respuesta.cantidad == 0) {
                window.location = "Carrito.php";
            }
            var total = respuesta.total;
            var iva = ((respuesta.total * 22) / 100);
            var total_iva = respuesta.total - iva;
            cant.textContent = respuesta.cantidad;
            document.getElementById('totalPagar').textContent = "$" + (Math.round(total_iva * 100) / 100);
            document.getElementById('Iva').textContent = "$" + (Math.round(iva * 100) / 100);
            document.getElementById('totalIva').textContent = "$" + (Math.round(total * 100) / 100);
            document.getElementById('producto:' + indi).remove();

        } catch (err) {
            document.getElementById('producto:' + indi).remove();
            window.location = "Carrito.php";
        }
    }
    xhr.send(datos);
}


function f_ordenar(buscar) {
    var busca = buscar;
    var orden = document.getElementById('MM').value;
    window.location = "Buscador.php?ordenar=" + orden + "&buscar=" + busca;
}

function C_ordenar(categoria) {
    var cate = categoria;
    var orden = document.getElementById('MM').value;
    window.location = "Categorias.php?categoria=" + cate + "&ordenar=" + orden;
}

function mostrarMenuUser() {
    var caja = document.getElementById('userCosas');
    if (caja.style.display == 'none') {
        caja.style.display = 'block';
    } else {
        caja.style.display = 'none';
    }
}

function mostrarDebesLog() {
    var login = document.getElementById('debesDiv');
    login.style.display = "block";
    setTimeout(ocultarDebes,3000);
    
}
function ocultarDebes() {
    var login = document.getElementById('debesDiv');
    login.style.display = "none"
}
document.getElementById('cerr').addEventListener('click', ocultarSuccess);

    function ocultarSuccess() {
        var login = document.getElementById('compraE').style.display = "none";
        window.location = "index.php";
    }
