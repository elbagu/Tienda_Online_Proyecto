<?php

session_start();
if (!isset($_SESSION['administrador'])){header('location:../index.php');}
    include('../../Funciones/conexion.php');
    $id_categoria = $_POST['Id_Categoria'];
    $nombre_categoria = $_POST['nombreCategoria'];
    try {
        // Realizar la consulta a la base de datos
        $stmt = $conn->prepare("UPDATE categoria set Nombre_Categoria = ? WHERE Id_Categoria = ? ");
        $stmt->bind_param('si',$nombre_categoria ,$id_categoria);
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