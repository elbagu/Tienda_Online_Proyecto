<?php
session_start();
if (!isset($_SESSION['administrador'])){header('location:../index.php');}
    include('../../Funciones/conexion.php');
    
$id_marca = $_POST['Id_Marca'];
    try {
        // Realizar la consulta a la base de datos
        $stmt = $conn->prepare("DELETE FROM marca WHERE Id_Marca = ? ");
        $stmt->bind_param('i', $id_marca);
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