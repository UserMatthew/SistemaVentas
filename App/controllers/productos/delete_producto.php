<?php
include('../../config.php');
$id_productos = $_GET['id_productos'];


$sentencia = $pdo->prepare("DELETE FROM tb_productos WHERE id_productos = :id_productos");
$sentencia->bindParam(':id_productos', $id_productos);
$sentencia->execute();

session_start();
$_SESSION['mensaje'] = "El producto " . $nombre . " ha sido eliminado correctamente";
$_SESSION['icono'] = "success";
$_SESSION['background'] = '#d4edda';
$_SESSION['color'] = '#155724';
$_SESSION['title'] = 'Eliminado exitoso';
header('Location: ' . $URL . '/productos/index.php');
?>