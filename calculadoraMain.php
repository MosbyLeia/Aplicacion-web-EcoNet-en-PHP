
<?php
 session_start();

function mostrarBotonIniciarSesion() {
    if (isset($_SESSION['Usuario']) ) {
   
      
        echo '<style>#iniciarSesionCalculadora { display: none !important; }</style>';
        echo '<style>#goCalculadora { display: block !important; }</style>';
        echo '<style>#cerrarSesionCalculadora{ display: block !important; }</style>';

        
    } 
    
}

mostrarBotonIniciarSesion();

// Verificar si el usuario está conectado
if (isset($_SESSION['Usuario']) ){
    // El usuario está conectado
    $nombre111 = $_SESSION['Usuario'];
 
} else {
    // El usuario no está conectado, redirigir a la página de inicio de sesión
  echo "error";
  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    
}

 if(isset($_POST['cerrarSesion'])) {
    // Destruir todas las sesiones
    session_destroy();
    // Redirigir al usuario a la página de inicio o a donde desees
    header("Location: index.php");
    exit();
}
    

 include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

       <header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="ecoNet.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="ecoNet.css"></header>
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
           
                    <li class="nav-item dropdown" id="goCalculadora">
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
                <div><a class="btn btn-success" id="iniciarSesionCalculadora" href="Login.php" role="button" style="color: rgb(5, 5, 5); margin-left: 3px; border: white;">Iniciar sesión</a></div>
                <div><form method="post" action="">
                <button class="btn btn-danger" type="submit" name="cerrarSesion" id="cerrarSesionCalculadora" >Cerrar Sesión</button>
            </form></div>
                
            </div>
        </div>
    </nav>
</main>
<head>
    <link rel="stylesheet" href="calculadoraMain.css">
    <title id="title">
        EcoNet - Calculá tu huella de carbono
    </title>
</head>


<div id="page-wrapper">
    <div class="container">
        <p id="inicio" class="secciones">
            <?php echo 'Bienvenid@ a EcoCalc, '  . $nombre111;?></p>
            <p id="inicio" class="secciones">EcoCalc es la calculadora de EcoNet: Tu Herramienta Personal para Medir la Huella de Carbono</p><br>
        <div class="logo">

        </div>
        <div class="cuerpoPag">



            <p>En EcoNet, estamos comprometidos con un futuro sostenible y verde. Estamos encantados de que hayas elegido unirte a nosotros en el viaje hacia un mundo más ecológico. Con nuestra aplicación, podés calcular fácilmente tu huella de carbono personal y descubrir cómo tus elecciones diarias impactan en nuestro planeta.</p>

            <h2>¿Por qué es importante calcular tu huella de carbono?</h2>
            <p>Calcular tu huella de carbono es el primer paso para entender cómo tu estilo de vida afecta al medio ambiente. Desde lo que comes hasta cómo te mueves por el mundo, cada decisión cuenta. EcoCalc te proporcionará información valiosa sobre tus emisiones de carbono y te ofrecerá sugerencias prácticas para reducir tu impacto ambiental.</p>

            <h2>Cómo Funciona:</h2>
            <ul>
                <li><strong>Ingresá Tus Datos:</strong></li> Proporcionanos información sobre tu estilo de vida, hábitos de consumo y comportamientos diarios. Cuantos más detalles nos des, más precisa será tu evaluación.
                <li><strong>Obtené Tu Evaluación:</strong> </li>Una vez ingresados tus datos, EcoCalc calculará tu huella de carbono y te mostrará un desglose detallado de tus emisiones.
                <li><strong>Descubrí Maneras de Reducir:</strong> </li>Te proporcionaremos consejos personalizados y prácticos para reducir tu huella de carbono. Pequeños cambios en tu rutina diaria pueden marcar una gran diferencia.
                <li><strong>Unite a la Comunidad:</strong> </li>Compartí tus logros, descubrí historias inspiradoras y sumate a una comunidad apasionada de personas que están comprometidas con un estilo de vida ecológico.
            </ul>

            <p>Listo para comenzar tu viaje hacia un futuro más verde? ¡Vamos a calcular juntos y hacer del mundo un lugar mejor para todos!</p>

            <p>¡Gracias por ser parte del movimiento EcoNet!</p>

            <p>Atentamente,</p>
            <p>El Equipo de EcoNet</p>

            <div class="container">
                <h3>Instrucciones para Calcular tu Huella de Carbono:</h3>
                <ol>
                    <li><b>Electricidad (kWh por Mes):</b> </li>
                    <p>Registra tu consumo eléctrico mensual en kilovatios-hora (kWh). Puedes encontrar esta información en tus facturas de electricidad.</li>
                    </p>
                    <li><strong>Transporte (km por Mes):</strong></li>
                    <p>Ingresa la cantidad de kilómetros que recorres en tus viajes mensuales. Esto incluye el kilometraje de tu automóvil, transporte público u otros medios de transporte.</p>
                    <li><strong>Residuos Generados (kg por Mes):</strong> </li>
                    <p>Indica la cantidad de residuos que generas mensualmente en kilogramos. Esto incluye basura, reciclaje y residuos orgánicos. Puedes estimar este valor basándote en la cantidad de bolsas de basura que tiras cada mes.</li>
                    </p>
                    <li><strong>Consumo de Carne (kg por Mes):</strong></li>
                    <p> Si consumes carne, registra la cantidad de carne que consumes mensualmente en kilogramos. Esto incluye carne de res, pollo, cerdo, etc.</li>
                    </p>
                    <li><strong>Reciclaje:</strong></li>
                    <p> Si separas tus residuos para reciclar, asegúrate de incluir esa cantidad en los "Residuos Generados". Si no lo haces, estos residuos se considerarán como basura regular.</li>
                    </p>
                    <li><strong>Compras Sostenibles:</strong> </li>
                    <p>Considera tus elecciones de compra. Productos como electrodomésticos eficientes, bombillas LED y productos locales pueden reducir tu huella de carbono.</li>
                    </p>
                    <li><strong>Viajes y Vacaciones:</strong> </li>
                    <p>Incluye cualquier viaje o actividad vacacional que hayas realizado durante el mes. Esto puede afectar tu huella de carbono debido al transporte y al consumo durante tus viajes.</li>
                    </p>
                    <li><strong>Conservación de Agua y Energía:</strong></li>
                    <p>Considera tus hábitos de uso del agua y la energía. La conservación del agua y el uso eficiente de la energía también tienen un impacto en tu huella de carbono.</li>
                    </p>
                    <li><strong>Recuerda Revisar tus Facturas:</strong></li>
                    <p>Para obtener datos precisos sobre electricidad y gas, es útil revisar tus facturas mensuales. Muchas facturas proporcionan información detallada sobre tu consumo.</li>
                    </p>
                </ol>
            </div>
        </div>
        <br>
        <div class="text-center pt-1 mb-5 pb-1">
            <a id="btn-comenzar" class="btn btn-info" href="preguntasAgua.php" role="button" value="¡Comenzá ahora!">¡Comenzá ahora!</a>

        </div>
        </body>


        <?php include("templates/footer.php");?>

</html>