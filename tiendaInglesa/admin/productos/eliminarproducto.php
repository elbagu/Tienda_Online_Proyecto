<?php

session_start();
if (!isset($_SESSION['administrador'])){header('location:../index.php');}
    include('../../Funciones/conexion.php');
    
$id_producto = $_POST['Id_Producto'];
$registros = mysqli_query($conn,"SELECT Imagen FROM producto WHERE Id_Producto = $id_producto;");
$producto=mysqli_fetch_array($registros);
    try {
        // Realizar la consulta a la base de datos
        unlink("../../Imagenes/".$producto['Imagen']);
        $stmt = $conn->prepare("DELETE FROM producto WHERE Id_Producto = ? ");
        $stmt->bind_param('i', $id_producto);
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
        $conn->close();
    } catch(Exception $e) {
        // En caso de un error, tomar la exepcion
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }
    
    echo json_encode($respuesta);