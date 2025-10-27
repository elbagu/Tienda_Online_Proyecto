var botonEsp = document.getElementById('btnesp');
var botonIng = document.getElementById('btning');
var ingles = document.getElementById('ingles');
var espa = document.getElementById('espa');

botonEsp.addEventListener('click', mostrarEspa);
botonIng.addEventListener('click', mostrarIngles);

function mostrarIngles(e) {
    e.preventDefault();
    espa.style.display = "none";
    ingles.style.display = "block";
    //window.location = "Sobre_nosotros.php";
}

function mostrarEspa(e) {
    e.preventDefault();
    ingles.style.display = "none";
    espa.style.display = "block";
    
    //window.location = "Sobre_nosotros.php";
}