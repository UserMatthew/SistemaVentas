<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar Sesión</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
        crossorigin="anonymous" />
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
    <?php
    session_start();
    if (isset($_SESSION['mensaje'])) {
        $respuesta = $_SESSION['mensaje'];
        // Limpiar el mensaje después de obtenerlo
        unset($_SESSION['mensaje']); ?>
        <script>
            Swal.fire({
                title: "¡Error!",
                text: "<?php echo $respuesta; ?>",
                icon: "error",
                showConfirmButton: false,
                timer: 3000,
                background: "#f8d7da",
                color: "#721c24",
                width: "400px",
                toast: true,
                position: "top-end",
            });
        </script>
    <?php
    }
    ?>

    <div
        class="bg-white p-5 rounded-5 text-secondary shadow"
        style="width: 25rem">
        <div class="text-center fw-bold">Sistema de ventas</div>
        <div class="d-flex justify-content-center">
            <img
                src="../public/svg/login-icon.svg"
                alt="login-icon"
                style="height: 7rem" />
        </div>
        <div class="text-center fs-1 fw-bold">Login</div>
        <p class="text-center ">Ingresa tus datos para continuar</p>
        <form action="../App/controllers/login/ingreso.php" method="post">
            <div class="input-group mt-4">
                <div class="input-group-text bg-warning">
                    <img
                        src="../public/svg/username-icon.svg"
                        alt="username-icon"
                        style="height: 1rem" />
                </div>
                <input
                    class="form-control bg-light"
                    type="email"
                    placeholder="Email"
                    name="email"
                    required />
            </div>
            <div class="input-group mt-1">
                <div class="input-group-text bg-warning">
                    <img
                        src="../public/svg/password-icon.svg"
                        alt="password-icon"
                        style="height: 1rem" />
                </div>
                <input
                    class="form-control bg-light"
                    type="password"
                    placeholder="Password"
                    name="password_user"
                    required />
            </div>
            <div class="d-flex  mt-1">
                <div class="d-flex align-items-center gap-1">
                    <input class="form-check-input" type="checkbox" />
                    <div class="pt-1" style="font-size: 0.9rem">Remember me</div>
                </div>

            </div>
            <button class="btn btn-warning text-white w-100 mt-4 fw-semibold shadow-sm">
                Login
            </button>
        </form>
    </div>
</body>

</html>