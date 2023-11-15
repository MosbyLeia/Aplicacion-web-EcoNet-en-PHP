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






                        <div class="container">

                            <h2>Compras</h2>

                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <form method="post" action="">
                                            <label for="local">¿Compras productos locales?</label>
                                            <div class="input-group mb-3">
                                                <select class="form-control" id="local" name="local">
                                                    <option value="No">No</option>
                                                    <option value="Sí">Sí</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="organicfood">¿Compras alimentos orgánicos?</label>
                                                <select class="form-control" id="organicfood" name="organicfood">
                                                    <option value="No">No</option>
                                                    <option value="Sí">Sí</option>
                                                </select><br>
                                            </div>

                                            <div class="form-group">
                                                <label for="packaging">¿Evitas productos con mucho embalaje?</label>
                                                <select class="form-control" id="packaging" name="packaging">
                                                    <option value="No">No</option>
                                                    <option value="Sí">Sí</option>
                                                </select><br>
                                            </div>

                                            <div class="form-group">
                                                <label for="clothing">¿Compras ropa de segunda mano?</label>
                                                <select class="form-control" id="clothing" name="clothing">
                                                    <option value="No">No</option>
                                                    <option value="Sí">Sí</option>
                                                </select><br>
                                            </div>

                                            <div class="form-group">
                                                <label for="donations">¿Donas ropa y objetos que ya no usas?</label>
                                                <select class="form-control" id="donations" name="donations">
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

<div class="text-center pt-1 mb-5 pb-1">
<a class="btn btn-danger" href="index.php">Volver a Inicio</a>
    <button type="submit" name="Calcular3" class="btn btn-primary">Calcular</button>
</div>

<?php
function calcularHuellaCarbonoCompras($compraLocal, $alimentosOrganicos, $evitaEmbalaje, $ropaSegundaMano, $donaciones)
{
    $emisionesCompraLocal = 0;
    $emisionesOrganicos = 0;
    $emisionesEvitaEmbalaje = 0;
    $emisionesRopaSegundaMano = 0;
    $emisionesDonaciones = 0;

    if ($compraLocal != "Sí") {
        $emisionesCompraLocal = 1;
    } else
    { $emisionesCompraLocal = 2;
    }

    if ($alimentosOrganicos != "Sí") {
        $emisionesOrganicos = 1;
    }    else { $emisionesCompraLocal = 2;
    }

    if ($evitaEmbalaje != "Sí") {
        $emisionesEvitaEmbalaje = 1;
    } else { $emisionesCompraLocal = 2;
    }

    if ($ropaSegundaMano != "Sí") {
        $emisionesRopaSegundaMano = 1;
    } else { $emisionesCompraLocal = 2;
    }


    if ($donaciones != "Sí") {
        $emisionesDonaciones = 1;
    } else { $emisionesCompraLocal = 2;
    }

    $huellaCarbonoTotalCompras = $emisionesCompraLocal + $emisionesOrganicos + $emisionesEvitaEmbalaje + $emisionesRopaSegundaMano + $emisionesDonaciones;

    $consejos = [];

    if ($huellaCarbonoTotalCompras >= 3) {
        $consejos[] = "Considera comprar más productos locales para reducir las emisiones relacionadas con el transporte.";
    }

    if ($huellaCarbonoTotalCompras >= 2) {
        $consejos[] = "Opta por alimentos orgánicos para apoyar prácticas agrícolas más sostenibles.";
    }

    if ($huellaCarbonoTotalCompras >= 2) {
        $consejos[] = "Evita productos con mucho embalaje para reducir los residuos y las emisiones asociadas a la producción de envases.";
    }

    if ($huellaCarbonoTotalCompras >= 2) {
        $consejos[] = "Compra más ropa de segunda mano para reducir la demanda de producción de prendas nuevas.";
    }

    if ($huellaCarbonoTotalCompras >= 1) {
        $consejos[] = "Continúa donando ropa y objetos que ya no usas para fomentar la reutilización.";
    }
    if ($huellaCarbonoTotalCompras < 1) {
        $consejos[] = "Felicitaciones, segui asi!";
    }

    return [
        "huellaCarbono" => $huellaCarbonoTotalCompras,
        "consejos" => $consejos
    ];
}

if (isset($_POST['Calcular3'])) {
    $compraLocal = $_POST['local'];
    $alimentosOrganicos = $_POST['organicfood'];
    $evitaEmbalaje = $_POST['packaging'];
    $ropaSegundaMano = $_POST['clothing'];
    $donaciones = $_POST['donations'];
$_SESSION['local'] = $_POST['local'];

$_SESSION['organicfood'] = $_POST['organicfood'];

$_SESSION['packaging'] = $_POST['packaging'];

$_SESSION['clothing'] = $_POST['clothing'];

$_SESSION['donations'] = $_POST['donations'];



    $resultadoCompras = calcularHuellaCarbonoCompras($compraLocal, $alimentosOrganicos, $evitaEmbalaje, $ropaSegundaMano, $donaciones);

    echo '<div class="alert alert-info" role="alert">';
    echo "Tu huella de carbono respecto a las compras es: " . $resultadoCompras["huellaCarbono"] . " kg CO2eq.";
    echo '</div>';

    echo '<div class="alert alert-light" role="alert"><h3 >Consejos para reducir tu huella de carbono en las compras:</h3></div>';
    foreach ($resultadoCompras["consejos"] as $consejo) {
        echo '<div class="alert alert-light" role="alert">';
        echo '<p>' . $consejo . '</p>';
        echo '</div>';
    }

    if ($resultadoCompras["huellaCarbono"] > -10) {
        echo '<a id="btn-continuar" class="btn btn-info offset-10 mb-5" href="preguntasReciclaje.php" role="button">Continuar</a>';
    }
}



if (isset($_POST['Calcular3'])) {

$usuario = $_SESSION['Usuario'];
$resCompras = $resultadoCompras["huellaCarbono"];

$consulta = "INSERT INTO Compras (Usuario, Compras) 
VALUES ('$usuario', '$resCompras')";

$resultado = mysqli_query($conex, $consulta);

}
?>

<?php
include("templates/footer.php"); ?>
</form>

</html>