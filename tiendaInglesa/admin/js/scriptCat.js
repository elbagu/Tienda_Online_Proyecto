eventListeners();
function eventListeners() {
    document.getElementById('agrProdu').addEventListener('mouseover', mostrarAñadirP);
    document.getElementById('agrProdu').addEventListener('mouseout', ocultarAñadirP);
    // Boton para una nueva categoria
    document.querySelector('.nueva-tarea').addEventListener('click', agregarCategoria);
    // Botones para las acciones de las categorias
    document.querySelector('.listado-pendientes').addEventListener('click', accionesCategorias);
    
}
// agregar una nueva Categoria 
function agregarCategoria(e) {
    e.preventDefault();
    var nombreCategoria = document.querySelector('#nombreCategoria').value;
    // Validar que el campo tenga algo escrito
    if(nombreCategoria === '') {
        swal({
            title: 'Error',
            text: 'Una Categoria no puede ir vacia',
            type:'error'
        })
    } else {
        // la tarea tiene algo, insertar en PHP
        // crear llamado a ajax
        var xhr = new XMLHttpRequest();
        // crear formdata
        var datos = new FormData();
        datos.append('nombreCategoria',nombreCategoria );
        // Abrir la conexion
        xhr.open('POST', 'añadircategoria.php', true);
        // ejecutarlo y respuesta
        xhr.onload = function() {
            if(this.status === 200) {
                // todo correcto
                console.log(xhr.responseText);
                var respuesta = JSON.parse(xhr.responseText);
                console.log(respuesta);
                // asignar valores
                var resultado = respuesta.respuesta,
                    categoria = respuesta.categoria,
                    id_insertado = respuesta.id_insertado;
                if(resultado === 'correcto') {
                    // se agregó correctamente
                        swal({
                          type: 'success',
                          title: 'Categoria Añadida',
                          text: 'La Categoria: ' + categoria + ' se añadio correctamente'
                        });
                        // seleccionar el parrafo con la lista vacia
                        var parrafoListaVacia = document.querySelectorAll('.lista-vacia');
                        if(parrafoListaVacia.length > 0 ) {
                            document.querySelector('.lista-vacia').remove();
                        }
                        // construir el template
                       var nuevaCat = document.createElement('li');
                       // agregamos el ID
                       nuevaCat.id = 'categoria:'+id_insertado;
                       // agregar la clase tarea
                       nuevaCat.classList.add('tarea');
                       // construir el html
                       nuevaCat.innerHTML = `
                            <p>${categoria}</p>
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
function accionesCategorias(e) {
    e.preventDefault();
    if(e.target.classList.contains('fa-pencil-alt')) {
       var formu = e.target.parentElement.parentElement.children[1];
       formu.style.display = "block";
    
       formu.lastElementChild.addEventListener('click',()=>{
        var categoriaNueva = formu.firstElementChild.value;
        if(categoriaNueva === '') {
            swal({
                title: 'Error',
                text: 'Una Categoria no puede ir vacia',
                type:'error'
            })
        } else {
           var categoriaActualizar = e.target.parentElement.parentElement;
           actualizarCategoriaBD(categoriaActualizar,categoriaNueva);
           swal(
            'Actualizado!',
            'La categoria fue actualizada!.',
            'success'
          )
          formu.style.display = "none";
          var tituloCat = categoriaActualizar.firstElementChild;
          tituloCat.textContent = categoriaNueva;
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
             var categoriaEliminar = e.target.parentElement.parentElement;
            // Borrar de la BD
            eliminarCategoriaBD(categoriaEliminar);
            // Borrar del HTML
            categoriaEliminar.remove();
            swal(
              'Eliminado!',
              'La Categoria fue eliminada!.',
              'success'
            )
          }
        })
    } 
}
function eliminarCategoriaBD(categoria) {
    var idcategoria = categoria.id.split(':');
    var xhr = new XMLHttpRequest();
    var datos = new FormData();
    datos.append('Id_Categoria', idcategoria[1]);
    // abrir la conexion
    xhr.open('POST', 'eliminarcategoria.php', true);
    // on load
    xhr.onload = function() {
        if(this.status === 200) {
            console.log(JSON.parse(xhr.responseText));
        }
    }
    // enviar la petición
    xhr.send(datos);
}
function actualizarCategoriaBD(categoria,categoriaNueva) {
    var idcategoria = categoria.id.split(':');
    var xhr = new XMLHttpRequest();
    var datos = new FormData();
    datos.append('Id_Categoria', idcategoria[1]);
    datos.append('nombreCategoria', categoriaNueva);
    // abrir la conexion
    xhr.open('POST', 'actualizarcategoria.php', true);
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










