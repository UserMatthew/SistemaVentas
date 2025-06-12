<?php
include('../App/config.php');
include('../layout/sesion.php');
include('../layout/header.php');
include('../App/controllers/ventas/read_ventas.php');
include('../App/controllers/clientes/read_clientes.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de ventas registradas</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card card-outline card-warning">
                        <!-- /.card-header -->
                        <div class="card-body">

                            <a href="create.php" class="btn btn-sm btn-warning">Agregar nuevo venta</a>
                            <table id="tb_ventas" class="table table-bordered table-hover table-sm mt-3">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Nº</center>
                                        </th>
                                        <th>
                                            <center>Nro de ventas</center>
                                        </th>
                                        <th>
                                            <center>Productos</center>
                                        </th>
                                        <th>
                                            <center>Cliente</center>
                                        </th>
                                        <th>
                                            <center>Monto total</center>
                                        </th>
                                        <th>
                                            <center>Acciones</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $n = 1;
                                    foreach ($ventas_datos as $ventas_dato) {
                                        $id_ventas = $ventas_dato['id_ventas'];
                                        echo '<tr>';
                                        echo '<td>' . $n . '</td>';
                                        echo '<td>' . $ventas_dato['nro_ventas'] . '</td>';

                                        // Botón y modal
                                        echo '<td><center>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#verProductos' . $id_ventas . '">
                                            <i class="fas fa-shopping-bag"></i> Productos
                                        </button>';

                                        // Modal
                                        echo '<div class="modal fade" id="verProductos' . $id_ventas . '" tabindex="-1" role="dialog" aria-labelledby="verProductosTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="verProductosTitle">Lista de productos de la venta # ' . $ventas_dato['nro_ventas'] . '</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">';

                                        // Tabla de productos
                                        $sql_carro = "SELECT *, p.nombre AS producto, p.descripcion AS descripcion, p.precio AS precio, p.stock AS stock, p.id_productos AS id_productos
                                        FROM tb_carro AS c 
                                        INNER JOIN tb_productos AS p ON c.id_productos = p.id_productos 
                                        WHERE nro_ventas = ?";
                                        $query_carro = $pdo->prepare($sql_carro);
                                        $query_carro->execute([$ventas_dato['nro_ventas']]);
                                        $carro_datos = $query_carro->fetchAll(PDO::FETCH_ASSOC);

                                        $contador_carro = 1;
                                        $cantidadTotal = 0;
                                        $PrecioUnitarioTotal = 0;
                                        $PrecioTotal = 0;

                                        echo '<table class="table table-bordered table-hover table-sm mt-3">
                                        <thead>
                                            <tr>
                                                <th><center>Nº</center></th>
                                                <th><center>Producto</center></th>
                                                <th><center>Detalle</center></th>
                                                <th><center>Cantidad</center></th>
                                                <th><center>Precio unitario</center></th>
                                                <th><center>Subtotal</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>';

                                        foreach ($carro_datos as $carro_dato) {
                                            $id_carro = $carro_dato['id_carro'];
                                            $subtotal = floatval($carro_dato['precio']) * floatval($carro_dato['cantidad']);
                                            $cantidadTotal += $carro_dato['cantidad'];
                                            $PrecioUnitarioTotal += $carro_dato['precio'];
                                            $PrecioTotal += $subtotal;

                                            echo '<tr>';
                                            echo '<td><center>' . $contador_carro . '<input type="hidden" value="' . $carro_dato['id_productos'] . '" id="id_productos' . $contador_carro . '"></center></td>';
                                            echo '<td>' . $carro_dato['producto'] . '</td>';
                                            echo '<td>' . $carro_dato['descripcion'] . '</td>';
                                            echo '<td><center><span id="cantidadCarro' . $contador_carro . '">' . $carro_dato['cantidad'] . '</span>
                                            <input type="hidden" value="' . $carro_dato['stock'] . '" id="stockInventario' . $contador_carro . '"></center></td>';
                                            echo '<td  style="text-align:right;"> $' . number_format($carro_dato['precio'], 2) . '</td>';
                                            echo '<td style="text-align:right;"> $' . number_format($subtotal, 2) . '</td>';
                                            $contador_carro++;
                                        }

                                        echo '<tr>
                                        <td colspan="3"><strong><center>TOTAL</center></strong></td>
                                        <td><strong><center>' . $cantidadTotal . '</center></strong></td>
                                        <td style="text-align:right;"><strong>$' . number_format($PrecioUnitarioTotal, 2) . '</></strong></td>
                                        <td style="text-align:right;"><strong>$' . number_format($PrecioTotal, 2) . '</strong></td>
                                        <td></td>
                                    </tr>';

                                        echo '</tbody></table>';

                                        echo '</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div></center></td>';

                                        // Cliente
                                        echo '
                                        <td>
                                            <center>
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#verCliente' . $id_ventas . '">
                                                    <i class="fas fa-user"></i> ' . $ventas_dato['nombre'] . '
                                                </button>
                                            </center>
                                        </td>
                                        
                                        <div class="modal fade" id="verCliente' . $id_ventas . '" tabindex="-1" role="dialog" aria-labelledby="verClienteLongTitle' . $id_ventas . '" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="verClienteLongTitle' . $id_ventas . '">Cliente</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row mt-3">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label><strong>Nombre del cliente</strong></label>
                                                                    <input type="text" class="form-control" value="' . $ventas_dato['nombre'] . '" disabled>
                                                                </div>
                                                            </div>
                                        
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label><strong>Cédula del cliente</strong></label>
                                                                    <input type="text" class="form-control" value="' . $ventas_dato['id_cliente'] . '" disabled>
                                                                </div>
                                                            </div>
                                        
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label><strong>Teléfono</strong></label>
                                                                    <input type="text" class="form-control" value="' . $ventas_dato['telefono'] . '" disabled>
                                                                </div>
                                                            </div>
                                        
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label><strong>Correo</strong></label>
                                                                    <input type="email" class="form-control" value="' . $ventas_dato['email'] . '" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                        




                                        // Total pagado
                                        echo '<td>$ ' . number_format($ventas_dato['total_pagado'], 2) . '</td>';

                                        // Ver y eliminar
                                        echo '<td><center>
                                        <a href="factura.php?id_ventas='. $ventas_dato['id_ventas'].'&nro_venta='. $ventas_dato['nro_ventas'].'" class="btn-sm btn-warning"><i class="fas fa-print"></i> Imprimir</a> 
                                        <a href="delete.php?id_ventas='. $ventas_dato['id_ventas'].'&nro_venta='. $ventas_dato['nro_ventas'].'" class="btn-sm btn-danger"><i class="fas fa-trash"></i> Eliminar</a>
                                    </center>';
                                        echo '</td>';
                                        echo '</tr>';
                                        $n++;
                                    }
                                    ?>
                                </tbody>

                            </table>
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
        $("#tb_ventas").DataTable({
            "pageLength": 10,
            language: {
                "emptyTable": "No hay información",
                "decimal": "",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Ventas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Ventas",
                "infoFiltered": "(Filtrado de _MAX_ total Ventas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Ventas",
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
            },
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            buttons: [{
                    extend: 'collection',
                    className: 'btn btn-sm btn-warning',
                    text: '📊 Reportes',
                    orientation: 'landscape',
                    buttons: [{
                        text: '📋 Copiar',
                        extend: 'copy'
                    }, {
                        text: '📑 PDF',
                        extend: 'pdf',
                    }, {
                        text: '📄 CSV',
                        extend: 'csv',
                    }, {
                        text: '📊 Excel',
                        extend: 'excel',
                    }, {
                        text: '🖨️ Imprimir',
                        extend: 'print'
                    }]
                },
                {
                    extend: 'colvis',
                    text: '👁️ Visor de columnas',
                    className: 'btn btn-sm btn-warning'
                }
            ],
        }).buttons().container().appendTo('#tb_ventas_wrapper .col-md-6:eq(0)').addClass('mt-3');
    });
</script>