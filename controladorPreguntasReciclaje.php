<?php


include("conexionPreguntas.php");

// Verifica si se ha enviado el formulario


if (isset($_POST['Calcular4'])) {
    $reciclaje = $_POST['recycling'];
    $compostaje = $_POST['composting'];
        $consulta = "INSERT INTO respuestas_usuarios (Reciclaje1, Reciclaje2) VALUES ('$reciclaje', '$compostaje')";
    $resultado = mysqli_query($conex, $consulta);
    if ($resultado) {

        echo "";
    } else {
        
        echo "Error al insertar datos: " . mysqli_error($conex);
    }
}

?>

