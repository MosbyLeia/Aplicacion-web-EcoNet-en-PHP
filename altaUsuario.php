<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de usuario</title>
</head>
<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="altaUsuario.css">
    <link rel="stylesheet" type="text/css" href="ecoNet.css">
</header>


<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card-body p-md-5 text-black">
                    <h3 class="mb-5 text-uppercase">Registro de usuario</h3>
                    <form action="" method="post" action="">
                        <label class="form-label" for="Nombre">Nombres</label>
                        <input type="text" name="Nombres" id="Nombre" class="form-control" />
                        <div class="mb-3">
                            <label class="form-label" for="Apellidos">Apellidos</label>
                            <input type="text" name="Apellidos" id="Apellidos" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="Fechanac">Fecha de nacimiento</label>
                            <input type="date" name="Fechanac" id="Fechanac" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="mail">Correo electrónico</label>
                            <input type="email" name="mail" id="mail" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="form3Example97">Nombre de usuario</label>
                            <input type="text" name="username" id="username" class="form-control form-control-lg" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="Password">Contraseña</label>
                            <div class="input-group">
                                <input type="password" name="password" id="Password" class="form-control" />
                                <button type="button" id="togglePasswordBtn" class="btn btn-outline-secondary">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="Password2">Confirme contraseña</label>
                            <div class="input-group">
                                <input type="password" name="password2" id="Password2" class="form-control" />
                                <button type="button" id="togglePasswordBtn2" class="btn btn-outline-secondary">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>


                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-secondary" onclick="history.go(-1)">Cancelar</button>
                            <button type="submit" name="registrarse" class="btn btn-success">Registrarse</button>
                        </div>
                </div>
            </div>

        </div>

        <script>
            var togglePasswordBtn = document.getElementById("togglePasswordBtn");
            var togglePasswordBtn2 = document.getElementById("togglePasswordBtn2");
            var passwordField = document.getElementById("Password");
            var passwordField2 = document.getElementById("Password2");

            togglePasswordBtn.addEventListener("click", function() {
                passwordField.type = passwordField.type === "password" ? "text" : "password";
                togglePasswordBtn.innerHTML = passwordField.type === "password" ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });

            togglePasswordBtn2.addEventListener("click", function() {
                passwordField2.type = passwordField2.type === "password" ? "text" : "password";
                togglePasswordBtn2.innerHTML = passwordField2.type === "password" ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });
        </script>

        <?php
        include("registrar.php");


        ?>

    </div>

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </form>

    </div>
    </div>

</html>