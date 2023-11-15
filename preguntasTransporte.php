<?php include("templates/header.php");
include("conexion.php"); ?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<header>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="calculadoraMain.css">

</header>

<head>

    <title id="title">
        EcoNet - Preguntas
    </title>

</head>

<body>
    <div id="page-wrapper">
        <div class="container">
            <section>
                <p id="inicioPreguntas" class="secciones">
                <h2><?php echo $_SESSION['Usuario'];?></p>Tu EcoCalc de <span id="mesActual"> </span>
                    <script>
                        function obtenerMesActual() {
                            const meses = [
                                "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                                "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
                            ];
                            const fecha = new Date();
                            return meses[fecha.getMonth()];
                        }


                        document.getElementById("mesActual").textContent = obtenerMesActual();
                    </script>
                </h2>
                </p><br>
                <div class="logo">

                </div>
                <div class="cuerpoPag">

                    <body>

                        <div class="container">

                            <h2>Transporte</h2>
                            <div class="row">
                                <div class="col-8">

                                    <div class="form-group">
                                        <form method="post" action="">
                                            <label for="car">¿Cuántos kilómetros conduces al día?</label>
                                            <select class="form-control" id="car" name="car">
                                                <option value="0">0</option>
                                                <option value="Menos de 10 km">Menos de 10 km</option>
                                                <option value="10-20 km">10-20 km</option>
                                                <option value="20-30 km">20-30 km</option>
                                                <option value="Más de 30 km">Más de 30 km</option>
                                            </select><br>

                                            <label for="public">¿Cuántas veces a la semana usas el transporte público?</label>
                                            <select class="form-control" id="public" name="public">
                                                <option value="Nunca">Nunca</option>
                                                <option value="1-2 veces">1-2 veces</option>
                                                <option value="3-4 veces">3-4 veces</option>
                                                <option value="5-6 veces">5-6 veces</option>
                                                <option value="Todos los días">Todos los días</option>
                                            </select><br>
                                            <label for="motorcycle">¿Cuántas veces a la semana utilizas la moto?</label>
                                            <select class="form-control" id="motorcycle" name="motorcycle">
                                                <option value="Nunca">Nunca</option>
                                                <option value="1-2 veces">1-2 veces</option>
                                                <option value="3-4 veces">3-4 veces</option>
                                                <option value="5-6 veces">5-6 veces</option>
                                                <option value="Todos los días">Todos los días</option>
                                            </select><br>

                                            <label for="carpooling">¿Cuántas veces a la semana utilizás el carpooling?</label>
                                            <select class="form-control" id="carpooling" name="carpooling">
                                                <option value="Nunca">Nunca</option>
                                                <option value="1-2 veces">1-2 veces</option>
                                                <option value="3-4 veces">3-4 veces</option>
                                                <option value="5-6 veces">5-6 veces</option>
                                                <option value="Todos los días">Todos los días</option>
                                            </select><br>

                                            <label for="electriccar">¿Tenés un coche eléctrico?</label>
                                            <select class="form-control" id="electriccar" name="electriccar">
                                                <option value="No">No</option>
                                                <option value="Si">Sí</option>
                                            </select><br>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </body>

</html>
</section>
<br>

</body>

<div class="text-center pt-1 mb-5 pb-1">
<a class="btn btn-danger" href="index.php">Volver a Inicio</a>
    <button type="submit" name="Calcular5" class="btn btn-primary">Calcular</button>
</div>

