<?php
    session_start();
    
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'econet';
    
    $conexion = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombreUsuario = $_POST['Usuario'];
        $contrasena = $_POST['Password'];
    
        $stmt = $conexion->prepare("SELECT Id_usuarios, Usuario, Password FROM administradores WHERE Usuario = ?");
        $stmt->bind_param('s', $nombreUsuario);
        $stmt->execute();
        $stmt->store_result();
    
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($idUsuario, $usuario, $contrasenaHash);
            $stmt->fetch();
    
            if (password_verify($contrasena, $contrasenaHash)) {
                $_SESSION['Id_usuarios'] = $idUsuario;
                $_SESSION['Usuario'] = $usuario;
                header("Location: administradores.php"); 
            } 
            else  if (empty($_POST['Usuario']) || empty($_POST['Password'])) {
                echo  '<div class="alert alert-warning" role="alert">
                 Por favor completá los campos
                  </div>';}
                  else {
                echo '<div class="alert alert-danger" role="alert">
               La contraseña es incorrecta
                 </div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert"> Usuario no encontrado.</div>';
        }
    
        $stmt->close();
        $conexion->close();
    }
    
    




?>
