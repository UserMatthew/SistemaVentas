<?php
include('../../config.php');

$id_productos = $_POST['id_productos'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$stock_min = $_POST['stock_min'];
$stock_max = $_POST['stock_max'];
$precio = $_POST['precio'];
$fecha = $_POST['fecha'];

$imagen = $_POST['imagen'];
$nombreDelArchivo = date("Y-m-d-h-i-s");
$filename = $nombreDelArchivo."__".$_FILES['imagen']['name'];
$location = "../../../productos/img_productos/".$filename;

move_uploaded_file($_FILES['imagen']['tmp_name'],$location);

// Verificar si el ID ya existe
$verificar_id = $pdo->prepare("SELECT id_productos FROM tb_productos WHERE id_productos = :id_productos");
$verificar_id->bindParam(':id_productos', $id_productos);
$verificar_id->execute();

if($verificar_id->rowCount() > 0) {
    session_start();
    $_SESSION['mensaje'] = 'Error: El ID '.$id_productos.' ya existe en la base de datos';
    $_SESSION['icono'] = 'error';
    $_SESSION['background'] = '#f8d7da';
    $_SESSION['color'] = '#721c24';
    $_SESSION['title'] = 'Error';
    header('Location: '.$URL.'/productos/create.php');
    exit();
} else {
    $setencia = $pdo->prepare("INSERT INTO tb_productos  (id_productos, nombre, descripcion, stock, stock_min, stock_max, precio, imagen, fyh_creacion) 
    VALUES (:id_productos, :nombre, :descripcion, :stock, :stock_min, :stock_max, :precio, :imagen, :fyh_creacion)");

    $setencia->bindParam(':id_productos', $id_productos);   
    $setencia->bindParam(':nombre', $nombre);
    $setencia->bindParam(':descripcion', $descripcion);
    $setencia->bindParam(':stock', $stock);
    $setencia->bindParam(':stock_min', $stock_min);
    $setencia->bindParam(':stock_max', $stock_max);
    $setencia->bindParam(':precio', $precio);
    $setencia->bindParam(':imagen', $filename);
    $setencia->bindParam(':fyh_creacion', $fecha);
    $setencia->execute();
    
    session_start();
    $_SESSION['mensaje'] = 'Producto '.$nombre.' creado correctamente';
    $_SESSION['icono'] = 'success';
    $_SESSION['background'] = '#d4edda';
    $_SESSION['color'] = '#155724';
    $_SESSION['title'] = 'Registro exitoso';
    header('Location: '.$URL.'/productos/index.php');
}
?>