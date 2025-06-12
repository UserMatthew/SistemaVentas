<?php
include('../App/config.php');
include('../layout/sesion.php');
include('../layout/header.php');
include('../App/controllers/ventas/read_ventas.php');
include('../App/controllers/productos/read_productos.php');
include('../App/controllers/clientes/read_clientes.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Agregar nueva venta</h1>
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
                            <?php
                            $contador_ventas = 1;
                            foreach ($ventas_datos as $ventas_dato) {
                                $contador_ventas++;
                            }
                            ?>
                            <h3 class="card-title">
                                <i class="fa fa-shopping-bag">
                                    Venta Nº: <input type="text" style="text-align: center" value="<?php echo $contador_ventas ?>" disabled>
                                </i>
                            </h3>

                        </div>
                        <div class="card-body">
                            <b>Carrito de ventas:</b>
                            <button type="button" class="btn btn-sm btn-warning " data-toggle="modal"
                                data-target="#modalBuscarProducto"><i class="fa fa-search">
                                    Buscar Productos
                                </i></button>
                            <!--Modal visualizar-->
                            <div class="modal fade" id="modalBuscarProducto">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header card-outline card-warning ">
                                            <h4 class="modal-title"><strong>Busqueda del producto</strong></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table table-responsive">
                                                <table id="tb_buscarProducto" class="table table-bordered table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <center>Nro</center>
                                                            </th>
                                                            <th>
                                                                <center>Selecionar</center>
                                                            </th>
                                                            <th>
                                                                <center>Código</center>
                                                            </th>
                                                            <th>
                                                                <center>Imagen</center>
                                                            </th>
                                                            <th>
                                                                <center>Nombre</center>
                                                            </th>
                                                            <th>
                                                                <center>Descripción</center>
                                                            </th>
                                                            <th>
                                                                <center>Stock</center>
                                                            </th>
                                                            <th>
                                                                <center>Precio</center>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $contador = 0;
                                                        foreach ($productos_datos as $productos_dato) {
                                                            $id_productos = $productos_dato['id_productos']; ?>
                                                            <tr>
                                                                <td><?php echo $contador = $contador + 1; ?></td>
                                                                <td>
                                                                    <center> <button class="btn btn-info btn-sm" id="btn_selecionar<?php echo $id_productos; ?>">
                                                                            Selecionar
                                                                        </button> </center>
                                                                    <script>
                                                                        $('#btn_selecionar<?php echo $id_productos; ?>').click(function() {

                                                                            var id_productos = "<?php echo $id_productos ?>";
                                                                            $('#id_productos').val(id_productos);

                                                                            var producto = "<?php echo $productos_dato['nombre']; ?>";
                                                                            $('#producto').val(producto);

                                                                            var descripcion = "<?php echo $productos_dato['descripcion']; ?>";
                                                                            $('#descripcion').val(descripcion);

                                                                            var precio = "<?php echo $productos_dato['precio']; ?>";
                                                                            $('#precio').val(precio);

                                                                            $('#cantidad').focus();





                                                                            // $('#modalBuscarProducto').modal('toggle');

                                                                        });
                                                                    </script>
                                                                </td>
                                                                <td><?php echo $productos_dato['id_productos']; ?></td>
                                                                <td>
                                                                    <img src="<?php echo $URL . "/productos/img_productos/" . $productos_dato['imagen']; ?>" width="50px" alt="asdf">
                                                                </td>
                                                                <td><?php echo $productos_dato['nombre']; ?></td>
                                                                <td><?php echo $productos_dato['descripcion']; ?></td>
                                                                <td><?php echo $productos_dato['stock']; ?></td>
                                                                <td><?php echo $productos_dato['precio']; ?></td>

                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                    </tfoot>
                                                </table>
                                                <div class="div row">
                                                    <div class="div col-md-3">
                                                        <div class="form-group">
                                                            <input type="text" id="id_productos" hidden>
                                                            <label for=""><Strong>Producto:</Strong></label>
                                                            <input type="text" class="form-control" name="" id="producto" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="div col-md-5">
                                                        <div class="form-group">
                                                            <label for=""><strong>Descripción:</strong></label>
                                                            <input type="text" class="form-control" name="" id="descripcion" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="div col-md-2">
                                                        <div class="form-group">
                                                            <label for=""><strong>Cantidad:</strong></label>
                                                            <input type="number" class="form-control" name="" id="cantidad" require>
                                                        </div>
                                                    </div>
                                                    <div class="div col-md-2">
                                                        <div class="form-group">
                                                            <label for=""><strong>Precio unitario:</strong></label>
                                                            <input type="text" class="form-control" name="" id="precio" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button style="float: right;" class="btn btn-sm btn-warning mb-2" id="agregarCarrito">
                                                    <strong>Agregar al carrito </strong>
                                                </button>
                                                <div id="respuestaCarrito"></div>
                                                <script>
                                                    $('#agregarCarrito').click(function() {
                                                        var nro_ventas = '<?php echo $contador_ventas ?>';
                                                        var id_productos = $('#id_productos').val();
                                                        var cantidad = $('#cantidad').val();

                                                        if (id_productos == "") {
                                                            alert("Debe de llenar todos los campos")
                                                        } else if (cantidad == "") {
                                                            alert("Debe rellenar la cantidad del producto")
                                                        } else {
                                                            //alert("Listo para el controllador")
                                                            var url = "../App/controllers/ventas/registrar_carrito.php";
                                                            $.get(url, {
                                                                nro_ventas: nro_ventas,
                                                                id_productos: id_productos,
                                                                cantidad: cantidad,
                                                            }, function(datos) {
                                                                $('#respuestaCarrito').html(datos);
                                                            });
                                                        }




                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <br><br>
                            <table id="tb_productos" class="table table-bordered table-hover table-sm mt-3">
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
                                        <th>
                                            <center>Acción</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql_carro = "SELECT *, p.nombre AS producto, p.descripcion AS descripcion, p.precio AS precio, p.stock AS stock, p.id_productos AS id_productos
                                     FROM tb_carro AS c INNER JOIN tb_productos AS p ON c.id_productos = p.id_productos 
                                     WHERE nro_ventas = '$contador_ventas'";
                                    $query_carro = $pdo->prepare($sql_carro);
                                    $query_carro->execute();
                                    $carro_datos = $query_carro->fetchAll(PDO::FETCH_ASSOC);
                                    $contador_carro = 1;
                                    $cantidadTotal = 0;
                                    $PrecioUnitarioTotal = 0;
                                    $PrecioTotal = 0;
                                    foreach ($carro_datos as $carro_dato) {
                                        $id_carro = $carro_dato['id_carro'];
                                        $cantidadTotal += $carro_dato['cantidad'];
                                        $PrecioUnitarioTotal += $carro_dato['precio'];
                                        $PrecioTotal += floatval($carro_dato['precio']) * floatval($carro_dato['cantidad']);
                                        echo '<tr>';
                                        echo '<td> <center> ' . $contador_carro . ' <input type="text" value="' . $carro_dato['id_productos'] . '"id="id_productos' . $contador_carro . '"" hidden disabled ></input"> </center></td>';
                                        echo '<td>' . $carro_dato['producto'] . '</td>';
                                        echo '<td>' . $carro_dato['descripcion'] . '</td>';
                                        echo '<td>  <center> <span id="cantidadCarro' . $contador_carro . '">' . $carro_dato['cantidad'] . ' </span><input hidden type="text" value="' . $carro_dato['stock'] . '" id="stockInventario' . $contador_carro . '" disabled ></input"> </center></td>';
                                        echo '<td>  <center>' . $carro_dato['precio'] . ' </center></td>';
                                        echo '<td>' . floatval($carro_dato['precio'])  * floatval($carro_dato['cantidad'])  . '</td>';

                                        echo '<td> 
                                            <center>' ?>
                                        <form action="../App/controllers/ventas/delete_carrito.php" method="POST">
                                            <input type="text" value="<?php echo $id_carro ?>" name="id_carro" hidden id="">
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash">Eliminar</i></button>
                                        </form>

                                    <?php ' </center>
                                            </td>';
                                        echo '</tr>';
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
                                        <td><strong>
                                                <center><?php echo $PrecioUnitarioTotal ?></center>
                                            </strong></td>
                                        <td style="text-align: right;"><strong><?php echo $PrecioTotal ?></strong></td>
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
                        <div class="card-body">
                            <b>Cliente:</b>
                            <button type="button" class="btn btn-sm btn-warning " data-toggle="modal"
                                data-target="#modalBuscarCliente"><i class="fa fa-search">
                                    Buscar Cliente
                                </i></button>
                            <!--Modal cliente-->
                            <div class="modal fade" id="modalBuscarCliente">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header card-outline card-warning ">
                                            <h4 class="modal-title"><strong>Busqueda del cliente</strong></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table table-responsive">
                                                <table id="tb_buscarCliente" class="table table-bordered table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <center>Nro</center>
                                                            </th>
                                                            <th>
                                                                <center>Selecionar</center>
                                                            </th>
                                                            <th>
                                                                <center>Cedula</center>
                                                            </th>
                                                            <th>
                                                                <center>Nombre</center>
                                                            </th>
                                                            <th>
                                                                <center>Email</center>
                                                            </th>
                                                            <th>
                                                                <center>Telefono</center>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $contador = 0;
                                                        foreach ($clientes_datos as $clientes_dato) {
                                                            $id_cliente = $clientes_dato['id_cliente']; ?>
                                                            <tr>
                                                                <td><?php echo $contador = $contador + 1; ?></td>
                                                                <td>
                                                                    <center> <button class="btn btn-info btn-sm" id="btn_selecionar<?php echo $id_cliente; ?>">
                                                                            Selecionar
                                                                        </button> </center>
                                                                    <script>
                                                                        $('#btn_selecionar<?php echo $id_cliente; ?>').click(function() {

                                                                            var id_cliente = "<?php echo $id_cliente ?>";
                                                                            $('#id_cliente').val(id_cliente);

                                                                            var nombres = "<?php echo $clientes_dato['nombres']; ?>";
                                                                            $('#nombres').val(nombres);

                                                                            var telefono = "<?php echo $clientes_dato['telefono']; ?>";
                                                                            $('#telefono').val(telefono);

                                                                            var email = "<?php echo $clientes_dato['email']; ?>";
                                                                            $('#email').val(email);

                                                                            $('#modalBuscarCliente').modal('toggle');

                                                                        });
                                                                    </script>
                                                                </td>
                                                                <td><?php echo $id_cliente; ?></td>
                                                                <td><?php echo $clientes_dato['nombres']; ?></td>
                                                                <td><?php echo $clientes_dato['email']; ?></td>
                                                                <td><?php echo $clientes_dato['telefono']; ?></td>

                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for=""><Strong>Nombre del cliente</Strong></label>
                                        <input type="text" class="form-control" id="nombres" disabled>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for=""><Strong>Cedula del cliente</Strong></label>
                                        <input type="text" class="form-control" id="id_cliente" disabled>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for=""><Strong>Telefono</Strong></label>
                                        <input type="text" class="form-control" id="telefono" disabled>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for=""><Strong>Correo</Strong></label>
                                        <input type="email" class="form-control" id="email" disabled>
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
                                <input type="text" class="form-control" id="totalCancelar" value="<?php echo $PrecioTotal ?>" disabled>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Monto a cancelar:</label>
                                        <input type="text" id="totalPagado" class="form-control">
                                        <script>
                                            $('#totalPagado').keyup(function() {
                                                var totalCancelar = $('#totalCancelar').val();
                                                var totalPagado = $('#totalPagado').val();
                                                var cambio = parseFloat(totalPagado) - parseFloat(totalCancelar);
                                                $('#cambio').val(cambio);
                                            });
                                        </script>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Cambio:</label>
                                        <input type="text" id="cambio" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button id="guardarVenta" class="btn btn-sm btn-warning btn-block mt-2">
                                    <strong>
                                        Guardar venta
                                    </strong>
                                </button>
                                <div id="respuestaVenta"> </div>
                                <script>
                                    $('#guardarVenta').click(function() {
                                        var nro_ventas = '<?php echo $contador_ventas ?>';
                                        var id_cliente = $('#id_cliente').val();
                                        var totalCancelar = $('#totalCancelar').val();

                                        if (id_cliente == '') {
                                            alert('Debe elegir un cliente o registrarlo')
                                        } else {
                                            actualizarStock();
                                            guardarVenta();
                                            
                                        }

                                        function actualizarStock() {
                                            var i = 1;
                                            var n = '<?php echo $contador_carro ?>';
                                            var stock = '';
                                            for (var i = 1; i < n; i++) {
                                                var a = '#stockInventario' + i;
                                                var stockInventario = $(a).val();
                                                var b = '#cantidadCarro' + i;
                                                var cantidadCarro = $(b).html();
                                                var c = '#id_productos' + i;
                                                var id_productos = $(c).val();

                                                var stockCalculado = parseFloat(stockInventario - cantidadCarro)
                                                // alert(stockCalculado + ' -  '+  id_productos)

                                                var url3 = "../App/controllers/ventas/update_stock.php";
                                                $.get(url3, {
                                                    id_productos: id_productos,
                                                    stockCalculado: stockCalculado,
                                                }, function(datos) {

                                                });
                                            }
                                        };

                                        function guardarVenta() {
                                            var url = "../App/controllers/ventas/registrar_ventas.php";
                                            $.get(url, {
                                                nro_ventas: nro_ventas,
                                                id_cliente: id_cliente,
                                                totalCancelar: totalCancelar,
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