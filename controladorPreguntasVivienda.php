<?php
include("conexionPreguntas.php");
if (isset($_POST['Continuar'])) {

    $consumoElectricidad = $_POST['electricity'];
    $fuenteCalefaccion = $_POST['heating'];
    $fuenteCocina = $_POST['cooking'];
    $fuenteAguaCaliente = $_POST['hotwater'];
    $aislamiento = $_POST['insulation'];
    $panelesSolares = $_POST['solarpanels'];
    $electrodomesticosEficientes = $_POST['energyefficient'];
       $consulta = "INSERT INTO respuestas_usuarios (Vivienda1,Vivienda2, Vivienda3, Vivienda4, Vivienda5, Vivienda6, Vivienda7) VALUES ('$consumoElectricidad', '$fuenteCalefaccion', '$fuenteCocina', '$fuenteAguaCaliente', '$aislamiento', '$panelesSolares'), '$electrodomesticosEficientes')";
    $resultado = mysqli_query($conex, $consulta);
    if ($resultado) {

      
        echo "";
    } else {
       
        echo "Error al insertar datos: " . mysqli_error($conex);
    }
}
