<footer>
    <div class="izquierda">
        <div class="uno">
        <span>Contactanos</span>
        <p> - Horarios:</p>
        <p>8:00 a 21:00</p>
        <p class="linea"> - Linea Telefonica</p>
        <p>0800 50 20 Int. 5461</p>
        </div>
        <div class="dos">
        <span>Informacion</span>
        <a href="Sobre_nosotros.php"> - La Empresa</a>
        <a href="Sobre_nosotros.php"> - Nuestra Ubicacion</a>
        <a href="Sobre_nosotros.php"> - Pagina de Contacto</a>
        </div>
        
    </div>
    <div class="derecha">
        <span>Seguinos en:</span>
        <div class="contenido">
            <a class="face" target="_blank" href="https://www.facebook.com/tiendainglesa/"><i class="fa fa-facebook"></i></a>
            <a class="twi" target="_blank" href="https://twitter.com/TiendaInglesa?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><i class="fa fa-twitter"></i></a>
            <a class="insta" target="_blank" href="https://www.instagram.com/tiendainglesa/?hl=es-la"><i class="fa fa-instagram"></i></a>
            <a class="you" target="_blank" href="https://www.youtube.com/channel/UCIkcbiwcwfNOFtrDxNlKXiA"><i class="fa fa-youtube-play"></i></a>
        </div>
        <div class="tarjetas">
        <img src="Assets/Img/tarjetas.png" alt="Tipos de tarjetas">
    </div>
    <p class="bina">Binarium &copy; Todos los derechos reservados</p>
    
    </div>
   
</footer>

<script src="Assets/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="Assets/js/splide.min.js"></script>
<script src="Assets/js/ValidacionLogin.js"></script>
<?php $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    
    if($pagina == "Carrito"){
    echo '<script src="carrito/procesoCompra/crearPedidos.js"></script>';
    }
    if($pagina == "Producto"){
        echo '<script src="Assets/js/compra.js"></script>';
        }
        if($pagina == "Sobre_nosotros"){
            echo '<script src="Assets/js/sobreNosotros.js"></script>';
            }
    ?>
    
<script src="Assets/js/scripts.js"></script>
<?php
        if($pagina == "Sobre_nosotros"){
            echo '<script src="Assets/js/sobreNosotros.js"></script>';
            }
    ?>

</body>
</html>