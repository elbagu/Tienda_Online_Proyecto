eventListeners();
function eventListeners() {
    document.getElementById('agrProdu').addEventListener('mouseover', mostrarAñadirP);
    document.getElementById('agrProdu').addEventListener('mouseout', ocultarAñadirP);
}
function mostrarAñadirP() {
    var boton = document.getElementById('adProdu');
    boton.style.display = "block";
}
function ocultarAñadirP() {
    var boton = document.getElementById('adProdu');
    boton.style.display = "none";
}
