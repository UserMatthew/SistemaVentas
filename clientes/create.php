<?php
include('../App/config.php');
include('../layout/sesion.php');
include('../layout/header.php');
include('../App/controllers/clientes/read_clientes.php');
?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Agregar nuevo cliente</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-outline card-warning">
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form action="../App/controllers/clientes/create_clientes.php" method="post">
                                <div>
                                    <div class="form-group">
                                        <label for="nombres">Nombre completo del cliente</label>
                                        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese su nombre completo" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cedula">Cedula del cliente</label>
                                        <input type="number" class="form-control" id="cedula" name="id_cliente" placeholder="Ingrese su cedula" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email del cliente</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono">Telefono del cliente</label>
                                        <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su telefono" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="direccion">Direccion del cliente</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su direccion" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="municipio">Municipio del cliente</label>
                                        <select class="form-control" id="municipio" name="municipio" required style="width: 100%;">
                                            <option value="" id="municipio" disabled selected>Seleccione un municipio</option>
                                        </select>
                                    </div>
                                </div>

                                <a href="index.php" class="btn btn-sm btn-outline-danger">Cancelar</a>
                                <button type="submit" class="btn btn-sm btn-warning" id="submit-btn">Agregar usuario</button>
                            </form>
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
    fetch('https://raw.githubusercontent.com/marcovega/colombia-json/master/colombia.min.json')
        .then(res => res.json())
        .then(data => {
            const allMunicipios = [];
            data.forEach(d => allMunicipios.push(...d.ciudades));

            const select = document.getElementById('municipio');
            allMunicipios.sort().forEach(mun => {
                const option = document.createElement('option');
                option.value = mun;
                option.textContent = mun;
                select.appendChild(option);
            });

            $('#municipios').select2({
                placeholder: 'Seleccione un municipio',
                allowClear: true,


            });
        });
</script>