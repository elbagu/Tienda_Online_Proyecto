document.querySelector('.listado-pendientes').addEventListener('click', accionesProductos);
function accionesProductos(e) {
    
    if(e.target.classList.contains('fa-trash')) {
        swal({
          title: 'Seguro(a)?',
          text: "Esta acción no se puede deshacer",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, borrar!',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.value) {
             var productoEliminar = e.target.parentElement.parentElement;
            // Borrar de la BD
            eliminarProductoBD(productoEliminar);
            // Borrar del HTML
            productoEliminar.remove();
            swal(
              'Eliminado!',
              'El producto fue eliminado!.',
              'success'
            )
          }
        })
    } 
}
function eliminarProductoBD(producto) {
    var idproducto = producto.id.split(':');
    var xhr = new XMLHttpRequest();
    var datos = new FormData();
    datos.append('Id_Producto', idproducto[1]);
    // abrir la conexion
    xhr.open('POST', 'eliminarproducto.php', true);
    // on load
    xhr.onload = function() {
        if(this.status === 200) {
            console.log(JSON.parse(xhr.responseText));
        }
    }
    // enviar la petición
    xhr.send(datos);
}