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


    $setencia = $pdo->prepare("UPDATE tb_productos
    SET nombre=:nombre, 
    descripcion=:descripcion, 
    stock=:stock, 
    stock_min=:stock_min, 
    stock_max=:stock_max,
    precio=:precio,
    stock_max=:stock_max, 
    fyh_actualizacion=:fyh_actualizacion 
    WHERE id_productos=:id_productos");

    $setencia->bindParam(':nombre', $nombre);
    $setencia->bindParam(':descripcion', $descripcion);
    $setencia->bindParam(':stock', $stock);
    $setencia->bindParam(':stock_min', $stock_min);
    $setencia->bindParam(':stock_max', $stock_max);
    $setencia->bindParam(':precio', $precio);
    $setencia->bindParam(':fyh_actualizacion', $fecha);
    $setencia->bindParam(':id_productos', $id_productos);
    $setencia->execute();
    session_start();
    $_SESSION['mensaje'] = 'Se actualizo el producto' . $nombre . ' correctamente';
    $_SESSION['icono'] = 'success';
    $_SESSION['background'] = '#d4edda';
    $_SESSION['color'] = '#155724';
    $_SESSION['title'] = 'Actualizado exitoso';
    header('Location: ' . $URL . ' /productos/index.php');

