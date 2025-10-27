<?php
session_start();
if (!isset($_SESSION['administrador'])){header('location:../index.php');}

    include('../../Funciones/conexion.php');
    $id = $_POST['Id_producto'];
    $nombre = $_POST['nombreProducto'];
    $precio = $_POST['precioProducto'];
    $stock = $_POST['stockProducto'];
    $categoria = $_POST['categoriaProducto'];
    $marca = $_POST['marcaProducto'];
    $extranjero = $_POST['extranjero'];
    try {
        // Realizar la consulta a la base de datos
            $stmt = $conn->prepare("UPDATE producto SET Nombre_Producto = ?, Precio = ?, Stock = ?, Id_Categoria = ?, Id_Marca = ?, Extranjero=? WHERE Id_Producto = ?;");
            $stmt->bind_param('sdiiiii', $nombre,$precio,$stock,$categoria,$marca,$extranjero,$id);
            $stmt->execute();
        
        if($stmt->affected_rows > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
    } catch(Exception $e) {
        // En caso de un error, tomar la exepcion
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }
    echo json_encode($respuesta);

