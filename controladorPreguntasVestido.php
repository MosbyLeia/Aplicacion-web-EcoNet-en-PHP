<?php

include("conexionPreguntas.php");

if (isset($_POST['Continuar'])) {

    $cantidadRopa = $_POST['clothes'];
    $cantidadZapatos = $_POST['shoes'];
    $cantidadAccesorios = $_POST['accessories'];
    $consulta = "INSERT INTO respuestas_usuarios (Vestido1, Vestido2, Vestido3) VALUES ('$cantidadRopa', '$cantidadZapatos', '$cantidadAccesorios')";
      $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {

        echo "";
    } else {
     
        echo "Error al insertar datos: " . mysqli_error($conex);
    }
}

?>
