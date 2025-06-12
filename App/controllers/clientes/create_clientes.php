<?php
include('../../config.php');

$nombres = $_POST['nombres'];
$id_cliente = $_POST['id_cliente'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$municipio = $_POST['municipio'];

// Verificar si el ID ya existe
$verificar_id = $pdo->prepare("SELECT id_cliente FROM tb_clientes WHERE id_cliente = :id_cliente");
$verificar_id->bindParam(':id_cliente', $id_cliente);
$verificar_id->execute();

if($verificar_id->rowCount() > 0) {
    session_start();
    $_SESSION['mensaje'] = 'Error: El ID '.$id_cliente.' ya existe en la base de datos';
    $_SESSION['icono'] = 'error';
    $_SESSION['background'] = '#f8d7da';
    $_SESSION['color'] = '#721c24';
    $_SESSION['title'] = 'Error';
    header('Location: '.$URL.'/clientes/create.php');
    exit();
} else {
    $setencia = $pdo->prepare("INSERT INTO tb_clientes  (id_cliente, nombres, email, telefono, direccion, municipio, fyh_creacion) 
    VALUES (:id_cliente, :nombres, :email, :telefono, :direccion, :municipio, :fyh_creacion)");

    $setencia->bindParam(':id_cliente', $id_cliente);   
    $setencia->bindParam(':nombres', $nombres);
    $setencia->bindParam(':email', $email);
    $setencia->bindParam(':telefono', $telefono);
    $setencia->bindParam(':direccion', $direccion);
    $setencia->bindParam(':municipio', $municipio);
    $setencia->bindParam(':fyh_creacion', $fechaHora);
    $setencia->execute();
    
    session_start();
    $_SESSION['mensaje'] = 'Cliente '.$nombres.' creado correctamente';
    $_SESSION['icono'] = 'success';
    $_SESSION['background'] = '#d4edda';
    $_SESSION['color'] = '#155724';
    $_SESSION['title'] = 'Registro exitoso';
    header('Location: '.$URL.'/clientes/index.php');
}
?>