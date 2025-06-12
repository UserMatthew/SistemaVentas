<?php
session_start();
if (isset($_SESSION['sesion_email'])) {
    $email_sesion = $_SESSION['sesion_email'];
    $sql = "SELECT * FROM tb_usuarios WHERE email = '$email_sesion'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
      $nombres_sesion = $usuario['nombres'];
      $id_sesion = $usuario['id_usuario'];
    }

} else {
    echo 'Usuario no logueado';
    header('Location:'.$URL.'/login/index.php');
}
?>
