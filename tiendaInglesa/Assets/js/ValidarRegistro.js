document.querySelector('#registro-div').addEventListener('submit', validarRegistro);

function validarRegistro(e) {
    e.preventDefault();

    var nombre = document.querySelector('#nombre').value,
        apellido = document.querySelector('#apellido').value,
        ci = document.querySelector('#ci').value,
        email = document.querySelector('#email').value,
        ciudad = document.querySelector('#ciudad').value,
        direccion = document.querySelector('#direccion').value,
        contraseña = document.querySelector('#contraseña').value,
        contraseñaN = document.querySelector('#Ncontraseña').value;

    // Validar campos vacíos
    if(nombre === '' || apellido === '' || email === '' || ciudad === '' || direccion === '' || contraseña === '' || contraseñaN === '') {
        campoVacio(e);
        return;
    }

    // Validar cédula
    if(ci.length !== 8) {
        cedulaErronea(e);
        return;
    }

    // Validar contraseñas
    if(contraseña !== contraseñaN) {
        contraseñaIncorrecta(e);
        return; 
    }

    // Si pasa todas las validaciones, enviar datos
    var datos = new FormData();
    datos.append('nombre', nombre);
    datos.append('apellido', apellido);
    datos.append('ci', ci);
    datos.append('email', email);
    datos.append('ciudad', ciudad);
    datos.append('direccion', direccion);
    datos.append('contraseña', contraseña);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'Funciones/registrarUser.php', true);
    
    xhr.onload = function() {
        if(this.status === 200) {
            try {
                console.log('Respuesta del servidor:', xhr.responseText); // Para depuración
                var respuesta = JSON.parse(xhr.responseText);
                if(respuesta.respuesta === 'correcto') {
                    window.location = "index.php";
                } else {
                    alert("Error al registrar usuario: " + (respuesta.mensaje || 'Error desconocido'));
                }
            } catch (error) {
                console.error('Error al parsear JSON:', xhr.responseText);
                alert("Error en la respuesta del servidor");
            }
        } else {
            console.error('Error en la petición:', xhr.status);
            alert("Error en la conexión con el servidor");
        }
    }

    xhr.onerror = function() {
        console.error('Error de red');
        alert("Error de conexión con el servidor");
    }

    xhr.send(datos);
}

function cedulaErronea(e) {
    e.preventDefault();
 document.getElementById('alertCedula').style.display = "block";              
}

function campoVacio(e) {
    e.preventDefault();
 document.getElementById('alertVacio').style.display = "block";              
}
function contraseñaIncorrecta(e) {
    e.preventDefault();
 document.getElementById('alertContra').style.display = "block";              
}