<?php
function calcularHuellaCarbonoTransporte($kilometrosDiarios, $transportePublico, $moto, $carpooling, $cocheElectrico)
{
    $emisionesKilometros = 0;
    $emisionesTransportePublico = 0;
    $emisionesMoto = 0;
    $emisionesCarpooling = 0;
    $emisionesCocheElectrico = 0;

    switch ($kilometrosDiarios) {
        case "Menos de 10 km":
            $emisionesKilometros = 1;
            break;
        case "10-20 km":
            $emisionesKilometros = 2;
            break;
        case "20-30 km":
            $emisionesKilometros = 3;
            break;
        case "Más de 30 km":
            $emisionesKilometros = 4;
            break;
    }

    switch ($transportePublico) {
        case "1-2 veces":
            $emisionesTransportePublico = 1;
            break;
        case "3-4 veces":
            $emisionesTransportePublico = 2;
            break;
        case "5-6 veces":
            $emisionesTransportePublico = 3;
            break;
        case "Todos los días":
            $emisionesTransportePublico = 4;
            break;
    }


    switch ($moto) {
        case "1-2 veces":
            $emisionesMoto = 1;
            break;
        case "3-4 veces":
            $emisionesMoto = 2;
            break;
        case "5-6 veces":
            $emisionesMoto = 3;
            break;
        case "Todos los días":
            $emisionesMoto = 4;
            break;
    }


    switch ($carpooling) {
        case "1-2 veces":
            $emisionesCarpooling = 4;
            break;
        case "3-4 veces":
            $emisionesCarpooling = 3;
            break;
        case "5-6 veces":
            $emisionesCarpooling = 2;
            break;
        case "Todos los días":
            $emisionesCarpooling = 1;
            break;
    }


    if ($cocheElectrico === "Sí") {
        $emisionesCocheElectrico = 0.1;
    }

    $huellaCarbonoTotalTransporte = $emisionesKilometros + $emisionesTransportePublico + $emisionesMoto + $emisionesCarpooling + $emisionesCocheElectrico;

    $consejos = [];

    if ($huellaCarbonoTotalTransporte >= 5) {
        $consejos[] = "Considera reducir la cantidad de kilómetros que conduces diariamente.";
    }

    if ($huellaCarbonoTotalTransporte >= 7) {
        $consejos[] = "Opta por el transporte público o el carpooling más frecuentemente para reducir las emisiones.";
    }

    if ($huellaCarbonoTotalTransporte >= 9) {
        $consejos[] = "Si es posible, utiliza una bicicleta o camina en lugar de conducir para trayectos cortos.";
    }
    if ($huellaCarbonoTotalTransporte < 5) {
        $consejos[] = "Felicitaciones, segui asi!";
    }

    return [
        "huellaCarbono" => $huellaCarbonoTotalTransporte,
        "consejos" => $consejos
    ];
}

if (isset($_POST['Calcular5'])) {
    $kilometrosDiarios = $_POST['car'];
    $transportePublico = $_POST['public'];
    $moto = $_POST['motorcycle'];
    $carpooling = $_POST['carpooling'];
    $cocheElectrico = $_POST['electriccar'];


    $resultadoTransporte = calcularHuellaCarbonoTransporte($kilometrosDiarios, $transportePublico, $moto, $carpooling, $cocheElectrico);
    echo '<div class="alert alert-info" role="alert">';
    echo "Tu huella de carbono relacionada con el transporte es: " . $resultadoTransporte["huellaCarbono"] . " kg CO2eq.";
    echo '</div>';

    echo '<div class="alert alert-light" role="alert"><h3 >Consejos para reducir tu huella de carbono en el transporte:</h3></div>';
    foreach ($resultadoTransporte["consejos"] as $consejo) {
        echo '<div class="alert alert-light" role="alert">';
        echo '<p>' . $consejo . '</p>';
        echo '</div>';
    }

    if ($resultadoTransporte["huellaCarbono"] > -10) {
        echo '<a id="btn-continuar" class="btn btn-info offset-10 mb-5" href="preguntasVestido.php" role="button">Continuar</a>';
    }
}

if (isset($_POST['Calcular5'])) {

    $usuario = $_SESSION['Usuario'];
    $resTransporte = $resultadoTransporte["huellaCarbono"];
    
    $consulta = "INSERT INTO Transporte (Usuario, Transporte) 
    VALUES ('$usuario', '$resTransporte')";
    
    $resultado = mysqli_query($conex, $consulta);
    
    }
?>

<?php

include("templates/footer.php"); ?>
</form>

</html>