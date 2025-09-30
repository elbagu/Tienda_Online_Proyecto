<?php
    define('INGLESA_HOST', 'localhost');
    define('INGLESA_DB_USUARIO', 'root');
    define('INGLESA_DB_PASSWORD', '');
    define('INGLESA_DB_DATABASE', 'tiendainglesa');

    $conn = new mysqli(INGLESA_HOST, INGLESA_DB_USUARIO, INGLESA_DB_PASSWORD, INGLESA_DB_DATABASE);

    if($conn->connect_error) {
      echo $conn->connect_error;
    }
