<?php
session_start();
// Comprueba la autenticación del administrador, si es necesario.
// if (!isset($_SESSION['admin_id'])) {
//     header("Location: Login.php");
//     exit();
// }

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

    // // Prepara la consulta para agregar el usuario a la base de datos
    // $sql = "INSERT INTO usuarios (Apellidos, Nombres) VALUES ('$apellidos', '$nombres')";
    
    // Ejecuta la consulta
    if ($conex->query($consulta) === TRUE) {
        // Redirige de nuevo a la página de administradores con un mensaje de éxito
       echo "Usuario agregado con éxito";
    } else {
        // Si hay un error en la consulta, redirige de nuevo a la página de administradores con un mensaje de error
        echo "Error al agregar el usuario: " . $conex->error;
    }
} else {
    // Si no se enviaron datos del formulario, redirige de nuevo a la página de administradores con un mensaje de error
    // echo "No se enviaron datos del formulario";
}

// Cierra la conexión a la base de datos
// $conex->close();


if (isset($_POST['eliminarUsuario2'])) {
    // Obtener el ID del usuario a eliminar desde el formulario
    $id_usuario = $_POST['Id_usuarios'];

    // Conectar a la base de datos (ajusta las credenciales según tu configuración)
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "econet"
     $conex = new mysqli("localhost","root","","econet"); 
   // $conex = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión a la base de datos
    if ($conex->connect_error) {
        die("Conexión fallida: " . $conex->connect_error);
    }

    // Consulta SQL para eliminar el usuario por su ID
    $consulta = "DELETE FROM usuarios WHERE id = $id_usuario";

    // Ejecutar la consulta y verificar si se ha eliminado el usuario
    if ($conex->query($consulta) === TRUE) {
        echo "Usuario eliminado exitosamente.";
    } else {
        echo "Error al eliminar el usuario: " . $conex->error;
    }

    // Cerrar la conexión a la base de datos
    $conex->close();

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

    if ($password === $password2) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Consulta SQL para actualizar el usuario por su ID
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
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST['editarUsuarioModal'])) {
//     $apellidos = $_POST['Apellidos'];
//     $nombres = $_POST['Nombres'];
//     $fechanac = date("d/m/y");
//     $email = trim($_POST['mail']);
//     $password = trim($_POST['password']);
//     $password2 = trim($_POST['password2']);
//     $username = trim($_POST['username']);

//      if ($password === $password2) {
   
//          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);}
       


//     // Consulta SQL para actualizar el usuario por su ID
//     $sql = "UPDATE usuarios SET (Nombres, Apellidos, Fecha_de_nacimiento, Correo, Password, Usuario) 
//     VALUES ('$nombres', '$apellidos', '$fechanac',  '$email', '$hashedPassword', '$username') WHERE usuarios.Id_usuarios = 'ID'";


// // UPDATE `usuarios` SET `Nombres` = 'sole' WHERE `usuarios`.`Id_usuarios` = 26


//     if ($conex->query($sql) === TRUE) {
//         echo "Usuario actualizado exitosamente.";
//     } else {
//         echo "Error al actualizar el usuario: " . $conex->error;
//     }
// }



$sql = "SELECT * FROM usuarios";
$resultado = $conex->query($sql);
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="editarUsuario.php">Editar</button>
                </td>';
                echo "</tr>";
                
                    
                          
                  
               
                
            }
      
            // <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal" name="editarUsuario"  ' . $fila['Id_usuarios'] . '">Editar</button>
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
         <!-- </tbody>
     </table>
</div> -->

<!-- Modal para Agregar Usuario -->
<!-- 
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
</div> -->

<!-- <div class="modal fade" id="editarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="agregarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarModalLabel">Modificar Usuario</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="nombres">Nombres:</label>
                        <input type="text" class="form-control" name="Nombres" id="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" class="form-control" name="Apellidos" id="Apellidos" >
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control"name="Fechanac" id="Fechanac" >
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input type="email" class="form-control" name="mail" id="mail">
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" name="password" id="Password" >
                    </div>
                    <div class="form-group">
                        <label for="password">Confirme contraseña:</label>
                        <input type="password" class="form-control" name="password2" id="Password2">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 offset-8">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div> -->


<!-- Modal de Edición de Usuario -->
<!-- <div class="modal fade" id="editarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarUsuarioModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              Formulario para editar el usuario -->
               <!-- <form method="post" action="submit"> -->
          <?php  
// Obtener el ID del usuario que se está editando (suponiendo que se pasa a través de la URL o algún otro método)
// $id_usuario = $_GET['Id_usuarios']; -->

