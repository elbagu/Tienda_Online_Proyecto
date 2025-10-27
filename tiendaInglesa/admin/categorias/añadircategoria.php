<?php
$Categoria = $_POST['nombreCategoria'];
session_start();
if (!isset($_SESSION['administrador'])){header('location:../index.php');}

    include('../../Funciones/conexion.php');

    try {
        // Realizar la consulta a la base de datos
        $stmt = $conn->prepare("INSERT INTO categoria (Nombre_Categoria) VALUES (?);");
        $stmt->bind_param('s', $Categoria);
        $stmt->execute();
        if($stmt->affected_rows > 0) {
            $respuesta = array(
                'respuesta' => 'correcto',
                'categoria' => $Categoria,
                'id_insertado' => $stmt->insert_id
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

