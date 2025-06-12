<?php
include('../../config.php');

$nombres = $_POST['nombres'];
$id_usuario = $_POST['id_usuario'];
$email = $_POST['email'];
$password_usuario = $_POST['password_usuario'];
$password_confirm = $_POST['password_confirm'];

if($password_usuario == $password_confirm){
    $password_usuario = password_hash($password_usuario, PASSWORD_DEFAULT);

$setencia = $pdo->prepare("INSERT INTO tb_usuarios (id_usuario, nombres, email, password_user, fyh_creacion) 
VALUES (:id_usuario, :nombres, :email, :password_user, :fyh_creacion)");

$setencia->bindParam(':id_usuario', $id_usuario);
$setencia->bindParam(':nombres', $nombres);
$setencia->bindParam(':email', $email);
$setencia->bindParam(':password_user', $password_usuario);
$setencia->bindParam(':fyh_creacion', $fechaHora);
$setencia->execute();
session_start();
$_SESSION['mensaje'] = 'Usuario '.$nombres.' creado correctamente';
$_SESSION['icono'] = 'success';
$_SESSION['background'] = '#d4edda';
$_SESSION['color'] = '#155724';
$_SESSION['title'] = 'Registro exitoso';
header('Location: '.$URL.' /usuarios/index.php');

}



?>