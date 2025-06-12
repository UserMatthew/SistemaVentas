<?php
include ('App/config.php');
include ('layout/sesion.php');
include ('layout/header.php');
include ('App/controllers/clientes/read_clientes.php');
include ('App/controllers/productos/read_productos.php');
include ('App/controllers/ventas/read_ventas.php')
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bienvenido al sistema, <?php echo $nombres_sesion; ?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          contenido del sistema
          <br><br>
          <div class="row">
          
          
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php 
                $contador_clientes = 0;
                foreach ($clientes_datos as $clientes_dato){
                  $contador_clientes  = $contador_clientes + 1;
                }
                ?>
                <h3><?php echo $contador_clientes; ?></h3>

                <p>Clientes registrados</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="<?php echo $URL?>/clientes" class="small-box-footer">
                Mas información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php 
                $contador_productos = 0;
                foreach ($productos_datos as $productos_dato){
                  $contador_productos  = $contador_productos + 1;
                }
                ?>
                <h3><?php echo $contador_productos; ?></h3>

                <p>Productos unicos</p>
              </div>
              <div class="icon">
                <i class="fas fa-box-open"></i>
              </div>
              <a href="<?php echo $URL?>/productos" class="small-box-footer">
                Mas información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
           <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php 
                $contador_ventas = 0;
                foreach ($ventas_datos as $ventas_dato){
                  $contador_ventas  = $contador_ventas + 1;
                }
                ?>
                <h3><?php echo $contador_ventas; ?></h3>

                <p>ventas unicos</p>
              </div>
              <div class="icon">
                <i class="fas fa-box-open"></i>
              </div>
              <a href="<?php echo $URL?>/ventas" class="small-box-footer">
                Mas información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include ('layout/footer.php');
include ('layout/mensajes.php');
?>

