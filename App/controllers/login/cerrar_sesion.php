<?php
include('../../config.php');
session_start();
if (isset($_SESSION['sesion_email'])) {
    session_destroy();
    header('Location: '.$URL.' /login/index.php');
} else {
    header('Location: '.$URL.' /login/index.php');
}
?>