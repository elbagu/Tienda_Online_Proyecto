<?php
session_start();
if (!isset($_SESSION['administrador'])){header('location:../index.php');}

    include('../../Funciones/conexion.php');
    $nombre = $_POST['nombreProducto'];
    $precio = $_POST['precioProducto'];
    $stock = $_POST['stockProducto'];
    $categoria = $_POST['categoriaProducto'];
    $marca = $_POST['marcaProducto'];
    $extranjero = $_POST['extranjero'];
	$permitidos= array("image/jpg","image/jpeg","image/png");
	if(in_array($_FILES['imagenProducto']['type'],$permitidos)){
	$ruta= "../../Imagenes/".$_FILES['imagenProducto']['name'];
	move_uploaded_file($_FILES['imagenProducto']['tmp_name'],$ruta);
		}
	else {
        $respuesta = array(
        'respuesta' => 'error'
        );
    }
    $nombreImagen = $_FILES['imagenProducto']['name'];
    try {
        // Realizar la consulta a la base de datos
        $stmt = $conn->prepare("INSERT INTO producto (Nombre_Producto, Precio, Stock, Id_Categoria, Id_Marca, Extranjero, Imagen) VALUES (?,?,?,?,?,?,?);");
        $stmt->bind_param('sdiiiis', $nombre,$precio,$stock,$categoria,$marca,$extranjero,$nombreImagen);
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

