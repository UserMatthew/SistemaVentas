<?php
include('../../config.php');

$id_productos = $_GET['id_productos'];
$stockCalculado = $_GET['stockCalculado'];

$sentencia = $pdo->prepare("UPDATE tb_productos
    SET   stock=:stock 
    WHERE id_productos=:id_productos");


$sentencia->bindParam(':stock', $stockCalculado);
$sentencia->bindParam(':id_productos', $id_productos);

if($sentencia->execute()){
    echo "Se actualizo todo";
} else {
    echo "error al actualizar";
}

