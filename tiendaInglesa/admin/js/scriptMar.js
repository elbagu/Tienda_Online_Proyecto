eventListeners();
function eventListeners() {
    document.getElementById('agrProdu').addEventListener('mouseover', mostrarAñadirP);
    document.getElementById('agrProdu').addEventListener('mouseout', ocultarAñadirP);
    // Boton para una nueva categoria
    document.querySelector('.nueva-tarea').addEventListener('click', agregarMarca);
    // Botones para las acciones de las categorias
    document.querySelector('.listado-pendientes').addEventListener('click', accionesMarcas);
    
}
// agregar una nueva Categoria 
function agregarMarca(e) {
    e.preventDefault();
    var nombreMarca = document.querySelector('#nombreMarca').value;
    // Validar que el campo tenga algo escrito
    if(nombreMarca === '') {
        swal({
            title: 'Error',
            text: 'Una Marca no puede ir vacia',
            type:'error'
        })
    } else {
        // la tarea tiene algo, insertar en PHP
        // crear llamado a ajax
        var xhr = new XMLHttpRequest();
        // crear formdata
        var datos = new FormData();
        datos.append('nombreMarca',nombreMarca );
        // Abrir la conexion
        xhr.open('POST', 'añadirmarca.php', true);
        // ejecutarlo y respuesta
        xhr.onload = function() {
            if(this.status === 200) {
                // todo correcto
                console.log(xhr.responseText);
                var respuesta = JSON.parse(xhr.responseText);
                console.log(respuesta);
                // asignar valores
                var resultado = respuesta.respuesta,
                    marca = respuesta.marca,
                    id_insertado = respuesta.id_insertado;
                if(resultado === 'correcto') {
                    // se agregó correctamente
                        swal({
                          type: 'success',
                          title: 'Marca Añadida',
                          text: 'La Marca: ' + marca + ' se añadio correctamente'
                        });
                        // seleccionar el parrafo con la lista vacia
                        var parrafoListaVacia = document.querySelectorAll('.lista-vacia');
                        if(parrafoListaVacia.length > 0 ) {
                            document.querySelector('.lista-vacia').remove();
                        }
                        // construir el template
                       var nuevaCat = document.createElement('li');
                       // agregamos el ID
                       nuevaCat.id = 'marca:'+id_insertado;
                       // agregar la clase tarea
                       nuevaCat.classList.add('tarea');
                       // construir el html
                       nuevaCat.innerHTML = `
                            <p>${marca}</p>
                            <form class="actCat" method="POST">
                                <input type="text" class="Catactualizado" name="Catactualizado" id="Catactualizado">
                                <input type="submit" value="Actualizar" class="boton act">
                            </form>
                            <div class="acciones">
                                <i class="fas fa-pencil-alt"></i>
                                <i class="fas fa-trash"></i>
                            </div>
                       `;
                       // agregarlo al HTML
                       var listado = document.querySelector('.listado-pendientes ul');
                       listado.appendChild(nuevaCat);
                       // Limpiar el formulario
                       document.querySelector('.agregar-tarea').reset();
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
function accionesMarcas(e) {
    e.preventDefault();
    if(e.target.classList.contains('fa-pencil-alt')) {
       var formu = e.target.parentElement.parentElement.children[1];
       formu.style.display = "block";
    
       formu.lastElementChild.addEventListener('click',()=>{
        var marcaNueva = formu.firstElementChild.value;
        if(marcaNueva === '') {
            swal({
                title: 'Error',
                text: 'Una Marca no puede ir vacia',
                type:'error'
            })
        } else {
           var marcaActualizar = e.target.parentElement.parentElement;
           actualizarMarcaBD(marcaActualizar,marcaNueva);
           swal(
            'Actualizado!',
            'La Marca fue actualizada!.',
            'success'
          )
          formu.style.display = "none";
          var tituloCat = marcaActualizar.firstElementChild;
          tituloCat.textContent = marcaNueva;
        }
       });
    }
    
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
             var marcaEliminar = e.target.parentElement.parentElement;
            // Borrar de la BD
            eliminarMarcaBD(marcaEliminar);
            // Borrar del HTML
            marcaEliminar.remove();
            swal(
              'Eliminado!',
              'La Marca fue eliminada!.',
              'success'
            )
          }
        })
    } 
}
function eliminarMarcaBD(marca) {
    var idmarca = marca.id.split(':');
    var xhr = new XMLHttpRequest();
    var datos = new FormData();
    datos.append('Id_Marca', idmarca[1]);
    // abrir la conexion
    xhr.open('POST', 'eliminarmarca.php', true);
    // on load
    xhr.onload = function() {
        if(this.status === 200) {
            console.log(JSON.parse(xhr.responseText));
        }
    }
    // enviar la petición
    xhr.send(datos);
}
function actualizarMarcaBD(marca,marcaNueva) {
    var idmarca = marca.id.split(':');
    var xhr = new XMLHttpRequest();
    var datos = new FormData();
    datos.append('Id_Marca', idmarca[1]);
    datos.append('nombreMarca', marcaNueva);
    // abrir la conexion
    xhr.open('POST', 'actualizarmarca.php', true);
    // on load
    xhr.onload = function() {
        if(this.status === 200) {
            console.log(JSON.parse(xhr.responseText));
        }
    }
    // enviar la petición
    xhr.send(datos);
}
function mostrarAñadirP() {
    var boton = document.getElementById('adProdu');
    boton.style.display = "block";
}
function ocultarAñadirP() {
    var boton = document.getElementById('adProdu');
    boton.style.display = "none";
}

