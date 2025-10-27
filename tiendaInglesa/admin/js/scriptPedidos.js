document.querySelector('.pedidos').addEventListener('click', interruptor);

function interruptor(e){
    e.preventDefault();
    if(e.target.classList.contains('fa-check-circle')) {
        if(e.target.classList.contains('completo')) {
            e.target.classList.remove('completo');
            cambiarEstadoPedido(e.target, 0);
        } else {
            e.target.classList.add('completo');
            cambiarEstadoPedido(e.target, 1);
        }
    }
}

function cambiarEstadoPedido(pedido, estado) {
    var idPedido = pedido.parentElement.parentElement.id.split(':');
    var xhr = new XMLHttpRequest();
    var datos = new FormData();
    datos.append('id', idPedido[1]);
    datos.append('estado', estado);
    xhr.open('POST', 'botonEstado.php', true);
    xhr.onload = function() {
        if(this.status === 200) {
            console.log(JSON.parse(xhr.responseText));
        }
    }
    xhr.send(datos);
}