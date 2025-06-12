<?php
include('../../config.php');
$id_cliente = $_GET['id_cliente'];
$nombre = $_GET['nombres'];

$sentencia = $pdo->prepare("DELETE FROM tb_clientes WHERE id_cliente = :id_cliente");
$sentencia->bindParam(':id_cliente', $id_cliente);
$sentencia->execute();

session_start();
$_SESSION['mensaje'] = "El cliente " . $nombre . " ha sido eliminado correctamente";
$_SESSION['icono'] = "success";
$_SESSION['background'] = '#d4edda';
$_SESSION['color'] = '#155724';
$_SESSION['title'] = 'Eliminado exitoso';
header('Location: ' . $URL . '/clientes/index.php');
?>