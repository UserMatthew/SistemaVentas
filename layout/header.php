<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Gestión de Ventas</title>
  <link rel="icon" href="public/img/favicon.png" type="image/png" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- jQuery -->
<script src="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini">

<?php if(isset($_SESSION['nuevo_login']) && $_SESSION['nuevo_login']): ?>
<script>
    Swal.fire({
        title: "Inicio de sesión exitoso",
        text: 'Bienvenido, <?php echo $nombres_sesion; ?>',
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
    unset($_SESSION['nuevo_login']); // Eliminamos la variable después de mostrar el mensaje
endif; 
?>

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-warning navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo $URL; ?>" class="nav-link">Sistema de Gestión de Ventas</a>
      </li> 
   </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $URL; ?>" class="brand-link">
      <img src="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sistema</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo $URL; ?>" class="d-block"><?php echo $nombres_sesion; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link active ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL; ?>/usuarios" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL; ?>/usuarios/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo usuario</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link active ">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Clientes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL; ?>/clientes" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de clientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL; ?>/clientes/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo cliente</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link active ">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Productos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL; ?>/productos" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL; ?>/productos/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo producto</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link active ">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL; ?>/ventas" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL; ?>/ventas/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nueva venta</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo $URL; ?>/App/controllers/login/cerrar_sesion.php" class="nav-link bg-danger">
              <i class="nav-icon fas fa-door-closed"></i>
              <p>
                Cerrar sesión
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>