<?php
if (isset($_SESSION['mensaje'])) {
    $respuesta = $_SESSION['mensaje'];
    $icono = $_SESSION['icono'];
    $background = $_SESSION['background']; 
    $color = $_SESSION['color'];
    $title = $_SESSION['title'];
    ?>
    <script>
        Swal.fire({
            title: "<?php echo $title; ?>",
            text: '<?php echo $respuesta; ?>',
            icon: "<?php echo $icono; ?>",
            showConfirmButton: false,
            timer: 3000,
            background: "<?php echo $background; ?>",
            color: "<?php echo $color; ?>",
            width: "400px",
            toast: true,
            position: "top-end",
        });
    </script>
<?php
    unset($_SESSION['mensaje']);
    unset($_SESSION['icono']);
    unset($_SESSION['background']);
    unset($_SESSION['color']);
    unset($_SESSION['title']);
}
?>
