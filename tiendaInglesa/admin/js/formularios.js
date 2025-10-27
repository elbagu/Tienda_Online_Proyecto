
eventListeners();

function eventListeners() {
    document.querySelector('#formulario').addEventListener('submit', validarRegistro);
}


function validarRegistro(e) {
    e.preventDefault();
    
    var usuario = document.querySelector('#usuario').value,
        password = document.querySelector('#password').value;
        
        if(usuario === '' || password === ''){
            // la validación falló
            swal({
              type: 'error',
              title: 'Error!',
              text: 'Ambos campos son obligatorios!'
            })
        } else {
           
            var datos = new FormData();
            datos.append('usuario', usuario);
            datos.append('password', password);
            
            // crear el llamado a ajax
            var xhr = new XMLHttpRequest();
            
            // abrir la conexión.
            xhr.open('POST', 'inc/modelos/modelo-admin.php', true);
            
            // retorno de datos
            xhr.onload = function(){
                if(this.status === 200) {
                    var respuesta = JSON.parse(xhr.responseText);
                    
                    console.log(respuesta);
                    // Si la respuesta es correcta
                    if(respuesta.respuesta === 'correcto') {
                        // si es un nuevo usuario
                        
                            swal({
                                title: 'Login Correcto',
                                text: 'Presiona OK para Acceder',
                                type: 'success'
                            })
                            .then(resultado => {
                                if(resultado.value) {
                                    window.location.href = 'pedidos/ver_pedidos.php';
                                }
                            })
                        
                    } else {
                        // Hubo un error
                        swal({
                            title: 'Error',
                            text: 'Usuario o Contraseña Incorrecto',
                            type: 'error'
                        })
                    }
                }
            }
            
            // Enviar la petición
            xhr.send(datos);
            
        }
}