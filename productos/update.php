<?php
include('../App/config.php');
include('../layout/sesion.php');
include('../layout/header.php');
include('../App/controllers/productos/update_productos.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Agregar nuevo producto</h1>
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

                            <form action="../App/controllers/productos/update.php" method="post" enctype="multipart/form-data">
                                <input type="text" name="id_productos" value="<?php echo $id_productos_get; ?>" hidden>
                                <div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="id_productos">Código del producto:</label>
                                                <input type="number" class="form-control" value="<?php echo $id_productos; ?>" id="id_productos" name="id_productos" placeholder="Ingrese codigo del producto" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nombre">Nombre del producto:</label>
                                                <input type="text" class="form-control" value="<?php echo $nombre; ?>" id="nombre" name="nombre" placeholder="Ingrese nombre del producto" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="descripcion">Descripcion del producto:</label>
                                                <input type="text" class="form-control" value="<?php echo $descripcion; ?>" id="descripcion" name="descripcion" placeholder="Ingrese descripción del producto" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="stock">Stock:</label>
                                                <input type="number" class="form-control" value="<?php echo $stock; ?>" id="stock" name="stock" placeholder="Ingrese stock" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="stock_min">Stock minimo:</label>
                                                <input type="number" class="form-control" value="<?php echo $stock_min; ?>" id="stock_min" name="stock_min" placeholder="Ingrese cantidad minima de stock" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="stock_max">Stock maximo:</label>
                                                <input type="number" class="form-control" value="<?php echo $stock_max; ?>" id="stock_max" name="stock_max" placeholder="Ingrese cantidad maxima de stock" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="precio">Precio:</label>
                                                <input type="text" class="form-control" value="<?php echo $precio; ?>" id="precio" name="precio" placeholder="Ingrese precio del producto" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="fecha">Fecha:</label>
                                                <input type="date"  class="form-control" id="fecha" name="fecha" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="imagen">Imagen:</label>
                                                <input type="file" value="<?php echo $imagen; ?>" class="form-control" id="file" name="imagen" >
                                                <output id="list"></output>

                                                <script>
                                                    function archivo(evt) {
                                                        var files = evt.target.files; // FileList object
                                                        // Obtenemos la imagen del campo "file".
                                                        for (var i = 0, f; f = files[i]; i++) {
                                                            //Solo admitimos imágenes.
                                                            if (!f.type.match('image.*')) {
                                                                continue;
                                                            }
                                                            var reader = new FileReader();
                                                            reader.onload = (function(theFile) {
                                                                return function(e) {
                                                                    // Insertamos la imagen
                                                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
                                                                };
                                                            })(f);
                                                            reader.readAsDataURL(f);
                                                        }
                                                    }
                                                    document.getElementById('file').addEventListener('change', archivo, false);
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a href="index.php" class="btn btn-sm btn-outline-danger">Cancelar</a>
                                <button type="submit" class="btn btn-sm btn-warning" id="submit-btn">Actualizar producto</button>
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