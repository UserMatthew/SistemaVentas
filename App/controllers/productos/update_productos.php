<?php
$id_productos_get = $_GET['id'];

$sql_productos = "SELECT * FROM  tb_productos WHERE id_productos = $id_productos_get";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

foreach ($productos_datos as $productos_dato) {
    $id_productos = $productos_dato['id_productos'];
    $nombre = $productos_dato['nombre'];
    $descripcion = $productos_dato['descripcion'];
    $stock = $productos_dato['stock'];
    $stock_min = $productos_dato['stock_min'];
    $stock_max = $productos_dato['stock_max'];
    $precio = $productos_dato['precio'];
    $imagen = $productos_dato['imagen'];


}


?>