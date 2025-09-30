document.addEventListener( 'DOMContentLoaded', function () {
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
    case "Productos.php":
        document.getElementById('productos').classList.add('parado');
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

new Splide(('#card-slider1'), {
    perPage: 6,
    breakpoints: {
        600: {
            perPage: 2,
        }
    }
}).mount();
new Splide(('#card-slider2'), {
    perPage: 6,
    breakpoints: {
        600: {
            perPage: 2,
        }
    }
}).mount();

new Splide(('#card-slider3'), {
    perPage: 6,
    breakpoints: {
        600: {
            perPage: 2,
        }
    }
}).mount();

new Splide(('#card-slider4'), {
    perPage: 6,
    breakpoints: {
        600: {
            perPage: 2,
        }
    }
}).mount();
});

var inicio = 1;

function aumentar() {
    var cantidad = document.getElementById("cantidad").value = ++inicio;
}
function restar() {
    var cantidad = document.getElementById("cantidad").value = --inicio;
}
