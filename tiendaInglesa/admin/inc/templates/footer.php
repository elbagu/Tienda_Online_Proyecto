<?php 
    $actual = obtenerPaginaActual();
    if($actual == 'index' ) {
        echo '<script src="js/formularios.js"></script>';
        echo '<script src="js/sweetalert2.all.min.js"></script>';
    } else if($actual == 'ver_categorias' ) {
        echo '<script src="../js/addboton.js"></script>';
        echo '<script src="../js/scriptCat.js"></script>';
        echo '<script src="../js/sweetalert2.all.min.js"></script>';
    }
    else if($actual == 'ver_marcas' ) {
        echo '<script src="../js/addboton.js"></script>';
        echo '<script src="../js/scriptMar.js"></script>';
        echo '<script src="../js/sweetalert2.all.min.js"></script>';
    }
    else if($actual == 'ver_productos') {
        echo '<script src="../js/addboton.js"></script>';
        echo '<script src="../js/scriptElmProdu.js"></script>';
        echo '<script src="../js/sweetalert2.all.min.js"></script>';
    }
    else if ($actual == 'Formañadirproducto'){
        echo '<script src="../js/addboton.js"></script>';
        echo '<script src="../js/scriptProduct.js"></script>';
        echo '<script src="../js/sweetalert2.all.min.js"></script>';
    }
    else if ($actual == 'Formactualizarproducto'){
        echo '<script src="../js/addboton.js"></script>';
        echo '<script src="../js/scriptActProdu.js"></script>';
        echo '<script src="../js/sweetalert2.all.min.js"></script>';
    }
    else if ($actual == 'ver_pedidos'){
        echo '<script src="../js/addboton.js"></script>';
        echo '<script src="../js/scriptPedidos.js"></script>';
        echo '<script src="../js/sweetalert2.all.min.js"></script>';
    }
    else{
        echo '<script src="../js/addboton.js"></script>';
        echo '<script src="../js/sweetalert2.all.min.js"></script>';
    }
?>


</body>
</html>