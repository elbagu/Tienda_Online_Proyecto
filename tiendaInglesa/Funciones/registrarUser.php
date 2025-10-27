<?php
// Asegurarnos de que cualquier error se capture
set_error_handler(function($errno, $errstr, $errfile, $errline) {
    throw new Exception($errstr);
});

try {
    // Verificar que estamos recibiendo una petición POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método no permitido');
    }

    // Verificar la conexión antes de continuar
    include('conexion.php');
    if (!$conn || $conn->connect_error) {
        throw new Exception('Error de conexión: ' . $conn->connect_error);
    }

    // Verificar que todos los campos necesarios existen
    $campos_requeridos = ['nombre', 'apellido', 'ci', 'email', 'ciudad', 'direccion', 'contraseña'];
    $datos = [];
    foreach ($campos_requeridos as $campo) {
        if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
            throw new Exception("El campo {$campo} es requerido");
        }
        $datos[$campo] = $_POST[$campo];
    }

    // Sanitizar los datos
    $nombre = filter_var($datos['nombre'], FILTER_SANITIZE_STRING);
    $apellido = filter_var($datos['apellido'], FILTER_SANITIZE_STRING);
    $ci = filter_var($datos['ci'], FILTER_SANITIZE_STRING);
    $email = filter_var($datos['email'], FILTER_SANITIZE_EMAIL);
    $ciudad = filter_var($datos['ciudad'], FILTER_SANITIZE_STRING);
    $direccion = filter_var($datos['direccion'], FILTER_SANITIZE_STRING);
    $contraseña = md5($datos['contraseña']);

    $stmt = $conn->prepare("INSERT INTO cliente (CI, Nombre, Apellido, Correo, Ciudad, Calle, Contraseña) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        throw new Exception($conn->error);
    }

    if (!$stmt->bind_param("sssssss", $ci, $nombre, $apellido, $email, $ciudad, $direccion, $contraseña)) {
        throw new Exception($stmt->error);
    }

    if (!$stmt->execute()) {
        throw new Exception($stmt->error);
    }

    header('Content-Type: application/json');
    echo json_encode([
        'respuesta' => 'correcto',
        'mensaje' => 'Usuario registrado correctamente'
    ]);

} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode([
        'respuesta' => 'error',
        'mensaje' => $e->getMessage()
    ]);
}

// Asegurarnos de que no se ejecute más código después
exit();