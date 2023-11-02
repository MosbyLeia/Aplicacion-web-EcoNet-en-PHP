<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal de Agregar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        .container {
            margin-top: 50px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>

<?php
// Establece la conexión a la base de datos (reemplaza estas líneas con tus propias credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$database = "econet";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id_usuario = $_GET['ID'];

$sql = "SELECT * FROM usuarios WHERE Id_usuarios = $id_usuario";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $fila = $result->fetch_assoc();
    $nombre_actual = $fila['Nombres'];
    $apellido_actual = $fila['Apellidos'];
    $fecha_actual = $fila['Fecha_de_nacimiento'];
    $correo_actual = $fila['Correo'];
    $usuario_actual = $fila['Usuario'];
    $pass_actual = $fila['Password'];
} else {
    $nombre_actual = "";
}

// if(isset($_POST['guardarCambios'])){
//     $id = $_POST['Id_usuarios'];
//       $nombre = $_POST['Nombres'];
//       $apellido = $_POST['Apellidos'];
//       $email = $_POST['Correo'];
//       $fechanac = $_POST['Fecha_de_nacimiento'];
//       $usuario = $_POST['Usuario'];
//       $correo = $_POST['Correo'];
//       $password = $_POST['Password'];
  
//       // Realizar la actualización en la base de datos
//       $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', email='$email', fecha_nacimiento='$fechanac', usuario='$usuario', correo='$correo', password='password'  WHERE id=$id";
//       if ($conex->query($sql) === TRUE) {
//           echo "Usuario actualizado con éxito.";
//       } else {
//           echo "Error: " . $sql . "<br>" . $conex->error;
//       }
//   }

if(isset($_POST['guardarCambios'])){
    $id = $_POST['usuario_id']; // Cambiado de 'Id_usuarios' a 'usuario_id'
    $nombre = $_POST['nombres']; // Cambiado de 'Nombres' a 'nombres'
    $apellido = $_POST['apellidos']; // Cambiado de 'Apellidos' a 'apellidos'
    $email = $_POST['correo']; // Cambiado de 'Correo' a 'correo'
    $fechanac = $_POST['fecha_nacimiento']; // Cambiado de 'Fecha_de_nacimiento' a 'fecha_nacimiento'
    $usuario = $_POST['usuario']; // Cambiado de 'Usuario' a 'usuario'
    $correo = $_POST['correo']; // Cambiado de 'Correo' a 'correo'
    $password = $_POST['password']; // Cambiado de 'Password' a 'password'

    // Realizar la actualización en la base de datos
    $sql = "UPDATE usuarios SET Nombres='$nombre', Apellidos='$apellido', Correo='$email', Fecha_de_nacimiento='$fechanac', Usuario='$usuario', Password='$password'  WHERE Id_usuarios=$id"; // Corregido nombres de las columnas y variables

    // if ($conn->query($sql) === TRUE) { // Cambiado de '$conex' a '$conn'
    //     echo "Usuario actualizado con éxito.";
      
    // } 
    if ($conn->query($sql) === TRUE) {
        $mensaje = "Usuario actualizado con éxito.";
        header("refresh:2;url=administradores.php");
    } else {
        $mensaje = "Error al actualizar el usuario: " . $conn->error;
    }

}
?>
<?php if(!empty($mensaje)) { ?>
        <div class="alert <?php echo ($conn->query($sql) === TRUE) ? 'alert-success' : 'alert-danger'; ?> text-center" role="alert">
            <?php echo $mensaje; ?>
        </div>
    <?php } ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">Editar Usuario</h2>
            <form method="post" action="">
                <div class="form-group">
                    <label for="nombres">Nombres:</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $nombre_actual; ?>" required>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $apellido_actual; ?>" required>
                </div>
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $fecha_actual; ?>" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo:</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $correo_actual; ?>" required>
                </div>
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario_actual; ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $pass_actual; ?>" required>
                </div>
                <input type="hidden" name="usuario_id" value="<?php echo $id_usuario; ?>">
                <div class="row">
    
    <div class="col-md-6 text-end mb-2">
        <a class="btn btn-info" href="administradores.php" role="button">Volver</a>
    </div>
    <div class="col-md-6 text-end mb-2">
        <button type="submit" class="btn btn-primary" name="guardarCambios">Guardar Cambios</button>
    </div>
</div>

            </form>
        </div>
    </div>
</div>
</body>
</html>












