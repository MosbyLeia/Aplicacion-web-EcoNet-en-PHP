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
                <h2>    <?php echo $_SESSION['Usuario'];?></p>Tu EcoCalc de <span id="mesActual"> </span>
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

                    <?php

                    ?>

                    <div class="container">
                        <h2>Consumo de agua</h2>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <form method="post" action="">

                                        <label for="shower"><strong>¿Cuánto tiempo te duchas al día? Sé sincer@, si no te bañás prometo no decirle a nadie :D </strong></label>
                                        <select class="form-control" id="shower" name="shower">
                                            <option value="Menos de 5 minutos">Menos de 5 minutos</option>
                                            <option value="5-10 minutos">5-10 minutos</option>
                                            <option value="10-15 minutos">10-15 minutos</option>
                                            <option value="Más de 15 minutos">Más de 15 minutos</option>
                                        </select><br>


                                        <label for="bath">¿Cuántas veces a la semana te bañas en la bañera?</label>
                                        <select class="form-control" id="bath" name="bath">
                                            <option value="Nunca">Nunca</option>
                                            <option value="1-2 veces">1-2 veces</option>
                                            <option value="3-4 veces">3-4 veces</option>
                                            <option value="5-6 veces">5-6 veces</option>
                                            <option value="Todos los días">Todos los días</option>
                                        </select><br>

                                        <label for="tapwater">¿Dejas la canilla abierta al lavarte los dientes?</label>
                                        <select class="form-control" id="tapwater" name="tapwater">
                                            <option value="No">No</option>
                                            <option value="Sí">Sí</option>
                                        </select><br>
                                </div>

                            </div>
                        </div>
                    </div>
                  





</section>



<div class="text-center pt-1 mb-5 pb-1">
<a class="btn btn-danger" href="index.php">Volver a Inicio</a>
    <button name="Calcular1" class="btn btn-primary">Calcular</button>
</div>
<?php

function calcularHuellaCarbono($tiempoDucha, $vecesBano, $dejarCanillaAbierta)
{
    $emisionesDucha = 0;
    $emisionesBano = 0;
    $emisionesCanilla = 0;


    switch ($tiempoDucha) {
        case "Menos de 5 minutos o cero pues no me baño":
            $emisionesDucha = 2;
            break;
        case "5-10 minutos":
            $emisionesDucha = 3;
            break;
        case "10-15 minutos":
            $emisionesDucha = 4;
            break;
        case "Más de 15 minutos":
            $emisionesDucha = 5;
            break;
    }

    switch ($vecesBano) {
        case "Nunca pues no me baño":
            $emisionesBano = 0;
            break;
        case "1-2 veces":
            $emisionesBano = 1;
            break;
        case "3-4 veces":
            $emisionesBano = 2;
        case "5-6 veces":
            $emisionesBano = 3;
            break;
        case "Todos los días":
            $emisionesBano = 4;
            break;
    }

    if ($dejarCanillaAbierta === "Sí") {
        $emisionesCanilla = 1;
    }

    $huellaCarbonoTotalAgua = $emisionesDucha + $emisionesBano + $emisionesCanilla;

    $consejos = [];

    if ($huellaCarbonoTotalAgua >= 5) {
        $consejos[] = "Considera reducir el tiempo de tus duchas para disminuir el consumo de agua y energía.";
    }

    if ($huellaCarbonoTotalAgua >= 7) {
        $consejos[] = "Intenta reducir la frecuencia de tus baños en la bañera para ahorrar agua.";
    }

    if ($dejarCanillaAbierta === "Sí") {
        $consejos[] = "Recuerda cerrar la canilla mientras te cepillas los dientes para evitar desperdiciar agua.";
    }
    if ($huellaCarbonoTotalAgua < 5) {
        $consejos[] = "Felicitaciones, segui asi!";
    }

    return [
        "huellaCarbono" => $huellaCarbonoTotalAgua,
        "consejos" => $consejos
    ];
}

if (isset($_POST['Calcular1'])) {
    $tiempoDucha = $_POST['shower'];
    $vecesBano = $_POST['bath'];
    $dejarCanillaAbierta = $_POST['tapwater'];

    $resultadoAgua = calcularHuellaCarbono($tiempoDucha, $vecesBano, $dejarCanillaAbierta);

    echo '<br>'; 
  

    echo '<br>'; 
    $numeroAgua = (int)($resultadoAgua["huellaCarbono"]);
  
    echo '<div class="alert alert-info" role="alert">';
    echo '<label name="resultadoAgua">Tu huella de carbono respecto al uso del agua es: ' . $resultadoAgua["huellaCarbono"] . ' kg CO2eq.';
    echo '</div>';
    
    $usuario = $_SESSION['Usuario'];

    echo '<div class="alert alert-light" role="alert"><h3>Consejos para reducir tu huella de carbono en el consumo de agua:</h3></div>';
    foreach ($resultadoAgua["consejos"] as $consejo) {
        echo '<div class="alert alert-light" role="alert">';
        echo '<p>' . $consejo . '</p>';
        echo '</div>';
    }
   
    echo '<a id="continuar1" class="btn btn-info offset-10 mb-5" href="preguntasAlimentacion.php" role="button">Continuar</a>';
}
if (isset($_POST['Calcular1'])) {

    $usuario = $_SESSION['Usuario'];
    $resultadoAgua = $resultadoAgua["huellaCarbono"];
   $consulta = "INSERT INTO Agua (Usuario, Agua) 
    VALUES ('$usuario', '$resultadoAgua')";

$resultado = mysqli_query($conex, $consulta);

}

?>
 
</body>
<?php

include("templates/footer.php"); ?>
</form>

</html>

