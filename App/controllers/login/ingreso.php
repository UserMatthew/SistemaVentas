<?php
include('../../config.php');
$email = $_POST['email'];
$password_user = $_POST['password_user'];


$contador = 0;
$sql = "SELECT * FROM tb_usuarios WHERE email = '$email'";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario) {
    $contador = $contador + 1;
    $email_tabla = $usuario['email'];
    $nombres_tabla = $usuario['nombres'];
    $password_user_tabla = $usuario['password_user'];
}



if (($contador > 0) && (password_verify($password_user,  $password_user_tabla))) {
    echo 'Usuario encontrado';
    session_start();
    $_SESSION['sesion_email'] = $email;
    $_SESSION['nuevo_login'] = true;
    header('Location:'.$URL.' /index.php');
    
    
} else {

    echo "Datos incorrectos";
    session_start();
    $_SESSION['mensaje'] = 'Usuario o contraseña incorrectos';
    $_SESSION['icono'] = 'error';
    header('Location:'.$URL.' /login/index.php');
    
}

?>