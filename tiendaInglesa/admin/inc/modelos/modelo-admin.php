<?php

$password = $_POST['password'];
$usuario = $_POST['usuario'];

    // escribir codigo que loguee a los administradores
    
    include '../../../Funciones/conexion.php';
    
    try {
        // Seleccionar el administrador de la base de datos
        $stmt = $conn->prepare("SELECT Id_Admin, Usuario, Contraseña FROM admin WHERE Usuario = ?");
        $stmt->bind_param('s', $usuario);
        $stmt->execute();
        // Loguear el usuario
        $stmt->bind_result($id_usuario, $nombre_usuario, $pass_usuario);
        $stmt->fetch();
        if($nombre_usuario){
            // El usuario existe, verificar el password
            if($password==$pass_usuario){
                // Iniciar la sesion
                session_start();
                $_SESSION['administrador']= $usuario;
                $_SESSION['id'] = $id_usuario;
                $_SESSION['login'] = true;
                // Login correcto
                $respuesta = array(
                    'respuesta' => 'correcto',
                    'nombre' => $nombre_usuario
                );
            } else {
                // Login incorrecto, enviar error
                $respuesta = array(
                        'resultado' => 'Password Incorrecto'
                );
            }

        } else {
            $respuesta = array(
                'error' => 'Usuario no existe'
            );
        }
        $stmt->close();
        $conn->close();
    } catch(Exception $e) {
        // En caso de un error, tomar la exepcion
        $respuesta = array(
            'pass' => $e->getMessage()
        );
    }
    
    echo json_encode($respuesta);








