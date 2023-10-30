<?php include("templates/header.php"); ?>
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
                <h2>Tu EcoCalc de <span id="mesActual"></span>
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

                            <h2>Vivienda</h2>
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <form method="post" action="">
                                            <label for="electricity">¿Cuánta electricidad consumís al mes?</label>
                                            <select class="form-control" id="electricity" name="electricity">
                                                <option value="Menos de 100 kWh">Menos de 100 kWh</option>
                                                <option value="100-200 kWh">100-200 kWh</option>
                                                <option value="200-300 kWh">200-300 kWh</option>
                                                <option value="300-400 kWh">300-400 kWh</option>
                                                <option value="Más de 400 kWh">Más de 400 kWh</option>
                                            </select><br>

                                            <label for="heating">¿Cuál es tu fuente de energía para la calefacción?</label>
                                            <select class="form-control" id="heating" name="heating">
                                                <option value="Gas natural">Gas natural</option>
                                                <option value="Garrafa">Garrafa</option>
                                                <option value="Electricidad">Electricidad</option>
                                                <option value="Leña">Leña</option>
                                                <option value="Otro">Otro</option>
                                            </select><br>

                                            <label for="cooking">¿Cuál es tu fuente de energía para la cocina?</label>
                                            <select class="form-control" id="cooking" name="cooking">
                                                <option value="Gas natural">Gas natural</option>
                                                <option value="Garrafa">Garrafa</option>
                                                <option value="Electricidad">Electricidad</option>
                                                <option value="Leña">Leña</option>
                                                <option value="Otro">Otro</option>
                                            </select><br>

                                            <label for="hotwater">¿Cuál es tu fuente de energía para el agua caliente?</label>
                                            <select class="form-control" id="hotwater" name="hotwater">
                                                <option value="Gas natural">Gas natural</option>
                                                <option value="Garrafa">Garrafa</option>
                                                <option value="Electricidad">Electricidad</option>
                                                <option value="Solar">Solar</option>
                                                <option value="Otro">Otro</option>
                                            </select><br>
                                            <label for="insulation">¿Tiene tu casa un buen aislamiento térmico?</label>
                                            <select class="form-control" id="insulation" name="insulation">
                                                <option value="No">No</option>
                                                <option value="Sí">Sí</option>
                                            </select><br>

                                            <label for="solarpanels">¿Tienes paneles solares en tu casa?</label>
                                            <select class="form-control" id="solarpanels" name="solarpanels">
                                                <option value="No">No</option>
                                                <option value="Sí">Sí</option>
                                            </select><br>

                                            <label for="energyefficient">¿Tenés electrodomésticos de alta eficiencia energética?</label>
                                            <select class="form-control" id="energyefficient" name="energyefficient">
                                                <option value="No">No</option>
                                                <option value="Sí">Sí</option>
                                            </select><br>
                                    </div>
                                </div>
                            </div>
                        </div>

</html>

</section>
<br>

</body>

<div class="text-center pt-1 mb-5 pb-1">

    <button type="submit" name="Calcular6" class="btn btn-primary">Calcular</button>
</div>

<?php