// Realizar una consulta SQL para obtener los datos actuales del usuario por su ID
// $consulta= "SELECT * FROM usuarios WHERE ID=$id_usuario";
// $resultado = $conex->query($consulta);


// $sql = "SELECT * FROM usuarios WHERE ID=$id_usuario";
// // $resultado = $conex->query($sql);

// if ($resultado->num_rows > 0) {
//     // Mostrar los datos en el formulario
//     $fila = $resultado->fetch_assoc();
//     $nombre_actual = $fila['Nombres'];
// } else {
//     // No se encontraron datos del usuario
//     $nombre_actual = "";
 
// }


// ?>
<!-- <div class="modal fade" id="editarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"></div>

<form method="post" action="actualizar_usuario.php">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="
    
<?php 
// Modales para Editar Usuario y Confirmar Eliminación
// while ($fila = $resultado->fetch_assoc()) {
//     // Modal para Editar Usuario
//     echo '<div class="modal fade" id="editarUsuarioModal' . $fila['Id_usuarios'] . '" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel' . $fila['Id_usuarios'] . '" aria-hidden="true">';
//     echo '<div class="modal-dialog" role="document">';
//     echo '<div class="modal-content">';
//     echo '<div class="modal-header">';
//     echo '<h5 class="modal-title" id="editarModalLabel' . $fila['Id_usuarios'] . '">Editar Usuario</h5>';
//     echo '<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">';
//     echo '<span aria-hidden="true">&times;</span>';
//     echo '</button>';
//     echo '</div>';
//     echo '<div class="modal-body">';
//     echo '<form method="post" action="">';
//     echo '<div class="form-group">';
//     echo '<label for="nombres">Nombres:</label>';
//     echo '<input type="text" class="form-control" id="nombres" name="nombres" value="' . $fila['Nombres'] . '" required>';
//     echo '</div>';
//     echo '<div class="form-group">';
//     echo '<label for="apellidos">Apellidos:</label>';
//     echo '<input type="text" class="form-control" id="apellidos" name="apellidos" value="' . $fila['Apellidos'] . '" required>';
//     echo '</div>';
//     echo '<div class="form-group">';
//     echo '<label for="fecha_nacimiento">Fecha de Nacimiento:</label>';
//     echo '<input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="' . $fila['Fecha_de_nacimiento'] . '" required>';
//     echo '</div>';
//     echo '<div class="form-group">';
//     echo '<label for="correo">Correo:</label>';
//     echo '<input type="email" class="form-control" id="correo" name="correo" value="' . $fila['Correo'] . '" required>';
//     echo '</div>';
//     echo '<div class="form-group">';
//     echo '<label for="usuario">Usuario:</label>';
//     echo '<input type="text" class="form-control" id="usuario" name="usuario" value="' . $fila['Usuario'] . '" required>';
//     echo '</div>';
//     echo '<div class="form-group">';
//     echo '<label for="password">Contraseña:</label>';
//     echo '<input type="password" class="form-control" id="password" name="password" value="' . $fila['Password'] . '" required>';
//     echo '</div>';
//     echo '<input type="hidden" name="usuario_id" value="' . $fila['Id_usuarios'] . '">';
//     echo '<button type="submit" class="btn btn-primary">Guardar Cambios</button>';
//     echo '</form>';
//     echo '</div>';
//     echo '</div>';
//     echo '</div>';
//     echo '</div>';

//     // Modal para Confirmar Eliminación
//     echo '<div class="modal fade" id="eliminarModal1' . $fila['Id_usuarios'] . '" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel' . $fila['Id_usuarios'] . '" aria-hidden="true">';
//     echo '<div class="modal-dialog" role="document">';
//     echo '<div class="modal-content">';
//     echo '<div class="modal-header">';
//     echo '<h5 class="modal-title" id="eliminarModalLabel' . $fila['Id_usuarios'] . '">Confirmar Eliminación</h5>';
//     echo '<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">';
//     echo '<span aria-hidden="true">&times;</span>';
//     echo '</button>';
//     echo '</div>';
//     echo '<div class="modal-body">';
//     echo '¿Estás seguro de que quieres eliminar este usuario?';
//     echo '</div>';
//     echo '<div class="modal-footer">';
//     echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>';
//     echo '<a href="eliminarUsuario.php?id=' . $fila['Id_usuarios'] . '" class="btn btn-danger">Eliminar Usuario</a>';
//     echo '</div>';
//     echo '</div>';
//     echo '</div>';
//     echo '</div>';
// }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de usuarios</title>
    <!-- Agrega los enlaces a Bootstrap CSS y JS aquí -->
</head>


<!-- Modal para editar usuario -->


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


<!-- Agrega los enlaces a Bootstrap JS y jQuery aquí -->
</body>
</html>


</body>
</html>