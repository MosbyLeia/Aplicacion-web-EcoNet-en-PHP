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

                            <h2>Reciclaje</h2>
                            <div class="row">
                                <div class="col-8">

                                    <div class="form-group">
                                        <form method="post" action="">
                                            <label for="recycling">¿Cuántas veces a la semana reciclas?</label>
                                            <select class="form-control" id="recycling" name="recycling">
                                                <option value="Nunca">Nunca</option>
                                                <option value="1-2 veces">1-2 veces</option>
                                                <option value="3-4 veces">3-4 veces</option>
                                                <option value="5-6 veces">5-6 veces</option>
                                                <option value="Todos los días">Todos los días</option>
                                            </select><br>
                                    </div>
                                    <label for="composting">¿Compostas tus residuos orgánicos?</label>
                                    <select class="form-control" id="composting" name="composting">
                                        <option value="No">No</option>
                                        <option value="Sí">Sí</option>
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
<div class="text-center pt-1 mb-5 pb-1"><a class="btn btn-danger" href="index.php">Volver a Inicio</a>

    <button type="submit" name="Calcular4" class="btn btn-primary">Calcular</button>
</div>

<?php
function calcularHuellaCarbonoReciclaje($reciclaje, $compostaje)
{
    $emisionesReciclaje = 0;
    $emisionesCompostaje = 0;

    switch ($reciclaje) {
        case "Nunca":
            $emisionesReciclaje = 4;
            break;
        case "1-2 veces":
            $emisionesReciclaje = 3;
            break;
        case "3-4 veces":
            $emisionesReciclaje = 2;
            break;
        case "5-6 veces":
            $emisionesReciclaje = 1;
            break;
        case "Todos los días":
            $emisionesReciclaje = 0;
            break;
    }


    if ($compostaje === "Sí") {
        $emisionesCompostaje = 1;
    }  else 
    { $emisionesCompostaje = 2;
    }

    $huellaCarbonoTotalReciclaje = $emisionesReciclaje + $emisionesCompostaje;

    $consejos = [];

    if ($huellaCarbonoTotalReciclaje >= 3) {
        $consejos[] = "Intenta reciclar más para reducir la cantidad de residuos enviados a vertederos.";
    }

    if ($huellaCarbonoTotalReciclaje >= 1) {
        $consejos[] = "El compostaje es una excelente manera de reducir los residuos orgánicos y generar abono para plantas.";
    }
    if ($huellaCarbonoTotalReciclaje < 1) {
        $consejos[] = "Felicitaciones, segui asi!";
    }
    return [
        "huellaCarbono" => $huellaCarbonoTotalReciclaje,
        "consejos" => $consejos
    ];
}

if (isset($_POST['Calcular4'])) {
    $reciclaje = $_POST['recycling'];
    $compostaje = $_POST['composting'];

    $resultadoReciclaje = calcularHuellaCarbonoReciclaje($reciclaje, $compostaje);

    echo '<div class="alert alert-info" role="alert">';
    echo "Tu huella de carbono relacionada con el reciclaje y compostaje es: " . $resultadoReciclaje["huellaCarbono"] . " kg CO2eq.";
    echo '</div>';

    echo '<div class="alert alert-light" role="alert"><h3 >Consejos para reducir tu huella de carbono en el reciclaje y compostaje:</h3></div>';
    foreach ($resultadoReciclaje["consejos"] as $consejo) {
        echo '<div class="alert alert-light" role="alert">';
        echo '<p>' . $consejo . '</p>';
        echo '</div>';
    }

    if ($resultadoReciclaje["huellaCarbono"] > -10) {
        echo '<a id="btn-continuar" class="btn btn-info offset-10 mb-5" href="preguntasTransporte.php" role="button">Continuar</a>';
    }
}

if (isset($_POST['Calcular4'])) {

    $usuario = $_SESSION['Usuario'];
    $resReciclaje = $resultadoReciclaje["huellaCarbono"];
    
    $consulta = "INSERT INTO Reciclaje (Usuario, Reciclaje) 
    VALUES ('$usuario', '$resReciclaje')";
    
    $resultado = mysqli_query($conex, $consulta);
    
    }
?>

<?php

include("templates/footer.php"); ?>
</form>

</html>