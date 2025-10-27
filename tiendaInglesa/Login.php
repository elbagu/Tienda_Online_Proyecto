<?php
session_start();
include('Funciones/conexion.php');
$usuario = $_POST['email'];
$contraseña = MD5($_POST['contraseña']);
$consulta1 = mysqli_query($conn,"SELECT Nombre, Correo, Contraseña from cliente;");
while($cliente = mysqli_fetch_array($consulta1)){
if($usuario == $cliente['Correo']){
    if($contraseña == $cliente['Contraseña']) {
        $respuesta = array(
            'respuesta' => 'correcto'
        );
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nombre_usuario'] = $cliente['Nombre'];
        break;
    }
    else{
        $respuesta = array(
            'respuesta' => 'errorcontra'
        );
        break;
    }
}else{
    $respuesta = array(
        'respuesta' => 'erroruser'
    );
}
}

echo json_encode($respuesta);
?>
