<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="altaUsuario.css" media="all">
    <link rel="stylesheet" href="loginEcoNet.css" media="all">
</header>



<?php
include("conexion.php");

if (isset($_POST['registrarse'])) {
        if (strlen($_POST['Nombres']) >= 1 && strlen($_POST['Apellidos'])  >= 1) {
    
        $name = trim($_POST['Nombres']);
        $apellido = trim($_POST['Apellidos']);
        $fechanac = date("d/m/y");
        $email = trim($_POST['mail']);
        $password = trim($_POST['password']);
        $password2 = trim($_POST['password2']);
        $username = trim($_POST['username']);

         if ($password === $password2) {
       
             $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
           
$consulta = "INSERT INTO usuarios(Nombres, Apellidos, Fecha_de_nacimiento, Correo, Password, Usuario) 
VALUES ('$name', '$apellido', '$fechanac',  '$email', '$hashedPassword', '$username')";

            $resultado = mysqli_query($conex, $consulta);

           
            if ($resultado) {
                ?>
                <div class="alert alert-success" role="alert">
Su cuenta fue creado con éxito
</div>
<div><a class="btn btn-success" id="iniciarSesionCalculadora" href="Login.php" role="button" style="color: rgb(5, 5, 5); margin-left: 3px; border: white;">Iniciar sesión</a></div>

                <?php
            } else {
                ?>
                <div class="alert alert-danger" role="alert">
¡Ups ha ocurrido un error! Intentá nuevamente
</div>
                <?php
            }
        } else {
            ?>
          <div class="alert alert-danger" role="alert">
Las contraseñas no coinciden. Por favor intentá nuevamente
</div>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-warning" role="alert">
        Por favor completá los campos
</div>
       
        <?php
    }
}
?>


