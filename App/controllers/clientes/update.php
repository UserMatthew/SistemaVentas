<?php
include('../../config.php');

$nombres = $_POST['nombres'];
$id_cliente = $_POST['id_cliente'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$municipio = $_POST['municipio'];


    $setencia = $pdo->prepare("UPDATE tb_clientes 
    SET nombres=:nombres, 
    email=:email, 
    telefono=:telefono, 
    direccion=:direccion, 
    municipio=:municipio, 
    fyh_actualizacion=:fyh_actualizacion 
    WHERE id_cliente=:id_cliente");

    $setencia->bindParam(':nombres', $nombres);
    $setencia->bindParam(':email', $email);
    $setencia->bindParam(':telefono', $telefono);
    $setencia->bindParam(':direccion', $direccion);
    $setencia->bindParam(':municipio', $municipio);
    $setencia->bindParam(':fyh_actualizacion', $fechaHora);
    $setencia->bindParam(':id_cliente', $id_cliente);
    $setencia->execute();
    session_start();
    $_SESSION['mensaje'] = 'Se actualizo al cliente ' . $nombres . ' correctamente';
    $_SESSION['icono'] = 'success';
    $_SESSION['background'] = '#d4edda';
    $_SESSION['color'] = '#155724';
    $_SESSION['title'] = 'Actualizado exitoso';
    header('Location: ' . $URL . ' /clientes/index.php');

