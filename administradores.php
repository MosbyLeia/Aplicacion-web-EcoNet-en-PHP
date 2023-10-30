<?php
    session_start();
    include("conexion.php");
    // include("sesiones.php");
    // Iniciar y cerrar sesión de usuario
    if(isset($_GET['accion'])){
        if($_GET['accion']=="cerrar"){
            session_destroy();
            header("Location:index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <!-- Agregar CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Editar Usuario</h1>
            <!-- Mostrar el mensaje de éxito si está definido -->
            <?php if(isset($_GET['exito'])): ?>
                <div class="alert alert-success">
                    Usuario actualizado con éxito.
                </div>
            <?php endif; ?>

            <!-- Código para editar un usuario -->
            <?php
                if(isset($_POST['editarUsuario'])){
                    $id = $_POST['Id_usuarios'];
                    $nombre = $_POST['Nombres'];
                    $apellido = $_POST['Apellidos'];
                    $email = $_POST['Correo'];
                    $fechanac = $_POST['Fecha_de_nacimiento'];
                    $usuario = $_POST['Usuario'];
                    $password = $_POST['Password'];

                    // Realizar la actualización en la base de datos
                    $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', email='$email' WHERE id_usuarios=$id";
                    $resultado = mysqli_query($conexion, $sql);

                    if($resultado){
                        // Si la actualización fue exitosa, redirigir al usuario a la página principal con un mensaje de éxito
                        header("Location: index.php?exito");
                    }else{
                        echo "Error al actualizar el usuario.";
                    }
                }
            ?>

            <!-- Formulario para editar el usuario -->
            <form action="" method="post">
                <div class="form-group">
                    <label for="Nombres">Nombres</label>
                    <input type="text" class="form-control" id="Nombres" name="Nombres" required>
                </div>
                <div class="form-group">
                    <label for="Apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="Apellidos" name="Apellidos" required>
                </div>
                <div class="form-group">
                    <label for="Correo">Correo</label>
                    <input type="email" class="form-control" id="Correo" name="Correo" required>
                </div>
                <div class="form-group">
                    <label for="Fecha_de_nacimiento">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="Fecha_de_nacimiento" name="Fecha_de_nacimiento" required>
                </div>
                <div class="form-group">
                    <label for="Usuario">Usuario</label>
                    <input type="text" class="form-control" id="Usuario" name="Usuario" required>
                </div>
                <div class="form-group">
                    <label for="Password">Contraseña</label>
                    <input type="password" class="form-control" id="Password" name="Password" required>
                </div>
                <input type="hidden" name="Id_usuarios" id="Id_usuarios">
                <button type="submit" class="btn btn-primary" name="editarUsuario">Editar Usuario</button>
            </form>
        </div>
    </div>
</div>

<!-- Agregar JS de Bootstrap y Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>