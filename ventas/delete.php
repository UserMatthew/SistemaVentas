<?php
$id_ventas_get = $_GET['id_ventas'];
$nro_venta_get = $_GET['nro_venta'];
include('../App/config.php');
include('../layout/sesion.php');
include('../layout/header.php');
include('../App/controllers/ventas/read_venta.php');
include('../App/controllers/clientes/read_cliente.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detalle de venta:</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-warning">
                        <!-- /.card-header -->
                        <div class="card-header">

                            <h3 class="card-title">
                                <i class="fa fa-shopping-bag">
                                    Venta Nº: <input type="text" style="text-align: center" value="<?php echo $nro_venta ?>" disabled>
                                </i>
                            </h3>

                        </div>
                        <div class="card-body">
                            <table id="tb_productos" class="table table-bordered table-hover table-sm mt-1">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Nº</center>
                                        </th>
                                        <th>
                                            <center>Producto</center>
                                        </th>
                                        <th>
                                            <center>Detalle</center>
                                        </th>
                                        <th>
                                            <center>Cantidad</center>
                                        </th>
                                        <th>
                                            <center>Precio unitario</center>
                                        </th>
                                        <th>
                                            <center>Precio subtotal</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql_carro = "SELECT *, p.nombre AS producto, p.descripcion AS descripcion, p.precio AS precio, p.stock AS stock, p.id_productos AS id_productos
                                     FROM tb_carro AS c INNER JOIN tb_productos AS p ON c.id_productos = p.id_productos 
                                     WHERE nro_ventas = '$nro_venta'";
                                    $query_carro = $pdo->prepare($sql_carro);
                                    $query_carro->execute();
                                    $carro_datos = $query_carro->fetchAll(PDO::FETCH_ASSOC);
                                    $contador_carro = 0;
                                    $cantidadTotal = 0;
                                    $PrecioUnitarioTotal = 0;
                                    $PrecioTotal = 0;
                                    foreach ($carro_datos as $carro_dato) {
                                        $id_carro = $carro_dato['id_carro'];
                                        $cantidadTotal += $carro_dato['cantidad'];
                                        $PrecioUnitarioTotal += $carro_dato['precio'];
                                        $PrecioTotal += floatval($carro_dato['precio']) * floatval($carro_dato['cantidad']);
                                        echo '<tr>';
                                        echo '<td> <center> ' . $contador_carro + 1  . ' <input type="text" value="' . $carro_dato['id_productos'] . '"id="id_productos' . $contador_carro . '"" hidden disabled ></input"> </center></td>';
                                        echo '<td>' . $carro_dato['producto'] . '</td>';
                                        echo '<td>' . $carro_dato['descripcion'] . '</td>';
                                        echo '<td>  <center> <span id="cantidadCarro' . $contador_carro . '">' . $carro_dato['cantidad'] . ' </span><input hidden  type="text" value="' . $carro_dato['stock'] . '" id="stockInventario' . $contador_carro . '" disabled ></input"> </center></td>';
                                        echo '<td style="text-align:right;"> $' . number_format($carro_dato['precio'], 2)  . ' </td>';
                                        echo '<td style="text-align:right;"> $' .  number_format(floatval($carro_dato['precio'])  * floatval($carro_dato['cantidad']), 2)   . '</td>';

                                        $contador_carro++;
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="3"><Strong>
                                                <center>TOTAL</center>
                                            </Strong></td>
                                        <td><strong>
                                                <center><?php echo $cantidadTotal ?></center>
                                            </strong></td>
                                        <td style="text-align: right;"><strong>$
                                                <?php echo number_format($PrecioUnitarioTotal, 2)  ?>
                                            </strong></td>
                                        <td style="text-align: right;"><strong>$<?php echo number_format($PrecioTotal, 2) ?></strong></td>
                                    </tr>
                                </tbody>

                            </table>


                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>






            <div class="row">
                <div class="col-md-9">
                    <div class="card card-outline card-warning">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-user-check">
                                    Datos del cliente:
                                </i>
                            </h3>
                        </div>

                        <?php
                        foreach ($clientes_datos as $clientes_dato) {
                            $nombreCliente = $clientes_dato['nombres'];
                            $idCliente = $clientes_dato['id_cliente'];
                            $emailCliente = $clientes_dato['email'];
                            $telefono = $clientes_dato['telefono'];
                        }

                        ?>



                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for=""><Strong>Nombre del cliente</Strong></label>
                                        <input type="text" class="form-control" id="nombres" value="<?php echo $nombreCliente ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for=""><Strong>Cedula del cliente</Strong></label>
                                        <input type="text" class="form-control" id="id_cliente" disabled value="<?php echo $idCliente ?>">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for=""><Strong>Telefono</Strong></label>
                                        <input type="text" class="form-control" id="telefono" disabled value="<?php echo $telefono ?>">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for=""><Strong>Correo</Strong></label>
                                        <input type="email" class="form-control" id="email" disabled value="<?php echo $emailCliente ?>">
                                    </div>
                                </div>

                            </div>



                        </div>


                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-md-3">
                    <div class="card card-outline card-warning">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-shopping-bag">
                                    Registrar venta
                                </i>
                            </h3>

                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Monto a cancelar:</label>
                                <input type="text" class="form-control" id="totalCancelar" value=" $<?php echo number_format($PrecioTotal, 2)  ?>" disabled>
                            </div>

                            <div class="form-group">
                                <button id="borrarVenta" class="btn btn-sm btn-danger btn-block mt-2">
                                    <strong>
                                        Eliminar venta
                                    </strong>
                                </button>
                                <div id="respuestaVenta"> </div>
                                <script>
                                    $('#borrarVenta').click(function() {
                                        var id_venta = '<?php echo $id_ventas_get ?>';
                                        var nro_ventas = '<?php echo $nro_venta_get ?>';

                                        actualizarStock();
                                        borrarVenta();


                                        function actualizarStock() {
                                            var i = 0;
                                            var n = '<?php echo $contador_carro ?>';
                                            var stock = '';
                                            for (var i = 0; i < n; i++) {    
                                                var a = '#stockInventario' + i;
                                                var stockInventario = $(a).val();
                                                var b = '#cantidadCarro' + i;
                                                var cantidadCarro = $(b).html();
                                                var c = '#id_productos' + i;
                                                var id_productos = $(c).val();

                                                var stockCalculado = parseFloat(parseInt(stockInventario) + parseInt(cantidadCarro))
                                                var url3 = "../App/controllers/ventas/update_stock.php";
                                                $.get(url3, {
                                                    id_productos: id_productos,
                                                    stockCalculado: stockCalculado,
                                                }, function(datos) {

                                                });

                                            }
                                        };

                                        function borrarVenta() {
                                            var url = "../App/controllers/ventas/delete_ventas.php";
                                            $.get(url, {
                                                id_ventas: id_venta,
                                                nro_ventas: nro_ventas,
                                            }, function(datos) {
                                                $('#respuestaVenta').html(datos);
                                            });


                                        }




                                    });
                                </script>
                            </div>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>


            </div>



            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include('../layout/footer.php');
include('../layout/mensajes.php');
?>

<script>
    $(function() {
        $("#tb_buscarProducto").DataTable({
            "pageLength": 10,
            language: {
                "emptyTable": "No hay información",
                "decimal": "",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 to 0 of 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        }).buttons().container().appendTo('#tb_buscarProducto_wrapper .col-md-6:eq(0)').addClass('mt-3');
    });
</script>

<script>
    $(function() {
        $("#tb_buscarCliente").DataTable({
            "pageLength": 10,
            language: {
                "emptyTable": "No hay información",
                "decimal": "",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
                "infoEmpty": "Mostrando 0 to 0 of 0 Clientes",
                "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Clientes",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        }).buttons().container().appendTo('#tb_buscarCliente_wrapper .col-md-6:eq(0)').addClass('mt-3');
    });
</script>