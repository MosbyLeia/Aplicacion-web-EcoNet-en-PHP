<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de usuarios</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->
</head>



<?php
session_start();

include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Obtiene los datos del formulario
    $apellidos = $_POST['Apellidos'];
    $nombres = $_POST['Nombres'];
    $fechanac = date("d/m/y");
    $email = trim($_POST['mail']);
    $password = trim($_POST['password']);
    $password2 = trim($_POST['password2']);
    $username = trim($_POST['username']);

     if ($password === $password2) {

         $hashedPassword = password_hash($password, PASSWORD_DEFAULT);}

$consulta = "INSERT INTO usuarios(Nombres, Apellidos, Fecha_de_nacimiento, Correo, Password, Usuario)
VALUES ('$nombres', '$apellidos', '$fechanac',  '$email', '$hashedPassword', '$username')";


    if ($conex->query($consulta) === TRUE) {

       echo
       '<div class="alert alert-info" role="alert">
       Usuario agregado con éxito
</div>';
    } else {

        echo "Error al agregar el usuario: " . $conex->error;
    }
} 

// $conex->close();


if (isset($_POST['eliminarUsuario2'])) {

    $id_usuario = $_POST['Id_usuarios'];


     $conex = new mysqli("localhost","root","","econet");


    if ($conex->connect_error) {
        die("Conexión fallida: " . $conex->connect_error);
    }


    $consulta = "DELETE FROM usuarios WHERE id = $id_usuario";

       if ($conex->query($consulta) === TRUE) {
        echo "Usuario eliminado exitosamente.";
    } else {
        echo "Error al eliminar el usuario: " . $conex->error;
    }

    // $conex->close();

}

if (isset($_POST['editarUsuarioModal1'])) {
    $id_usuario = $_POST['Id_usuarios'];
    $apellidos = $_POST['Apellidos'];
    $nombres = $_POST['Nombres'];
    $fechanac = $_POST['Fecha_de_nacimiento'];
    $email = trim($_POST['Correo']);
    $password = trim($_POST['Password']);
    $password2 = trim($_POST['ConfirmarPassword']);
    $username = trim($_POST['Usuario']);


    $sql = "SELECT * FROM usuarios";
    $resultado = $conex->query($sql);


     $id_usuario = $_POST['ID'];

    // Realizar una consulta SQL para obtener los datos actuales del usuario por su ID
    // $sql = "SELECT * FROM usuarios WHERE id=$id_usuario";
    // $resultado = $conex->query($sql);

    if ($resultado->num_rows > 0) {
        // Mostrar los datos en el formulario
        $fila = $resultado->fetch_assoc();
        $nombre_actual = $fila['Nombres'];
        $apellido_actual = $fila['Apellidos'];
        $fecha_actual = $fila['Fecha_de_nacimiento'] ;
        $correo_actual = $fila['Correo'];
        $usuario_actual = $fila['Usuario'];
        $pass_actual = $fila['Password'];



    } else {
        // No se encontraron datos del usuario
        $nombre_actual = "";
    }






    if ($password === $password2) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


        $consulta = "UPDATE usuarios SET Nombres='$nombres', Apellidos='$apellidos', Fecha_de_nacimiento='$fechanac', Correo='$email', Password='$hashedPassword', Usuario='$username' WHERE Id_usuarios=$id_usuario";

        if ($conex->query($consulta) === TRUE) {
            echo "Usuario actualizado exitosamente.";
        } else {
            echo "Error al actualizar el usuario: " . $conex->error;
        }
    } else {
        echo "Las contraseñas no coinciden.";
    }
}



$sql = "SELECT * FROM usuarios";
$resultado = $conex->query($sql);


//  $id_usuario = $_POST['Id_usuarios'];

// Realizar una consulta SQL para obtener los datos actuales del usuario por su ID
// $sql = "SELECT * FROM usuarios WHERE id=$id_usuario";
$resultado = $conex->query($sql);

if ($resultado->num_rows > 0) {
    // Mostrar los datos en el formulario
    $fila = $resultado->fetch_assoc();
    $nombre_actual = $fila['Nombres'];
    $apellido_actual = $fila['Apellidos'];
    $fecha_actual = $fila['Fecha_de_nacimiento'] ;
    $correo_actual = $fila['Correo'];
    $usuario_actual = $fila['Usuario'];
    $pass_actual = $fila['Password'];



} else {
    // No se encontraron datos del usuario
    $nombre_actual = "";
}




//prueba poner aca para editar

if (isset($_POST['editarUsuarioModal'])) {
    $id_usuario = $_POST['Id_usuarios'];
    $apellidos = $_POST['Apellidos'];
    $nombres = $_POST['Nombres'];
    $fechanac = $_POST['Fecha_de_nacimiento'];
    $email = trim($_POST['Correo']);
    $password = trim($_POST['Password']);
    $password2 = trim($_POST['ConfirmarPassword']);
    $username = trim($_POST['Usuario']);

    if ($password === $password2) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Consulta SQL para actualizar el usuario por su ID
        $sql = "UPDATE usuarios SET Nombres='$nombres', Apellidos='$apellidos', Fecha_de_nacimiento='$fechanac', Correo='$email', Password='$hashedPassword', Usuario='$username' WHERE Id_usuarios=$id_usuario";

        if ($conex->query($sql) === TRUE) {
            echo "Usuario actualizado exitosamente.";
        } else {
            echo "Error al actualizar el usuario: " . $conex->error;
        }
    } else {
        echo "Las contraseñas no coinciden.";
    }
}

