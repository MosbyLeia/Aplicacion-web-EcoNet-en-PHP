<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="loginEcoNet.css">
</header>
<body>
    
<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="logoEcoNet.jpg" style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">Somos EcoNet</h4>
                                </div>

                               <!-- <form action="" method="post" enctype=multipart/form-data>  -->
                                 <form action="" method="post" action=""> <h5>Ingrese a su cuenta</h5> 

                                    <div class="form-outline mb-4">
                                    <div class="row"> 
                                        <div class="col-8">
                                    <label class="form-label"  for="form2Example11">Usuario</label>
                                        <input type="text" name="Usuario" id="form2Example11" class="form-control"
                                            placeholder="Ingrese su nombre de usuario" />
                                    
                                    </div>
                                    </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                    <label class="form-label" id="Password"  for="form2Example22">Contraseña</label>
                                        <div class="row"> 
                                        <div class="col">  <input type="password" name="Password" id="PasswordLogin" class="form-control"  placeholder="Ingrese su contraseña" /></div>
                                        
                                        <div class="col"><button type="button" id="togglePasswordBtn" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></button></div>
                                        
                                    </div>  
                                </div>

                            
<script>
    var passwordField = document.getElementById("PasswordLogin");
    var togglePasswordBtn = document.getElementById("togglePasswordBtn");

    togglePasswordBtn.addEventListener("click", function() {
        if (passwordField.type === "password") {
            passwordField.type = "text";
            togglePasswordBtn.innerHTML = '<i class="fas fa-lock"></i>'; 
        } else {
            passwordField.type = "password";
            togglePasswordBtn.innerHTML = '<i class="fas fa-eye"></i>'; 
        }
    });
</script>

<?php
include("conexion.php");
include("controlador.php");

?>

                               
                                    <div class="text-center pt-1 mb-5 pb-1"> 
                                        <input name="btn-ingresar" class="btn btn-primary gradient-custom-2 mb-" type="submit" value="Iniciar sesión">
                                                                       <a class="text-muted" href="#!">¿Olvidaste tu contraseña?</a>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">¿No tenés cuenta?</p>
                                        <a class="btn btn-success" href="altaUsuario.php" role="button">Crear cuenta
                                        </a>
                                       
                                    </div>
                                    <button type="button" class="btn btn-secondary" onclick="history.go(-1)">Cancelar</button>

                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">Somos más que una empresa</h4>
                                <p class="small mb-0" style="text-align: justify;">En EcoNet, nos enorgullece ser una empresa comprometida con la
                                    preservación del medio ambiente y la promoción de prácticas ecológicas. Nuestra
                                    misión es establecer un vínculo armonioso entre las personas y la naturaleza,
                                    trabajando juntos para crear un mundo más verde y sostenible.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>