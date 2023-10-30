<?php include("templates/header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<header>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
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
                <h2>Tu EcoCalc de <span id="mesActual"></span>
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


                            <div class="container">
                                <h3>Instrucciones para Calcular tu Huella de Carbono:</h3>
                                <ol>
                                    <li><b>Electricidad (kWh por Mes):</b> </li>
                                    <p>Registra tu consumo eléctrico mensual en kilovatios-hora (kWh). Puedes encontrar esta información en tus facturas de electricidad.</li>
                                    </p>
                                    <li><strong>Transporte (km por Mes):</strong></li>
                                    <p>Ingresa la cantidad de kilómetros que recorres en tus viajes mensuales. Esto incluye el kilometraje de tu automóvil, transporte público u otros medios de transporte.</p>
                                    <li><strong>Residuos Generados (kg por Mes):</strong> </li>
                                    <p>Indica la cantidad de residuos que generas mensualmente en kilogramos. Esto incluye basura, reciclaje y residuos orgánicos. Puedes estimar este valor basándote en la cantidad de bolsas de basura que tiras cada mes.</li>
                                    </p>
                                    <li><strong>Consumo de Carne (kg por Mes):</strong></li>
                                    <p> Si consumes carne, registra la cantidad de carne que consumes mensualmente en kilogramos. Esto incluye carne de res, pollo, cerdo, etc.</li>
                                    </p>
                                    <li><strong>Reciclaje:</strong></li>
                                    <p> Si separas tus residuos para reciclar, asegúrate de incluir esa cantidad en los "Residuos Generados". Si no lo haces, estos residuos se considerarán como basura regular.</li>
                                    </p>
                                    <li><strong>Compras Sostenibles:</strong> </li>
                                    <p>Considera tus elecciones de compra. Productos como electrodomésticos eficientes, bombillas LED y productos locales pueden reducir tu huella de carbono.</li>
                                    </p>
                                    <li><strong>Viajes y Vacaciones:</strong> </li>
                                    <p>Incluye cualquier viaje o actividad vacacional que hayas realizado durante el mes. Esto puede afectar tu huella de carbono debido al transporte y al consumo durante tus viajes.</li>
                                    </p>
                                    <li><strong>Conservación de Agua y Energía:</strong></li>
                                    <p>Considera tus hábitos de uso del agua y la energía. La conservación del agua y el uso eficiente de la energía también tienen un impacto en tu huella de carbono.</li>
                                    </p>
                                    <li><strong>Recuerda Revisar tus Facturas:</strong></li>
                                    <p>Para obtener datos precisos sobre electricidad y gas, es útil revisar tus facturas mensuales. Muchas facturas proporcionan información detallada sobre tu consumo.</li>
                                    </p>
                                </ol>
                            </div>


                        </div>


                    </body>

</html>

</section>
<br>

</body>

<?php include("templates/footer.php"); ?>

</html>