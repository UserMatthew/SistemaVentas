<?php
include('../App/config.php');
include('../layout/sesion.php');
include('../layout/header.php');
include('../App/controllers/clientes/read_clientes.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de clientes registrados</h1>
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

                            <a href="create.php" class="btn btn-sm btn-warning">Agregar nuevo cliente</a>
                            <table id="tb_clientes" class="table table-bordered table-hover table-sm mt-3">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Nº</center>
                                        </th>
                                        <th>
                                            <center>Cedula</center>
                                        </th>
                                        <th>
                                            <center>Nombres</center>
                                        </th>
                                        <th>
                                            <center>Email</center>
                                        </th>
                                        <th>
                                            <center>Telefono</center>
                                        </th>
                                        <th>
                                            <center>Direccion</center>
                                        </th>
                                        <th>
                                            <center>Municipio</center>
                                        </th>
                                        <th>
                                            <center>Acciones</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $n = 1;
                                    foreach ($clientes_datos as $cliente) {
                                        echo '<tr>';
                                        echo '<td>' . $n . '</td>'; 
                                        echo '<td>' . $cliente['id_cliente'] . '</td>';
                                        echo '<td class="text-truncate" style="max-width: 200px;" title="' . htmlspecialchars($cliente['nombres']) . '">' . htmlspecialchars($cliente['nombres']) . '</td>';
                                        echo '<td class="text-truncate" style="max-width: 200px;" title="' . htmlspecialchars($cliente['email']) . '">' . htmlspecialchars($cliente['email']) . '</td>';
                                        echo '<td>' . $cliente['telefono'] . '</td>';
                                        echo '<td class="text-truncate " style="max-width: 200px;" title="' . htmlspecialchars($cliente['direccion']) . '">' . htmlspecialchars($cliente['direccion']) . '</td>';
                                        echo '<td>' . $cliente['municipio'] . '</td>';
                                        echo '<td> 
                                        <center>
                                        <a href="update.php?id=' . $cliente['id_cliente'] . '" class="btn-sm btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                        ' ?> <a href="#" class="btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $cliente['id_cliente'] ?>"><i class="fas fa-trash"></i> Eliminar</a>
                                        <!-- Modal de Eliminación -->
                                        <div class="modal fade" id="deleteModal<?php echo $cliente['id_cliente'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header card-outline card-danger">
                                                        <h5 class="modal-title" id="deleteModalLabel"> <strong>Confirmar eliminación</strong> </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro que desea eliminar al cliente <strong><?php echo $cliente['nombres'] ?></strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-outline-dark" data-dismiss="modal">Cancelar</button>
                                                        <a href="../App/controllers/clientes/delete_cliente.php?id_cliente=<?php echo $cliente['id_cliente'] ?>&nombres=<?php echo $cliente['nombres'] ?>" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> Eliminar</a>
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
        $("#tb_clientes").DataTable({
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
        }).buttons().container().appendTo('#tb_clientes_wrapper .col-md-6:eq(0)').addClass('mt-3');
    });
</script>