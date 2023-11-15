

<?php
// Verificar si se ha enviado el formulario de eliminación
if (isset($_POST['eliminar_usuario'])) {
    // Obtener el ID del usuario a eliminar desde el formulario
    $id_usuario = $_POST['id_usuario'];

    // Conectar a la base de datos (ajusta las credenciales según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "econet";

    $conex = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión a la base de datos
    if ($conex->connect_error) {
        die("Conexión fallida: " . $conex->connect_error);
    }

    // Consulta SQL para eliminar el usuario por su ID
    $sql = "DELETE FROM usuarios WHERE Id_usuarios = $id_usuario";

    // Ejecutar la consulta y verificar si se ha eliminado el usuario
    if ($conex->query($sql) === TRUE) {
        echo '<div class="container mt-5">
        <div class="alert alert-success text-center" role="alert">
            ¡Usuario eliminado exitosamente!
        </div>
        <div class="d-flex justify-content-center mt-3">
            <a class="btn btn-success btn-sm" href="administradores.php">Volver</a>
        </div>
    </div>
    ';
    } 

    // Cerrar la conexión a la base de datos
    $conex->close();
    
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>