?>


<body>

<div class="container mt-5">
<h2>Administración de usuarios</h2>
    <button type="button" class="btn btn-success offset-10" data-bs-toggle="modal" data-bs-target="#agregarModal">Agregar nuevo usuario</button>

    <table class="table mt-3">
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
            </tr>
        </thead>
        <tbody>
            <?php



            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila['Id_usuarios'] . "</td>";
                echo "<td>" . $fila['Apellidos'] . "</td>";
                echo "<td>" . $fila['Nombres'] . "</td>";
                echo "<td>" . $fila['Fecha_de_nacimiento'] . "</td>";
                echo "<td>" . $fila['Correo'] . "</td>";
                echo "<td>" . $fila['Usuario'] . "</td>";
                echo "<td>" . $fila['Password'] . "</td>";
                echo '<td>

 <a class="btn btn-info" href="editarUsuario.php?ID=' . $fila['Id_usuarios'] . '" role="button">Editar</a>';
                echo '</td>';
                echo "</tr>";



            }

            // if (isset($_POST['editarUsuarioModal'])) {
            //     $id_usuario = $_POST['Id_usuarios'];
            //     $apellidos = $_POST['Apellidos'];
            //     $nombres = $_POST['Nombres'];
            //     $fechanac = $_POST['Fecha_de_nacimiento'];
            //     $email = trim($_POST['Correo']);
            //     $password = trim($_POST['Password']);
            //     $password2 = trim($_POST['ConfirmarPassword']);
            //     $username = trim($_POST['Usuario']);

            //     if ($password === $password2) {
            //         $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            //         // Consulta SQL para actualizar el usuario por su ID
            //         $sql = "UPDATE usuarios SET Nombres='$nombres', Apellidos='$apellidos', Fecha_de_nacimiento='$fechanac', Correo='$email', Password='$hashedPassword', Usuario='$username' WHERE Id_usuarios=$id_usuario";

            //         if ($conex->query($sql) === TRUE) {
            //             echo "Usuario actualizado exitosamente.";
            //         } else {
            //             echo "Error al actualizar el usuario: " . $conex->error;
            //         }
            //     } else {
            //         echo "Las contraseñas no coinciden.";
            //     }
            // }

            ?>
            <?php


echo '<form action="eliminarUsuario.php" method="post">
<div class="row">
<div class="col-8 mb-3">
    <label for="id_usuario" class="form-label">Eliminar usuarios:</label>
    <input type="text" class="form-control" id="id_usuario" name="id_usuario" placeholder="ID del usuario a eliminar" required>
</div>
<div class="col-4 mb-3 mt-4">
    <button class="btn btn-danger" type="submit" name="eliminar_usuario">Eliminar Usuario</button>
</div>
</div>


</form>';  ?>

<div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="agregarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarModalLabel">Agregar Usuario</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="nombres">Nombres:</label>
                        <input type="text" class="form-control" name="Nombres" id="Nombre"  required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" class="form-control" name="Apellidos" id="Apellidos" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control"name="Fechanac" id="Fechanac" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input type="email" class="form-control" name="mail" id="mail" required>
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" name="password" id="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirme contraseña:</label>
                        <input type="password" class="form-control" name="password2" id="Password2" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 offset-8">Agregar Usuario</button>
                </form>
            </div>
        </div>
    </div>
</div>





<div class="modal fade" id="editarModal11" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para editar usuario -->
                <form id="editarUsuarioForm">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <input type="hidden" id="usuarioID" name="usuarioID">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editarUsuarioModal1 <?php echo $fila['Id_usuarios']; ?>" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel<?php echo $fila['Id_usuarios']; ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel<?php echo $fila['Id_usuarios']; ?>">Editar Usuario</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="nombres">Nombres:</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $fila['Nombres']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $fila['Apellidos']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $fila['Fecha_de_nacimiento']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $fila['Correo']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $fila['Usuario']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $fila['Password']; ?>" required>
                    </div>
                    <input type="hidden" name="usuario_id" value="<?php echo $fila['Id_usuarios']; ?>">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal editar -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- <form method="post" action="">
                    <div class="form-group">
                        <label for="nombres">Nombres:</label>
                        <input type="text" class="form-control" name="Nombres" id="Nombre"  required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" class="form-control" name="Apellidos" id="Apellidos" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control"name="Fechanac" id="Fechanac" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input type="email" class="form-control" name="mail" id="mail" required>
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" name="password" id="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirme contraseña:</label>
                        <input type="password" class="form-control" name="password2" id="Password2" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 offset-8">Agregar Usuario</button>
                </form>-->
                <form method="post" action="">
                    <div class="form-group">
                        <label for="nombres">Nombres:</label>
                        <!-- <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $fila['Nombres']; ?>" required> -->
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
                    <input type="hidden" name="usuario_id" value="<?php echo $fila['Id_usuarios']; ?>">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



</body>
</html>

