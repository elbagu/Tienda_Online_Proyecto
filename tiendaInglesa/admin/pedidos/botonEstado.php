<?php
session_start();
if (!isset($_SESSION['administrador'])){header('location:../index.php');}
    include('../../Funciones/conexion.php');
    $id = $_POST['id'];
    $estado = $_POST['estado'];
    try {
            $stmt = $conn->prepare("UPDATE pedido SET Entregado = ? WHERE Id_Pedido = ?;");
            $stmt->bind_param('ii', $estado, $id);
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
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }
    echo json_encode($respuesta);
