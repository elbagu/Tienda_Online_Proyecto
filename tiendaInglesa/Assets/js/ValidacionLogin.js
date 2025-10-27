
document.querySelector('#login-div').addEventListener('submit', validarLogin);

function validarLogin(e) {
    e.preventDefault();
    var usuario = document.querySelector('#email').value,
        password = document.querySelector('#contra').value;
        if(usuario === '' || password === ''){
            campoVacio(e);
        } else {
            document.getElementById('alertVacio').style.display = "none"; 
            var datos = new FormData();
            datos.append('email', usuario);
            datos.append('contraseña', password);
            // crear el llamado a ajax
            var xhr = new XMLHttpRequest();
            // abrir la conexión.
            xhr.open('POST', 'Login.php', true);
            // retorno de datos
            xhr.onload = function(){
                if(this.status === 200) {
                    var respuesta = JSON.parse(xhr.responseText);
                    console.log(respuesta);
                    // Si la respuesta es correcta
                    if(respuesta.respuesta == 'correcto') {
                        window.location = "index.php";
                    } else if(respuesta.respuesta == 'erroruser') {
                        usuarioIncorrecto(e);
                    }
                    else if(respuesta.respuesta == 'errorcontra') {
                        document.getElementById('alertUser').style.display = "none"; 
                        contraseñaIncorrecta(e);
                    }
                }
            }
            // Enviar la petición
            xhr.send(datos);
        }
}

function campoVacio(e) {
    e.preventDefault();
 document.getElementById('alertVacio').style.display = "block";              
}
function usuarioIncorrecto(e) {
    e.preventDefault();
 document.getElementById('alertUser').style.display = "block";              
}
function contraseñaIncorrecta(e) {
    e.preventDefault();
 document.getElementById('alertContra').style.display = "block";              
}
