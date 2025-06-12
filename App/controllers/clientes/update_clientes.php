<?php
$id_cliente_get = $_GET['id'];

$sql_clientes = "SELECT * FROM  tb_clientes WHERE id_cliente = $id_cliente_get";
$query_clientes = $pdo->prepare($sql_clientes);
$query_clientes->execute();
$clientes_datos = $query_clientes->fetchAll(PDO::FETCH_ASSOC);

foreach ($clientes_datos as $clientes_dato) {
    $id_cliente = $clientes_dato['id_cliente'];
    $nombres = $clientes_dato['nombres'];
    $email = $clientes_dato['email'];
    $telefono = $clientes_dato['telefono'];
    $direccion = $clientes_dato['direccion'];
    $municipio = $clientes_dato['municipio'];

}


?>