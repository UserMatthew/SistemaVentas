<?php
include('../App/config.php');
include('../layout/sesion.php');
include('../layout/header.php');
include('../App/controllers/usuarios/update_usuarios.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Actualizar usuario</h1>
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

                        <form action="../App/controllers/usuarios/update.php" method="post">
                            <input type="text" name="id_usuario" value="<?php echo $id_usuario_get; ?>" hidden>
                            <div>
                                <div class="form-group">
                                    <label for="nombres">Nombre completo</label>
                                    <input type="text" class="form-control" id="nombres" value="<?php echo $nombres; ?>" name="nombres" placeholder="Ingrese su nombre completo" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cedula">Cedula</label>
                                <input type="number" class="form-control" id="cedula" value="<?php echo $id_usuario; ?>" name="id_usuario" placeholder="Ingrese su cedula" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" value="<?php echo $email; ?>" name="email" placeholder="Ingrese su email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password_usuario" 
                                    placeholder="Ingrese su contraseña" required
                                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                                    title="La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial">
                                <small class="form-text text-muted">
                                    <ul id="password-requirements" style="display: none; transition: all 0.3s ease; padding-left: 20px; list-style: none;">
                                        <li id="length" class="text-danger requirement-item" style="transition: all 0.3s ease;"><span style="margin-right: 5px;">•</span>Mínimo 8 caracteres</li>
                                        <li id="uppercase" class="text-danger requirement-item" style="transition: all 0.3s ease;"><span style="margin-right: 5px;">•</span>Al menos una letra mayúscula</li>
                                        <li id="lowercase" class="text-danger requirement-item" style="transition: all 0.3s ease;"><span style="margin-right: 5px;">•</span>Al menos una letra minúscula</li>
                                        <li id="number" class="text-danger requirement-item" style="transition: all 0.3s ease;"><span style="margin-right: 5px;">•</span>Al menos un número</li>
                                        <li id="special" class="text-danger requirement-item" style="transition: all 0.3s ease;"><span style="margin-right: 5px;">•</span>Al menos un carácter especial (@$!%*?&)</li>
                                    </ul>
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="password_confirm">Confirmar contraseña</label>
                                <input type="password" class="form-control" id="password_confirm" name="password_confirm" 
                                    placeholder="Ingrese su contraseña" required>
                                <small class="form-text text-muted" id="password-match-message"></small>
                            </div>
                            <a href="index.php" class="btn btn-sm btn-outline-danger">Cancelar</a>
                            <button type="submit" class="btn btn-sm btn-warning" id="submit-btn">Actualizar usuario</button>
                        </form>

                        <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const password = document.getElementById('password');
                            const confirmPassword = document.getElementById('password_confirm');
                            const submitBtn = document.getElementById('submit-btn');
                            const message = document.getElementById('password-match-message');
                            const requirementsList = document.getElementById('password-requirements');

                            // Mostrar requisitos cuando el input recibe el foco
                            password.addEventListener('focus', function() {
                                requirementsList.style.display = 'block';
                                // Mostrar todos los requisitos cuando el input recibe el foco
                                Array.from(requirementsList.children).forEach(item => {
                                    item.style.display = 'block';
                                    item.style.opacity = '1';
                                });
                            });

                            // Función para validar requisitos de contraseña
                            function validatePasswordRequirements() {
                                const value = password.value;
                                
                                // Validar longitud
                                if (value.length >= 8) {
                                    document.getElementById('length').classList.remove('text-danger');
                                    document.getElementById('length').classList.add('text-success');
                                    document.getElementById('length').style.opacity = '0';
                                    setTimeout(() => {
                                        document.getElementById('length').style.display = 'none';
                                    }, 300);
                                } else {
                                    document.getElementById('length').classList.remove('text-success');
                                    document.getElementById('length').classList.add('text-danger');
                                    document.getElementById('length').style.display = 'block';
                                    document.getElementById('length').style.opacity = '1';
                                }

                                // Validar mayúscula
                                if (/[A-Z]/.test(value)) {
                                    document.getElementById('uppercase').classList.remove('text-danger');
                                    document.getElementById('uppercase').classList.add('text-success');
                                    document.getElementById('uppercase').style.opacity = '0';
                                    setTimeout(() => {
                                        document.getElementById('uppercase').style.display = 'none';
                                    }, 300);
                                } else {
                                    document.getElementById('uppercase').classList.remove('text-success');
                                    document.getElementById('uppercase').classList.add('text-danger');
                                    document.getElementById('uppercase').style.display = 'block';
                                    document.getElementById('uppercase').style.opacity = '1';
                                }

                                // Validar minúscula
                                if (/[a-z]/.test(value)) {
                                    document.getElementById('lowercase').classList.remove('text-danger');
                                    document.getElementById('lowercase').classList.add('text-success');
                                    document.getElementById('lowercase').style.opacity = '0';
                                    setTimeout(() => {
                                        document.getElementById('lowercase').style.display = 'none';
                                    }, 300);
                                } else {
                                    document.getElementById('lowercase').classList.remove('text-success');
                                    document.getElementById('lowercase').classList.add('text-danger');
                                    document.getElementById('lowercase').style.display = 'block';
                                    document.getElementById('lowercase').style.opacity = '1';
                                }

                                // Validar número
                                if (/[0-9]/.test(value)) {
                                    document.getElementById('number').classList.remove('text-danger');
                                    document.getElementById('number').classList.add('text-success');
                                    document.getElementById('number').style.opacity = '0';
                                    setTimeout(() => {
                                        document.getElementById('number').style.display = 'none';
                                    }, 300);
                                } else {
                                    document.getElementById('number').classList.remove('text-success');
                                    document.getElementById('number').classList.add('text-danger');
                                    document.getElementById('number').style.display = 'block';
                                    document.getElementById('number').style.opacity = '1';
                                }

                                // Validar carácter especial
                                if (/[@$!%*?&]/.test(value)) {
                                    document.getElementById('special').classList.remove('text-danger');
                                    document.getElementById('special').classList.add('text-success');
                                    document.getElementById('special').style.opacity = '0';
                                    setTimeout(() => {
                                        document.getElementById('special').style.display = 'none';
                                    }, 300);
                                } else {
                                    document.getElementById('special').classList.remove('text-success');
                                    document.getElementById('special').classList.add('text-danger');
                                    document.getElementById('special').style.display = 'block';
                                    document.getElementById('special').style.opacity = '1';
                                }
                            }

                            function validatePasswords() {
                                if (password.value === confirmPassword.value) {
                                    message.style.color = 'green';
                                    message.textContent = 'Las contraseñas coinciden';
                                    submitBtn.disabled = false;
                                } else {
                                    message.style.color = 'red';
                                    message.textContent = 'Las contraseñas no coinciden';
                                    submitBtn.disabled = true;
                                }
                            }

                            password.addEventListener('input', function() {
                                validatePasswordRequirements();
                                validatePasswords();
                            });
                            confirmPassword.addEventListener('input', validatePasswords);
                        });
                        </script>

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
?>