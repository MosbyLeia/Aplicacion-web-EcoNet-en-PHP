<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'econet';

$conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_error()) {
    exit('Fallo en la conexión de MySQL:' . mysqli_connect_error());
}

$mostrarError = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['Usuario']) || empty($_POST['Password'])) {
      echo  '<div class="alert alert-warning" role="alert">
       Por favor completá los campos
        </div>';
    } else {
        // Evitar inyección SQL
        if ($stmt = $conexion->prepare('SELECT Password FROM usuarios WHERE Usuario = ?')) {
            $stmt->bind_param('s', $_POST['Usuario']);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($password);
                $stmt->fetch();

                // Validar la contraseña
                if (password_verify($_POST['Password'], $password)) {

                    // La conexión sería exitosa, se crea la sesión
                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['name'] = $_POST['Usuario'];
                    header('Location: calculadoraMain.php');
                } else {
                    // Contraseña incorrecta
                    $mostrarError = true;
                }
            } else {
                // Usuario incorrecto
                $mostrarError = true;
            }

            $stmt->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">


<body>
    <?php
    if ($mostrarError) {
        echo '<div class="alert alert-danger" role="alert">
        El usuario o la clave no son válidos
        </div>';
    }
    ?>

</body>

</html>






