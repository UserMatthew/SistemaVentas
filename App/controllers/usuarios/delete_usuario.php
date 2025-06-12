<?php
include('../../config.php');
$id_usuario = $_GET['id_usuario'];
$nombre = $_GET['nombres'];

$sentencia = $pdo->prepare("DELETE FROM tb_usuarios WHERE id_usuario = :id_usuario");
$sentencia->bindParam(':id_usuario', $id_usuario);
$sentencia->execute();

session_start();
$_SESSION['mensaje'] = "El usuario " . $nombre . " ha sido eliminado correctamente";
$_SESSION['icono'] = "success";
$_SESSION['background'] = '#d4edda';
$_SESSION['color'] = '#155724';
$_SESSION['title'] = 'Eliminado exitoso';
header('Location: ' . $URL . '/usuarios/index.php');
?>