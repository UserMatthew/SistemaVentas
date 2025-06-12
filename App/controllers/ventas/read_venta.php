<?php

$sql_ventas = "SELECT *, c.nombres AS nombre FROM tb_ventas AS v 
INNER JOIN tb_clientes AS c on c.id_cliente = v.id_clientes
WHERE v.id_ventas = $id_ventas_get";
$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$ventas_datos = $query_ventas->fetchAll(PDO::FETCH_ASSOC);

foreach($ventas_datos as $ventas_dato ) {
    $nro_venta = $ventas_dato['nro_ventas'];
    $id_clientes = $ventas_dato['id_clientes'];
}
