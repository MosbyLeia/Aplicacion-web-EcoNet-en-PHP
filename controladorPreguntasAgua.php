<?php

include("conexionPreguntas.php");

if (isset($_POST['Calcular1'])) {

    $Agua1 = $conex->real_escape_string($_POST['shower']);
    $Agua2 = $conex->real_escape_string($_POST['bath']);
    $Agua3 = $conex->real_escape_string($_POST['tapwater']);

    $consulta = "INSERT INTO respuestas_usuarios (Agua1, Agua2, Agua3) VALUES ('$Agua1', '$Agua2', '$Agua3')";

    $resultado = mysqli_query($conex, $consulta);

}
