<?php

include("conexionPreguntas.php");

if (isset($_POST['Calcular5'])) {

    $kilometrosDiarios = $_POST['car'];
    $transportePublico = $_POST['public'];
    $moto = $_POST['motorcycle'];
    $carpooling = $_POST['carpooling'];
    $cocheElectrico = $_POST['electriccar'];
       $consulta = "INSERT INTO respuestas_usuarios (Transporte1, Transporte2, Transporte3, Transporte4, Transporte5) VALUES ('$$kilometrosDiarios', '$transportePublico', '$moto', '$carpooling', '$cocheElectrico')";
    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {

        echo "";
    } else {
       
        echo "Error al insertar datos: " . mysqli_error($conex);
    }
}

?>

