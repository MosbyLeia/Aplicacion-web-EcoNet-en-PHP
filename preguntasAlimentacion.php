<?php include("templates/header.php");
 include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
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

                        <h2>Alimentación</h2>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <form method="post" action="">
                                        <label for="meat">¿Cuántas veces a la semana consumís carne?</label>
                                        <select class="form-control" id="meat" name="meat">
                                            <option value="Nunca">Nunca</option>
                                            <option value="1-2 veces">1-2 veces</option>
                                            <option value="3-4 veces">3-4 veces</option>
                                            <option value="5-6 veces">5-6 veces</option>
                                            <option value="Todos los días">Todos los días</option>
                                        </select><br>

                                        <label for="fish">Cuántas veces a la semana consumís pescado?</label>
                                        <select class="form-control" id="fish" name="fish">
                                            <option value="Nunca">Nunca</option>
                                            <option value="1-2 veces">1-2 veces</option>
                                            <option value="3-4 veces">3-4 veces</option>
                                            <option value="5-6 veces">5-6 veces</option>
                                            <option value="Todos los días">Todos los días</option>
                                        </select><br>

                                        <label for="dairy">¿Cuántas veces a la semana consumís lácteos?</label>
                                        <select class="form-control" id="dairy" name="dairy">
                                            <option value="Nunca">Nunca</option>
                                            <option value="1-2 veces">1-2 veces</option>
                                            <option value="3-4 veces">3-4 veces</option>
                                            <option value="5-6 veces">5-6 veces</option>
                                            <option value="Todos los días">Todos los días</option>
                                        </select><br>

                                        <label for="processed">¿Cuántas veces a la semana consumís alimentos procesados?</label>
                                        <select class="form-control" id="processed" name="processed">
                                            <option value="Nunca">Nunca</option>
                                            <option value="1-2 veces">1-2 veces</option>
                                            <option value="3-4 veces">3-4 veces</option>
                                            <option value="5-6 veces">5-6 veces</option>
                                            <option value="Todos los días">Todos los días</option>
                                        </select><br>

                                        <label for="organic">¿Cuántas veces a la semana consumís alimentos orgánicos?</label>
                                        <select class="form-control" id="organic" name="organic">
                                            <option value="Nunca">Nunca</option>
                                            <option value="1-2 veces">1-2 veces</option>
                                            <option value="3-4 veces">3-4 veces</option>
                                            <option value="5-6 veces">5-6 veces</option>
                                            <option value="Todos los días">Todos los días</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                </div>
            </section>


</body>
<div class="text-center pt-1 mb-5 pb-1">
<a class="btn btn-danger" href="index.php">Volver a Inicio</a>

    <button type="submit" name="Calcular2" class="btn btn-primary">Calcular</button>
</div>

<?php

