<?php
include("conexionPreguntas.php");


if (isset($_POST['Calcular3'])) {
    $compraLocal = $_POST['local'];
    $alimentosOrganicos = $_POST['organicfood'];
    $evitaEmbalaje = $_POST['packaging'];
    $ropaSegundaMano = $_POST['clothing'];
    $donaciones = $_POST['donations'];

       $consulta = "INSERT INTO respuestas_usuarios (Compras1, Compras2, Compras3, Compras4, Compras5) VALUES ('$compraLocal', '$alimentosOrganicos', '$evitaEmbalaje', '$ropaSegundaMano', '$donaciones')";
   
    $resultado = mysqli_query($conex, $consulta);
    if ($resultado) {

      

        echo "";
    } else {
        
        echo "Error al insertar datos: " . mysqli_error($conex);
    }
}
