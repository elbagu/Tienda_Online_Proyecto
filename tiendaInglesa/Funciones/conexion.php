<?php
   define('INGLESA_HOST', 'localhost');
   define('INGLESA_DB_USUARIO', 'id17883196_root');
   define('INGLESA_DB_PASSWORD', 'Tienda_1234$');
   define('INGLESA_DB_DATABASE', 'id17883196_tiendainglesa');
    $conn = new mysqli(INGLESA_HOST, INGLESA_DB_USUARIO, INGLESA_DB_PASSWORD, INGLESA_DB_DATABASE);

    if($conn->connect_error) {
      echo $conn->connect_error;
    }

    $conn->set_charset("utf8");
?>
