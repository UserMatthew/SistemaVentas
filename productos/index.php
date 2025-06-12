<?php
include('../App/config.php');
include('../layout/sesion.php');
include('../layout/header.php');
include('../App/controllers/productos/read_productos.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de productos registrados</h1>
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
                        <div class="card-body">

                            <a href="create.php" class="btn btn-sm btn-warning">Agregar nuevo producto</a>
                            <table id="tb_productos" class="table table-bordered table-hover table-sm mt-3">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Nº</center>
                                        </th>
                                        <th> 
                                            <center>Código</center>
                                        </th>
                                        <th>
                                            <center>Nombre</center>
                                        </th>
                                        <th>
                                            <center>descripcion</center>
                                        </th>
                                        <th>
                                            <center>Precio</center>
                                        </th>
                                        <th>
                                            <center>Stock</center>
                                        </th>
                                        <th>
                                            <center>Stock mínimo</center>
                                        </th>
                                        <th>
                                            <center>Stock maximo</center>
                                        </th>
                                        <th>
                                            <center>Imagen</center>
                                        </th>
                                        <th>
                                            <center>Acciones</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $n = 1;
                                    foreach ($productos_datos as $producto) {
                                        echo '<tr>';
                                        echo '<td>' . $n . '</td>'; 
                                        echo '<td>' . $producto['id_productos'] . '</td>';
                                        echo '<td class="text-truncate" style="max-width: 200px;" title="' . htmlspecialchars($producto['nombre']) . '">' . htmlspecialchars($producto['nombre']) . '</td>';
                                        echo '<td class="text-truncate" style="max-width: 200px;" title="' . htmlspecialchars($producto['descripcion']) . '">' . htmlspecialchars($producto['descripcion']) . '</td>';
                                        echo '<td>' . $producto['precio'] . '</td>';  
                                        echo '<td>' . $producto['stock'] . '</td>';
                                        echo '<td>' . $producto['stock_min'] . '</td>';
                                        echo '<td>' . $producto['stock_max'] . '</td>';
                                        echo '<td> <center> <img src="'.$URL.'/productos/img_productos/'. $producto['imagen'] . '" alt="Imagen del producto" width="30"> </center> </td>';

                                        echo '<td> 
                                        <center>
                                        <a href="update.php?id=' . $producto['id_productos'] . '" class="btn-sm btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                        ' ?> <a href="#" class="btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $producto['id_productos'] ?>"><i class="fas fa-trash"></i> Eliminar</a>
                                        <!-- Modal de Eliminación -->
                                        <div class="modal fade" id="deleteModal<?php echo $producto['id_productos'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header card-outline card-danger">
                                                        <h5 class="modal-title" id="deleteModalLabel"> <strong>Confirmar eliminación</strong> </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro que desea eliminar al producto <strong><?php echo $producto['nombre'] ?></strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-outline-dark" data-dismiss="modal">Cancelar</button>
                                                        <a href="../App/controllers/productos/delete_producto.php?id_productos=<?php echo $producto['id_productos'] ?>&nombres=<?php echo $producto['nombre'] ?>" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> Eliminar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                         
                                    <?php ' </center>
                                        </td>';
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
        $("#tb_productos").DataTable({
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
        }).buttons().container().appendTo('#tb_productos_wrapper .col-md-6:eq(0)').addClass('mt-3');
    });
</script>