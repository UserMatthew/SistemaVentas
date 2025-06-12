<?php
//Conexion a la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'adso');

$servidor = "mysql:dbname=".DB_NAME.";host=".DB_HOST;
try {
    $pdo = new PDO($servidor, DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo '<div style="color: green; padding: 10px; background-color: #e8f5e9; border: 1px solid #c8e6c9; border-radius: 4px; margin: 10px;">
    //            Conexión exitosa a la base de datos
    //          </div>';
}catch(PDOException $e) {
    print_r($e);
    echo '<div style="color: red; padding: 10px; background-color: #ffebee; border: 1px solid #ffcdd2; border-radius: 4px; margin: 10px;">
                Error: La base de datos "' . DB_NAME . '" no existe. Por favor, verifique el nombre de la base de datos.
            </div>';
}

$URL = "http://localhost/www.ventas.com";

date_default_timezone_set("America/Bogota");
$fechaHora = date("Y-m-d H:i:s");


if (isset($_SESSION['mensaje'])) {
    $respuesta = $_SESSION['mensaje']; ?>
    <script>
        Swal.fire({
            title: "Registro exitoso",
            text: '<?php echo $respuesta; ?>',
            icon: "success",
            showConfirmButton: false,
            timer: 3000,
            background: "#d4edda",
            color: "#155724",
            width: "400px",
            toast: true,
            position: "top-end",
        });
    </script>
<?php
    unset($_SESSION['mensaje']);
}
?>


