<?php
include('../../config.php');

$id_venta = $_GET['id_ventas'];
$nro_ventas= $_GET['nro_ventas'];
$pdo->beginTransaction();

$sentencia = $pdo->prepare("DELETE FROM tb_ventas WHERE id_ventas = :id_ventas");
$sentencia->bindParam(':id_ventas', $id_venta);

if ($sentencia->execute()) {

    $sentenciaCarro = $pdo->prepare("DELETE FROM tb_carro WHERE nro_ventas = :nro_ventas");
    $sentenciaCarro->bindParam(':nro_ventas', $nro_ventas);
    $sentenciaCarro->execute();
    $pdo->commit();
?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas";
    </script>
<?php
} else {
    echo 'Error al intentar borrar la venta';
    $pdo->rollBack();
}
?>