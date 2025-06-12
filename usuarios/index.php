<?php
include('../App/config.php');
include('../layout/sesion.php');
include('../layout/header.php');
include('../App/controllers/usuarios/read_usuarios.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de usuarios registrados</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-outline card-warning">
                        <!-- /.card-header -->
                        <div class="card-body">

                            <a href="create.php" class="btn btn-sm btn-warning">Agregar nuevo usuario</a>
                            <table id="tb_usuarios" class="table table-bordered table-hover table-sm mt-3">
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
                                            <center>Acciones</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $n = 1;
                                    foreach ($usuarios_datos as $usuario) {
                                        echo '<tr>';
                                        echo '<td>' . $n . '</td>';
                                        echo '<td>' . $usuario['id_usuario'] . '</td>';
                                        echo '<td class="text-truncate" style="max-width: 200px;" title="' . htmlspecialchars($usuario['nombres']) . '">' . htmlspecialchars($usuario['nombres']) . '</td>';
                                        echo '<td class="text-truncate" style="max-width: 200px;" title="' . htmlspecialchars($usuario['email']) . '">' . htmlspecialchars($usuario['email']) . '</td>';
                                        echo '<td> 
                                        <center>
                                        <a href="update.php?id=' . $usuario['id_usuario'] . '" class="btn-sm btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                        ' ?> <a href="#" class="btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $usuario['id_usuario'] ?>"><i class="fas fa-trash"></i> Eliminar</a>
                                        <!-- Modal de Eliminación -->
                                        <div class="modal fade" id="deleteModal<?php echo $usuario['id_usuario'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header card-outline card-danger">
                                                        <h5 class="modal-title" id="deleteModalLabel"> <strong>Confirmar eliminación</strong> </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro que desea eliminar al usuario <strong><?php echo $usuario['nombres'] ?></strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-outline-dark" data-dismiss="modal">Cancelar</button>
                                                        <a href="../App/controllers/usuarios/delete_usuario.php?id_usuario=<?php echo $usuario['id_usuario'] ?>&nombres=<?php echo $usuario['nombres'] ?>" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> Eliminar</a>
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
        $("#tb_usuarios").DataTable({
            "pageLength": 10,
            language: {
                "emptyTable": "No hay información",
                "decimal": "",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                "infoEmpty": "Mostrando 0 to 0 of 0 Usuarios",
                "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Usuarios",
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
        }).buttons().container().appendTo('#tb_usuarios_wrapper .col-md-6:eq(0)').addClass('mt-3');
    });
</script>