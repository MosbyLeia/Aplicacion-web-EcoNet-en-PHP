<?php
session_start();
// if (!isset($_SESSION['admin_id'])) {
//     // Si no está autenticado como administrador, redirigirlo al formulario de inicio de sesión de administrador.
//     header("Location: Login.php");
//     exit();
// }

// Conexión a la base de datos
include('conexion.php');

// Consulta para obtener los datos que deseas mostrar en la interfaz de administración
$sql = "SELECT * FROM usuarios";
$resultado = $conex->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de usuarios</title>
</head>
<header>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</header>
<body>

<!-- Mostrar los datos en una tabla -->
<div class="container mt-5">
    <!-- Mostrar los datos en una tabla con Bootstrap -->
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th>ID</th>
                <th>Apellidos</th>
                <th>Nombres</th>   
                <th>Fecha de nacimiento</th> 
                 <th>Mail</th>
                 <th>Usuario</th>
                 <th>Contraseña</th>
                <th>Acciones</th>
                <!-- Agrega más encabezados para otros campos si es necesario -->
            </tr>
        </thead>
        <tbody>
            <?php
echo '<button type="button"  name="agregarUsuario" class="btn btn-success btn-sm" data-toggle="modal" data-target="#agregarModal">Agregar</button>';

            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila['Id_usuarios'] . "</td>";
                echo "<td>" . $fila['Apellidos'] . "</td>";
                echo "<td>" . $fila['Nombres'] . "</td>";
                echo "<td>" . $fila['Fecha_de_nacimiento'] . "</td>";
                echo "<td>" . $fila['Correo'] . "</td>";
                echo "<td>" . $fila['Usuario'] . "</td>";
                echo "<td>" . $fila['Password'] . "</td>";
                // Agrega más columnas para otros campos si es necesario
              

                echo "<td>";
echo '<button type="button"  name="editarUsuario" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editarModal' . $fila['Apellidos'] . '">Editar</button>';
echo ' <button type="button" name="eliminarUsuario" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal' . $fila['Apellidos'] . '">Eliminar</button>';
echo "</td>";
echo "</tr>";
            }
                ?>

<?php
if(isset($_POST['agregarUsuario'])){
  $id = $_POST['Id_usuarios'];
    $nombre = $_POST['Nombres'];
    $apellido = $_POST['Apellidos'];
    $email = $_POST['Correo'];
    $fechanac = $_POST['Fecha_de_nacimiento'];
    $usuario = $_POST['Usuario'];
    $password = $_POST['Password'];

  

    // Realizar la inserción en la base de datos
    $sql = "INSERT INTO usuarios (nombre, apellido, email, nacimiento, usuario, password) VALUES ('$nombre', '$apellido', '$email', '$fechanac', '$usuario', '$password')";
    if ($conex->query($sql) === TRUE) {
        echo "Usuario agregado con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conex->error;
    }
}
// Código para eliminar un usuario
if(isset($_GET['eliminarUsuario'])){
    $apellido = $_GET['eliminarUsuario'];

    // Realizar la eliminación en la base de datos
    $sql = "DELETE FROM usuarios WHERE Apellidos = $apellido";
    if ($conex->query($sql) === TRUE) {
        echo "Usuario eliminado con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conex->error;
    }
}

// Código para editar un usuario
if(isset($_POST['editarUsuario'])){
  $id = $_POST['Id_usuarios'];
    $nombre = $_POST['Nombres'];
    $apellido = $_POST['Apellidos'];
    $email = $_POST['Correo'];
    $fechanac = $_POST['Fecha_de_nacimiento'];
    $usuario = $_POST['Usuario'];
    $password = $_POST['Password'];

    // Realizar la actualización en la base de datos
    $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', email='$email' WHERE id=$id";
    if ($conex->query($sql) === TRUE) {
        echo "Usuario actualizado con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conex->error;
    }
}


?>

<!-- Modal para Editar Usuario -->
<div class="modal fade" id="editarModalID" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulario de edición del usuario -->
        <!-- Asegúrate de incluir campos ocultos para el ID del usuario -->
        <input type="hidden" id="usuarioID" value="ID_DEL_USUARIO">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre">
        </div>
        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input type="text" class="form-control" id="apellido">
        </div>
        <!-- Otros campos del formulario de edición -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="guardarCambiosBtn">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Confirmar Eliminación -->
<div class="modal fade" id="eliminarModalID" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminarModalLabel">Confirmar Eliminación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de que quieres eliminar este usuario?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="eliminarUsuarioBtn">Eliminar Usuario</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>
