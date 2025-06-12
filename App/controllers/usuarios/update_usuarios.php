<?php
$id_usuario_get = $_GET['id'];

$sql_usuarios = "SELECT * FROM  tb_usuarios WHERE id_usuario = $id_usuario_get";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios_datos as $usuarios_dato) {
    $id_usuario = $usuarios_dato['id_usuario'];
    $nombres = $usuarios_dato['nombres'];
    $email = $usuarios_dato['email'];

}


?>