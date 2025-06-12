<?php
include('../../config.php');

$nro_ventas = $_GET['nro_ventas'];
$id_cliente = $_GET['id_cliente'];
$totalCancelar = $_GET['totalCancelar'];

$pdo->beginTransaction();

$sentencia = $pdo->prepare("INSERT INTO tb_ventas 
    (nro_ventas, id_clientes, total_pagado, fyh_creacion) 
    VALUES (:nro_ventas, :id_clientes, :total_pagado, :fyh_creacion)");

$sentencia->bindParam(':nro_ventas', $nro_ventas);
$sentencia->bindParam(':id_clientes', $id_cliente);
$sentencia->bindParam(':total_pagado', $totalCancelar);
$sentencia->bindParam(':fyh_creacion', $fechaHora);



if ($sentencia->execute()) {

    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = 'Se registro la venta ' . $nro_ventas . ' correctamente';
    $_SESSION['icono'] = 'success';
    $_SESSION['background'] = '#d4edda';
    $_SESSION['color'] = '#155724';
    $_SESSION['title'] = 'Registro de venta';

?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas"
    </script>
<?php
} else {
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = 'Error no se pudo registrar la venta';
    $_SESSION['icono'] = 'error';
    $_SESSION['background'] = '#f8d7da';
    $_SESSION['color'] = '#721c24';
    $_SESSION['title'] = 'Error de venta';
?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php"
    </script>
<?php
}