function calcularHuellaCarbonoVivienda($consumoElectricidad, $fuenteCalefaccion, $fuenteCocina, $fuenteAguaCaliente, $aislamiento, $panelesSolares, $electrodomesticosEficientes)
{
    $emisionesElectricidad = 0;
    $emisionesCalefaccion = 0;
    $emisionesCocina = 0;
    $emisionesAguaCaliente = 0;
    $puntosAislamiento = 0;
    $puntosPanelesSolares = 0;
    $puntosElectrodomesticos = 0;

    switch ($consumoElectricidad) {
        case "100-200 kWh":
            $emisionesElectricidad = 1;
            break;
        case "200-300 kWh":
            $emisionesElectricidad = 2;
            break;
        case "300-400 kWh":
            $emisionesElectricidad = 3;
            break;
        case "Más de 400 kWh":
            $emisionesElectricidad = 4;
            break;
    }

    switch ($fuenteCalefaccion) {
        case "Electricidad":
            $emisionesCalefaccion = 3;
            break;
        case "Garrafa":
            $emisionesCalefaccion = 2;
            break;
        case "Leña":
            $emisionesCalefaccion = 1;
            break;
        case "Otro":
            $emisionesCalefaccion = 2;
    }


    switch ($fuenteCocina) {
        case "Electricidad":
            $emisionesCocina = 2;
            break;
        case "Garrafa":
            $emisionesCocina = 1;
            break;
        case "Leña":
            $emisionesCocina = 0.5;
            break;
        case "Otro":
            $emisionesCocina = 1;
            break;
    }


    switch ($fuenteAguaCaliente) {
        case "Electricidad":
            $emisionesAguaCaliente = 2;
            break;
        case "Solar":
            $emisionesAguaCaliente = 0.1;
            break;
        case "Otro":
            $emisionesAguaCaliente = 1;
            break;
    }

    if ($aislamiento == "Sí") {
        $puntosAislamiento = 1;
    }


    if ($panelesSolares == "Sí") {
        $puntosPanelesSolares = 1;
    }

    if ($electrodomesticosEficientes == "Sí") {
        $puntosElectrodomesticos = 1;
    }

    $huellaCarbonoTotal = $emisionesElectricidad + $emisionesCalefaccion + $emisionesCocina + $emisionesAguaCaliente - $puntosAislamiento - $puntosPanelesSolares - $puntosElectrodomesticos;

    $consejos = [];

    if ($huellaCarbonoTotal >= 5) {
        $consejos[] = "Considera cambiar a electrodomésticos de alta eficiencia energética para reducir el consumo de electricidad.";
    }

    if ($huellaCarbonoTotal >= 7) {
        $consejos[] = "Instala paneles solares para generar tu propia electricidad a partir de fuentes renovables.";
    }

    if ($huellaCarbonoTotal >= 9) {
        $consejos[] = "Mejora el aislamiento de tu hogar para reducir la necesidad de calefacción y aire acondicionado.";
    }
    if ($huellaCarbonoTotal < 5) {
        $consejos[] = "Felicitaciones, segui asi!";
    }
    return [
        "huellaCarbono" => $huellaCarbonoTotal,
        "consejos" => $consejos
    ];
}

if (isset($_POST['Calcular6'])) {
    $consumoElectricidad = $_POST['electricity'];
    $fuenteCalefaccion = $_POST['heating'];
    $fuenteCocina = $_POST['cooking'];
    $fuenteAguaCaliente = $_POST['hotwater'];
    $aislamiento = $_POST['insulation'];
    $panelesSolares = $_POST['solarpanels'];
    $electrodomesticosEficientes = $_POST['energyefficient'];
    $resultadoVivienda = calcularHuellaCarbonoVivienda($consumoElectricidad, $fuenteCalefaccion, $fuenteCocina, $fuenteAguaCaliente, $aislamiento, $panelesSolares, $electrodomesticosEficientes);

    echo '<div class="alert alert-info" role="alert">';
    echo "Tu huella de carbono relacionada con la vivienda es: " . $resultadoVivienda["huellaCarbono"] . " kg CO2eq.";
    echo '</div>';

    echo '<div class="alert alert-light" role="alert"><h3 >Consejos para reducir tu huella de carbono en la vivienda:</h3></div>';
    foreach ($resultadoVivienda["consejos"] as $consejo) {
        echo '<div class="alert alert-light" role="alert">';
        echo '<p>' . $consejo . '</p>';
        echo '</div>';
    }

    if ($resultadoVivienda["huellaCarbono"] > 0) {
        echo '<a id="btn-continuar" class="btn btn-info offset-10 mb-5" href="index.php" role="button">Finalizar</a>';
    }
}

?>

<?php
include("controladorPreguntasVivienda.php");
include("templates/footer.php"); ?>
</form>

</html>