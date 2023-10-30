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

                    <div class="container">

                        <h2>Vestido</h2>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <form method="post" action="">
                                        <label for="clothes">¿Cuánta ropa compraste o vas a comprar este mes?</label>
                                        <select class="form-control" id="clothes" name="clothes">
                                            <option value="Menos de 10 prendas">Menos de 10 prendas</option>
                                            <option value="10-20 prendas">10-20 prendas</option>
                                            <option value="20-30 prendas">20-30 prendas</option>
                                            <option value="30-40 prendas">30-40 prendas</option>
                                            <option value="Más de 40 prendas">Más de 40 prendas</option>
                                        </select><br>

                                        <label for="shoes">¿Cuántos pares de zapatos compraste o vas a comprar este mes?</label>
                                        <select class="form-control" id="shoes" name="shoes">
                                            <option value="0">Ninguno</option>
                                            <option value="1-2 pares">1-2 pares</option>
                                            <option value="3-4 pares">3-4 pares</option>
                                            <option value="5-6 pares">5-6 pares</option>
                                            <option value="Más de 6 pares">Más de 6 pares</option>
                                        </select><br>

                                        <label for="accessories">¿Cuántos accesorios compraste o vas a comprar este mes?</label>
                                        <select class="form-control" id="accessories" name="accessories">
                                            <option value="0">Ninguno</option>
                                            <option value="1-2 accesorios">1-2 accesorios</option>
                                            <option value="2">3-4 accesorios</option>
                                            <option value="5-6 accesorios">5-6 accesorios</option>
                                            <option value="Más de 6 accesorios">Más de 6 accesorios</option>
                                        </select><br>
                                </div>
                            </div>
                        </div>
                    </div>


</body>
</section>
<br>


<div class="text-center pt-1 mb-5 pb-1">

    <button type="submit" name="Calcular6" class="btn btn-primary">Calcular</button>
</div>

<?php
function calcularHuellaCarbonoRopa($cantidadRopa, $cantidadZapatos, $cantidadAccesorios)
{
    $emisionesRopa = 0;
    $emisionesZapatos = 0;
    $emisionesAccesorios = 0;

    switch ($cantidadRopa) {
        case "10-20 prendas":
            $emisionesRopa = 1;
            break;
        case "20-30 prendas":
            $emisionesRopa = 2;
            break;
        case "30-40 prendas":
            $emisionesRopa = 3;
            break;
        case "Más de 40 prendas":
            $emisionesRopa = 4;
            break;
    }

    switch ($cantidadZapatos) {
        case "1-2 pares":
            $emisionesZapatos = 1;
            break;
        case "3-4 pares":
            $emisionesZapatos = 2;
            break;
        case "5-6 pares":
            $emisionesZapatos = 3;
            break;
        case "Más de 6 pares":
            $emisionesZapatos = 4;
            break;
    }

    switch ($cantidadAccesorios) {
        case "1-2 accesorios":
            $emisionesAccesorios = 1;
            break;
        case "3-4 accesorios":
            $emisionesAccesorios = 2;
            break;
        case "5-6 accesorios":
            $emisionesAccesorios = 3;
            break;
        case "Más de 6 accesorios":
            $emisionesAccesorios = 4;
            break;
    }

    $huellaCarbonoTotal = $emisionesRopa + $emisionesZapatos + $emisionesAccesorios;

    $consejos = [];

    if ($huellaCarbonoTotal >= 5) {
        $consejos[] = "Considera comprar ropa de segunda mano o intercambiar prendas para reducir la demanda de productos nuevos.";
    }

    if ($huellaCarbonoTotal >= 7) {
        $consejos[] = "Opta por marcas y productos que sean sostenibles y ecológicos.";
    }

    if ($huellaCarbonoTotal >= 9) {
        $consejos[] = "Piensa en la calidad en lugar de la cantidad. Invierte en prendas duraderas y atemporales.";
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
    $cantidadRopa = $_POST['clothes'];
    $cantidadZapatos = $_POST['shoes'];
    $cantidadAccesorios = $_POST['accessories'];
    $resultadoRopa = calcularHuellaCarbonoRopa($cantidadRopa, $cantidadZapatos, $cantidadAccesorios);

    echo '<div class="alert alert-info" role="alert">';
    echo "Tu huella de carbono relacionada con las compras de ropa es: " . $resultadoRopa["huellaCarbono"] . " kg CO2eq.";
    echo '</div>';

    echo '<div class="alert alert-light" role="alert"><h3 >Consejos para reducir tu huella de carbono en las compras de ropa:</h3></div>';
    foreach ($resultadoRopa["consejos"] as $consejo) {
        echo '<div class="alert alert-light" role="alert">';
        echo '<p>' . $consejo . '</p>';
        echo '</div>';
    }

    if ($resultadoRopa["huellaCarbono"] > 0) {
        echo '<a id="btn-continuar" class="btn btn-info offset-10 mb-5" href="preguntasVivienda.php" role="button">Continuar</a>';
    }
}
?>

<?php
include("controladorPreguntasVestido.php");
include("templates/footer.php"); ?>
</form>

</html>