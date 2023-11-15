<?php
 session_start();

 function mostrarBotonIniciarSesion() {
    if (isset($_SESSION['Usuario'])) {
        echo '<style>#iniciarSesionCalculadora { display: none !important; }</style>';
        echo '<style>#goCalculadora { display: block !important; }</style>';
        echo '<style>#cerrarSesionCalculadora { display: block !important; }</style>';
       
}

}


function mostrarInicioAdmin() {
    if (isset($_SESSION['Usuario']) && $_SESSION['Usuario'] == 'mariana') {
        echo '<style>#sesionAdministradores{ display: block !important; }</style>';

    }
}

mostrarBotonIniciarSesion();
mostrarInicioAdmin();

?>
       <header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="ecoNet.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</header>
<main>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <i class="fas fa-tree" style="font-size: 24px; margin-right: 10px;"></i>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Nosotros.php">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Staff.php">Staff</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Noticias.php">Noticias de interés</a>
                    </li>
                  
                    <li class="nav-item dropdown" id="goCalculadora" style="display: none;">
          <a class="nav-link dropdown-toggle" href="calculadoraMain.php"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Calculá tu huella de carbono
          </a>
          <ul class="dropdown-menu" id="goCalculadoraMenu" aria-labelledby="navbarDropdown"> 
             <li><a class="dropdown-item" href="calculadoraMain.php">Principal</a></li>
             <li><hr class="dropdown-divider"></li>
             <li><a class="dropdown-item" href="preguntasAgua.php">Agua</a></li>
             <li><a class="dropdown-item" href="preguntasAlimentacion.php">Alimentación</a></li>
            <li><a class="dropdown-item" href="preguntasCompras.php">Compras</a></li>
                       <li><a class="dropdown-item" href="preguntasReciclaje.php">Reciclaje</a></li>
            <li><a class="dropdown-item" href="preguntasTransporte.php">Transporte</a></li>
            <li><a class="dropdown-item" href="preguntasVestido.php">Vestido</a></li>
            <li><a class="dropdown-item" href="preguntasVivienda.php">Vivienda</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="pillsresultados.php">Resultados de tus consultas</a></li>
            
         
          </ul>
        </li>
                </ul>
                <div>
                    <a class="btn btn-success" id="iniciarSesionCalculadora" href="Login.php" role="button" style="color: rgb(5, 5, 5); margin-left: 3px; border: white;">Iniciar sesión</a>
                   
                </div>
                <form><a class="btn btn-warning" id="sesionAdministradores" href="administradores.php" style="display:none;">Administración</a> </form>
                <div><form method="post" action="">
                <button class="btn btn-danger ms-3" type="submit" name="cerrarSesion" id="cerrarSesionCalculadora" style="display:none;">Cerrar Sesión</button>
               
            </form></div>
           
                
            </div>
        </div>
    </nav>
</main>

<?php if(isset($_POST['cerrarSesion'])) {

    session_destroy();
    
    exit();
}
    ?>