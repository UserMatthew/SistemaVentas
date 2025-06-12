<?php
include('../../config.php');

$nombres = $_POST['nombres'];
$id_usuario = $_POST['id_usuario'];
$email = $_POST['email'];
$password_usuario = $_POST['password_usuario'];
$password_confirm = $_POST['password_confirm'];

if ($password_usuario == $password_confirm) {
    $password_usuario = password_hash($password_usuario, PASSWORD_DEFAULT);

    $setencia = $pdo->prepare("UPDATE tb_usuarios 
    SET nombres=:nombres, 
    email=:email, 
    password_user=:password_user, 
    fyh_actualizacion=:fyh_actualizacion 
    WHERE id_usuario=:id_usuario");

    $setencia->bindParam(':nombres', $nombres);
    $setencia->bindParam(':email', $email);
    $setencia->bindParam(':password_user', $password_usuario);
    $setencia->bindParam(':fyh_actualizacion', $fechaHora);
    $setencia->bindParam(':id_usuario', $id_usuario);
    $setencia->execute();
    session_start();
    $_SESSION['mensaje'] = 'Se actualizo al usuario ' . $nombres . ' correctamente';
    $_SESSION['icono'] = 'success';
    $_SESSION['background'] = '#d4edda';
    $_SESSION['color'] = '#155724';
    $_SESSION['title'] = 'Actualizado exitoso';
    header('Location: ' . $URL . ' /usuarios/index.php');
}
