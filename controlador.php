<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si los campos están vacíos
    if (empty($_POST['Usuario']) || empty($_POST['Password'])) {
        echo '<div class="alert alert-warning" role="alert">Por favor completá los campos</div>';
    } else {
        // Obtener datos del formulario
        $nombreUsuario = $_POST['Usuario'];
        $contrasena = $_POST['Password'];

        // Preparar la consulta SQL
        $stmt = $conex->prepare("SELECT Id_usuarios, Usuario, Password FROM usuarios WHERE Usuario = ?");
        $stmt->bind_param('s', $nombreUsuario);
        $stmt->execute();
        $stmt->store_result();

        // Verificar si el usuario existe en la base de datos
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($idUsuario, $usuario, $contrasenaHash);
            $stmt->fetch();

            // Verificar la contraseña
            if (password_verify($contrasena, $contrasenaHash)) {
                // La contraseña es correcta, iniciar sesión
                $_SESSION['Id_usuarios'] = $idUsuario;
                $_SESSION['Usuario'] = $usuario;
                header("Location: calculadoraMain.php"); // Redirigir a la página de inicio después del inicio de sesión exitoso
            } else {
                // Contraseña incorrecta
                echo '<div class="alert alert-danger" role="alert">Contraseña incorrecta</div>';
            }
        } else {
            // Usuario incorrecto
            echo '<div class="alert alert-danger" role="alert">Usuario incorrecto</div>';
        }

        $stmt->close();
    }
}
?>






