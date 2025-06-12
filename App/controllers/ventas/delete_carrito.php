<?php
include('../../config.php');
$id_carro = $_POST['id_carro'];

$sentencia = $pdo->prepare("DELETE FROM tb_carro WHERE id_carro = :id_carro");
$sentencia->bindParam(':id_carro', $id_carro);

if ($sentencia->execute()) {
?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php"
    </script>
<?php
} else {
?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php"
    </script>
<?php
}
