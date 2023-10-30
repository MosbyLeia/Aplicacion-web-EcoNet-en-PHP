<?php
include("conexionPreguntas.php");

if (isset($_POST['Calcular2'])) {

  
    $Alimentacion1 = $conex->real_escape_string($_POST['meat']);
    $Alimentacion2 = $conex->real_escape_string($_POST['fish']);
    $Alimentacion3 = $conex->real_escape_string($_POST['dairy']);
    $Alimentacion4 = $conex->real_escape_string($_POST['processed']);
    $Alimentacion5 = $conex->real_escape_string($_POST['organic']);
    $consulta = "INSERT INTO respuestas_usuarios (Alimentacion1, Alimentacion2, Alimentacion3, Alimentacion4, Alimentacion5) VALUES ('$Alimentacion1', '$Alimentacion2', '$Alimentacion3', '$Alimentacion4', '$Alimentacion5')";

    $resultado = mysqli_query($conex, $consulta);

}
