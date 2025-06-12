<?php
include('../../config.php');

$nro_ventas = $_GET['nro_ventas'];
$id_productos = $_GET['id_productos'];
$cantidad = $_GET['cantidad'];

$setencia = $pdo->prepare("INSERT INTO tb_carro  (nro_ventas, id_productos, cantidad, fyh_creacion) 
    VALUES (:nro_ventas, :id_productos, :cantidad, :fyh_creacion)");

$setencia->bindParam(':nro_ventas', $nro_ventas);
$setencia->bindParam(':id_productos', $id_productos);
$setencia->bindParam(':cantidad', $cantidad);
$setencia->bindParam(':fyh_creacion', $fechaHora);



if ($setencia->execute()) {
?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php"
    </script>
<?php
} else {
    session_start();
    $_SESSION['mensaje'] = 'Error no se pudo registrar correctamente';
    $_SESSION['icono'] = 'error';
    $_SESSION['background'] = '#f8d7da';
    $_SESSION['color'] = '#721c24';
    $_SESSION['title'] = 'Error';
?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php"
    </script>
<?php
}