function calcularHuellaCarbonoAlimentacion($consumoCarne, $consumoPescado, $consumoLacteos, $consumoProcesados, $consumoOrganicos)
{
    $emisionesCarne = 0;
    $emisionesPescado = 0;
    $emisionesLacteos = 0;
    $emisionesProcesados = 0;
    $emisionesOrganicos = 0;


    switch ($consumoCarne) {
        case "Nunca":
            $emisionesCarne = 0;
            break;
        case "1-2 veces":
            $emisionesCarne = 2;
            break;
        case "3-4 veces":
            $emisionesCarne = 4;
            break;
        case "5-6 veces":
            $emisionesCarne = 6;
            break;
        case "Todos los días":
            $emisionesCarne = 8;
            break;
    }

    switch ($consumoPescado) {
        case "Nunca":
            $emisionesPescado = 0;
            break;
        case "1-2 veces":
            $emisionesPescado = 2;
            break;
        case "3-4 veces":
            $emisionesPescado = 4;
            break;
        case "5-6 veces":
            $emisionesPescado = 6;
            break;
        case "Todos los días":
            $emisionesPescado = 8;
            break;
    }

    switch ($consumoLacteos) {
        case "Nunca":
            $emisionesLacteos = 0;
            break;
        case "1-2 veces":
            $emisionesLacteos = 2;
            break;
        case "3-4 veces":
            $emisionesLacteos = 4;
            break;
        case "5-6 veces":
            $emisionesLacteos = 6;
            break;
        case "Todos los días":
            $emisionesLacteos = 8;
            break;
    }

    switch ($consumoProcesados) {
        case "Nunca":
            $emisionesProcesados = 0;
            break;
        case "1-2 veces":
            $emisionesProcesados = 2;
            break;
        case "3-4 veces":
            $emisionesProcesados = 4;
            break;
        case "5-6 veces":
            $emisionesProcesados = 6;
            break;
        case "Todos los días":
            $emisionesProcesados = 8;
            break;
    }

    switch ($consumoOrganicos) {
        case "Nunca":
            $emisionesOrganicos = 8;
            break;
        case "1-2 veces":
            $emisionesOrganicos = 6;
            break;
        case "3-4 veces":
            $emisionesOrganicos = 4;
            break;
        case "5-6 veces":
            $emisionesOrganicos = 2;
            break;
        case "Todos los días":
            $emisionesOrganicos = 0;
            break;
    }
    $huellaCarbonoTotalAlimentacion = $emisionesCarne + $emisionesPescado + $emisionesLacteos + $emisionesProcesados + $emisionesOrganicos;

    $consejos = [];

    if ($huellaCarbonoTotalAlimentacion >= 10) {
        $consejos[] = "Considera reducir el consumo de carne y pescado para disminuir la huella de carbono en tu dieta.";
    }

    if ($huellaCarbonoTotalAlimentacion >= 15) {
        $consejos[] = "Opta por alimentos orgánicos y locales para apoyar prácticas agrícolas sostenibles.";
    }
    if ($huellaCarbonoTotalAlimentacion < 10) {
        $consejos[] = "Felicitaciones, segui asi!";
    }
    return [
        "huellaCarbono" => $huellaCarbonoTotalAlimentacion,
        "consejos" => $consejos
    ];
}

if (isset($_POST['Calcular2'])) {
    $consumoCarne = $_POST['meat'];
    $consumoPescado = $_POST['fish'];
    $consumoLacteos = $_POST['dairy'];
    $consumoProcesados = $_POST['processed'];
    $consumoOrganicos = $_POST['organic'];

    $resultadoAlimentacion = calcularHuellaCarbonoAlimentacion($consumoCarne, $consumoPescado, $consumoLacteos, $consumoProcesados, $consumoOrganicos);
   
    echo '<div class="alert alert-info" role="alert">';
    echo '<label name="resultadoAlimentacion">Tu huella de carbono respecto a la alimentación es: ' . $resultadoAlimentacion["huellaCarbono"] . ' kg CO2eq.';
    echo '</div>';

    echo '<div class="alert alert-light" role="alert"><h3>Consejos para reducir tu huella de carbono en la alimentación:</h3></div>';
    foreach ($resultadoAlimentacion["consejos"] as $consejo) {
        echo '<div class="alert alert-light" role="alert">';
        echo '<p>' . $consejo . '</p>';
        echo '</div>';
    }

    if ($resultadoAlimentacion["huellaCarbono"] > -10) {
        
        echo '<a id="continuar2" class="btn btn-info offset-10 mb-5" href="preguntasCompras.php" role="button">Continuar</a>';
    }
}

if (isset($_POST['Calcular2'])) {

    $usuario = $_SESSION['Usuario'];
    $resAlimentacion = $resultadoAlimentacion["huellaCarbono"];
 
   $consulta = "INSERT INTO Alimentacion (Usuario, Alimentacion) 
    VALUES ('$usuario', '$resAlimentacion')";

$resultado = mysqli_query($conex, $consulta);

}
?>
<?php

include("templates/footer.php");
?>
</form>

</html>