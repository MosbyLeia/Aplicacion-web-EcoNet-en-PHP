<?php include("templates/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen resultados consulta usuarios</title>
</head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="ecoNet.css"><header>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="ecoNet.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</header>


<main>

</main>
<body>
    <?php $servername = "localhost";
$username = "root";
$password = "";
$dbname = "econet";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$usuario = $_SESSION['Usuario'];
$sql = "SELECT MIN(Fecha_carga) AS FechaMinima
FROM (
    SELECT Fecha_carga FROM Agua WHERE Usuario = '$usuario'
    UNION
    SELECT Fecha_carga FROM Alimentacion WHERE Usuario = '$usuario'
    UNION
    SELECT Fecha_carga FROM Compras WHERE Usuario = '$usuario'
    UNION
    SELECT Fecha_carga FROM Reciclaje WHERE Usuario = '$usuario'
    UNION
    SELECT Fecha_carga FROM Transporte WHERE Usuario = '$usuario'
    UNION
    SELECT Fecha_carga FROM Vestido WHERE Usuario = '$usuario'
    UNION
    SELECT Fecha_carga FROM Vivienda WHERE Usuario = '$usuario'
    
) AS ResultadosMinimos";

$result = $conn->query($sql);
$datos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $datos[] = $row;
    }
} else {
    echo "No se encontraron datos en la base de datos.";
}

$conn->close();
?>
 <div class="cuerpoPag mt-3">
 
 <h3 class="text-center mt-5">Resultados de las consultas realizadas por <?php echo $_SESSION['Usuario']; ?> desde el <?php echo date('d-m-y H:i', strtotime($datos[0]['FechaMinima'])); ?> hs. (primera consulta)</h3>
 <h5 class="text-center mt-3">Nota: todos los valores se encuentran expresados en kg CO2eq.</h5>

 <ul class="nav nav-pills mb-3 mt-5" id="pillsProcesos" role="tablist">
 <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-apoyo-tab" data-bs-toggle="pill" data-bs-target="#resumenTotales"
        type="button" role="tab" aria-controls="pills-apoyo" aria-selected="false">Totales</button>
</li>
<li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-gestion-tab" data-bs-toggle="pill"
        data-bs-target="#resumenAgua" type="button" role="tab" aria-controls="pills-gestion"
        aria-selected="true">Agua</button>
</li>
<li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-sustantivos-tab" data-bs-toggle="pill"
        data-bs-target="#resumenAlimentacion" type="button" role="tab" aria-controls="pills-sustantivos"
        aria-selected="false">Alimentacion</button>
</li>
<li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-apoyo-tab" data-bs-toggle="pill" data-bs-target="#resumenCompras"
        type="button" role="tab" aria-controls="pills-apoyo" aria-selected="false">Compras</button>
</li>
<li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-apoyo-tab" data-bs-toggle="pill" data-bs-target="#resumenReciclaje"
        type="button" role="tab" aria-controls="pills-apoyo" aria-selected="false">Reciclaje</button>
</li>
<li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-apoyo-tab" data-bs-toggle="pill" data-bs-target="#resumenTransporte"
        type="button" role="tab" aria-controls="pills-apoyo" aria-selected="false">Transporte</button>
</li>
<li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-apoyo-tab" data-bs-toggle="pill" data-bs-target="#resumenVestido"
        type="button" role="tab" aria-controls="pills-apoyo" aria-selected="false">Vestido</button>
</li>
<li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-apoyo-tab" data-bs-toggle="pill" data-bs-target="#resumenVivienda"
        type="button" role="tab" aria-controls="pills-apoyo" aria-selected="false">Vivienda</button>
</li>



</ul>

<div class="tab-content" id="pills-tabContent">

    <div class="tab-pane fade show active" id="resumenAgua" role="tabpanel" aria-labelledby="pills-gestion-tab"
        tabindex="0">


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "econet";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$usuario = $_SESSION['Usuario'];
$sql = "SELECT Usuario, Agua, Fecha_carga FROM Agua WHERE Usuario = '$usuario'";
$result = $conn->query($sql);
$datos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $datos[] = $row;
    }
} else {
    echo "No se encontraron datos en la base de datos.";
}

$conn->close();

echo '<div class="container mt-4">';
echo '<table class="table table-bordered col-md-8 mx-auto">
<thead class="thead-dark">
    <tr>
    <th>Fecha de consulta</th>
           <th>Agua</th>

    </tr>
</thead>
<tbody>';
date_default_timezone_set('America/Argentina/Buenos_Aires');
$horaArgentina = date('d-m-y H:i:s');
 foreach ($datos as $fila) {

echo '<tr>';
        echo '<td>' . date('d-m-y H:i', strtotime($fila['Fecha_carga'])) . ' hs.</td>';
    echo '<td>' . $fila['Agua'] . '</td>';
       echo '</tr>';

 }

echo '</tbody>';
echo '</table>';
echo '</div>';

?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var valoresAgua = <?php echo json_encode(array_column($datos, 'Agua')); ?>;
        var fechasConsulta = <?php echo json_encode(array_map(function ($fila) {
            return date('d-m-y H:i', strtotime($fila['Fecha_carga']));
        }, $datos)); ?>;

        var ctx = document.getElementById('graficoBarras').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: fechasConsulta,
                datasets: [{
                    label: 'Consumo de Agua',
                    data: valoresAgua,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 5
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }

            }
        });
    });
</script>


<div class="container mt-4">

    <canvas id="graficoBarras" width="400" height="90"></canvas>
</div>
</div>




<div class="tab-pane fade" id="resumenAlimentacion" role="tabpanel" aria-labelledby="pills-sustantivos-tab" tabindex="1">

                <?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "econet";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }
                $usuario = $_SESSION['Usuario'];

                $sql1 = "SELECT Usuario, Alimentacion, Fecha_carga FROM Alimentacion WHERE Usuario = '$usuario'";


                $result1 = $conn->query($sql1);


                $datos = [];

                if ($result1->num_rows > 0) {
                    while ($row = $result1->fetch_assoc()) {
                        $datos[] = $row;
                    }
                } else {
                    echo "No se encontraron datos en la base de datos.";
                }

        
                $conn->close();


                echo '<div class="container mt-4">';
                echo '<table class="table table-bordered col-md-8 mx-auto">
                <thead class="thead-dark">
                    <tr>
                    <th>Fecha de consulta</th>

                        <th>Alimentación</th>

                    </tr>
                </thead>
                <tbody>';
                date_default_timezone_set('America/Argentina/Buenos_Aires');

                $horaArgentina = date('d-m-y H:i:s');

                 foreach ($datos as $fila) {

                echo '<tr>';
  
                    echo '<td>' . date('d-m-y H:i', strtotime($fila['Fecha_carga'])) . ' hs.</td>';

                     echo '<td>' . $fila['Alimentacion'] . '</td>';

                    echo '</tr>';

                 }


                echo '</tbody>';
                echo '</table>';
                echo '</div>';

                ?>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var valoresAlimentacion = <?php echo json_encode(array_column($datos, 'Alimentacion')); ?>;
                        var fechasConsulta = <?php echo json_encode(array_map(function ($fila) {
                            return date('d-m-y H:i', strtotime($fila['Fecha_carga']));
                        }, $datos)); ?>;

                        var ctx = document.getElementById('graficoBarras0').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: fechasConsulta,
                                datasets: [{
                                    label: 'Alimentación',
                                    data: valoresAlimentacion,
                                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 5
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }

                            }
                        });
                    });
                </script>

                <div class="container mt-4">

                    <canvas id="graficoBarras0" width="400" height="90"></canvas>
                </div>
                </div>

                <div class="tab-pane fade" id="resumenCompras" role="tabpanel" aria-labelledby="pills-sustantivos-tab" tabindex="1">

                <?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "econet";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }
                $usuario = $_SESSION['Usuario'];
 
                $sql1 = "SELECT Usuario, Compras, Fecha_carga FROM Compras WHERE Usuario = '$usuario'";

 
                $result1 = $conn->query($sql1);


                $datos = [];

                if ($result1->num_rows > 0) {
                    while ($row = $result1->fetch_assoc()) {
                        $datos[] = $row;
                    }
                } else {
                    echo "No se encontraron datos en la base de datos.";
                }

                $conn->close();

                echo '<div class="container mt-4">';
                echo '<table class="table table-bordered col-md-8 mx-auto">
                <thead class="thead-dark">
                    <tr>
                    <th>Fecha de consulta</th>

                        <th>Compras</th>

                    </tr>
                </thead>
                <tbody>';
                date_default_timezone_set('America/Argentina/Buenos_Aires');

                $horaArgentina = date('d-m-y H:i:s');

                 foreach ($datos as $fila) {

                echo '<tr>';
                 
                    echo '<td>' . date('d-m-y H:i', strtotime($fila['Fecha_carga'])) . ' hs.</td>';


                 echo '<td>' . $fila['Compras'] . '</td>';

                    echo '</tr>';

                 }


                echo '</tbody>';
                echo '</table>';
                echo '</div>';

                ?>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var valoresCompras = <?php echo json_encode(array_column($datos, 'Compras')); ?>;
                        var fechasConsulta = <?php echo json_encode(array_map(function ($fila) {
                            return date('d-m-y H:i', strtotime($fila['Fecha_carga']));
                        }, $datos)); ?>;

  
                        var ctx = document.getElementById('graficoBarras1').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: fechasConsulta,
                                datasets: [{
                                    label: 'Compras',
                                    data: valoresCompras,
                                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 5
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }

                            }
                        });
                    });
                </script>

                <div class="container mt-4">


                    <canvas id="graficoBarras1" width="400" height="90"></canvas>
                </div>
                </div>

                <div class="tab-pane fade" id="resumenReciclaje" role="tabpanel" aria-labelledby="pills-sustantivos-tab" tabindex="1">

                <?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "econet";

                $conn = new mysqli($servername, $username, $password, $dbname);


                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }
                $usuario = $_SESSION['Usuario'];
                 $sql1 = "SELECT Usuario, Reciclaje, Fecha_carga FROM Reciclaje WHERE Usuario = '$usuario'";

 
                $result1 = $conn->query($sql1);


                $datos = [];

                if ($result1->num_rows > 0) {
                    while ($row = $result1->fetch_assoc()) {
                    $datos[] = $row;
                    }
                } else {
                    echo "No se encontraron datos en la base de datos.";
                }

              
                $conn->close();


                echo '<div class="container mt-4">';
                echo '<table class="table table-bordered col-md-8 mx-auto">
                <thead class="thead-dark">
                    <tr>
                    <th>Fecha de consulta</th>

                        <th>Reciclaje</th>

                    </tr>
                </thead>
                <tbody>';
                date_default_timezone_set('America/Argentina/Buenos_Aires');

                $horaArgentina = date('d-m-y H:i:s');

                 foreach ($datos as $fila) {

                echo '<tr>';

                    echo '<td>' . date('d-m-y H:i', strtotime($fila['Fecha_carga'])) . ' hs.</td>';
                   echo '<td>' . $fila['Reciclaje'] . '</td>';

                    echo '</tr>';

                 }


                echo '</tbody>';
                echo '</table>';
                echo '</div>';

                ?>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var valoresReciclaje = <?php echo json_encode(array_column($datos, 'Reciclaje')); ?>;
                        var fechasConsulta = <?php echo json_encode(array_map(function ($fila) {
                            return date('d-m-y H:i', strtotime($fila['Fecha_carga']));
                        }, $datos)); ?>;


                        var ctx = document.getElementById('graficoBarras2').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: fechasConsulta,
                                datasets: [{
                                    label: 'Reciclaje',
                                    data: valoresReciclaje,
                                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 5
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }

                            }
                        });
                    });
                </script>
                <div class="container mt-4">

                    <canvas id="graficoBarras2" width="400" height="90"></canvas>
                </div>
                </div>

                <div class="tab-pane fade" id="resumenTransporte" role="tabpanel" aria-labelledby="pills-sustantivos-tab" tabindex="1">

                <?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "econet";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }
                $usuario = $_SESSION['Usuario'];
                $sql1 = "SELECT Usuario, Transporte, Fecha_carga FROM Transporte WHERE Usuario = '$usuario'";

                $result1 = $conn->query($sql1);


                $datos = [];

                if ($result1->num_rows > 0) {
                    while ($row = $result1->fetch_assoc()) {
                        $datos[] = $row;
                    }
                } else {
                    echo "No se encontraron datos en la base de datos.";
                }

                $conn->close();

                echo '<div class="container mt-4">';
                echo '<table class="table table-bordered col-md-8 mx-auto">
                <thead class="thead-dark">
                    <tr>
                    <th>Fecha de consulta</th>

                        <th>Transporte</th>

                    </tr>
                </thead>
                <tbody>';
                date_default_timezone_set('America/Argentina/Buenos_Aires');

                $horaArgentina = date('d-m-y H:i:s');

                 foreach ($datos as $fila) {

                echo '<tr>';
        
                    echo '<td>' . date('d-m-y H:i', strtotime($fila['Fecha_carga'])) . ' hs.</td>';


                     echo '<td>' . $fila['Transporte'] . '</td>';

                    echo '</tr>';

                 }
                echo '</tbody>';
                echo '</table>';
                echo '</div>';

                ?>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var valoresTransporte = <?php echo json_encode(array_column($datos, 'Transporte')); ?>;
                        var fechasConsulta = <?php echo json_encode(array_map(function ($fila) {
                            return date('d-m-y H:i', strtotime($fila['Fecha_carga']));
                        }, $datos)); ?>;

                        var ctx = document.getElementById('graficoBarras3').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: fechasConsulta,
                                datasets: [{
                                    label: 'Transporte',
                                    data: valoresTransporte,
                                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 5
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }

                            }
                        });
                    });
                </script>

                <div class="container mt-4">

                    <canvas id="graficoBarras3" width="400" height="90"></canvas>
                </div>
                </div>

                <div class="tab-pane fade" id="resumenVestido" role="tabpanel" aria-labelledby="pills-sustantivos-tab" tabindex="1">

                <?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "econet";

                $conn = new mysqli($servername, $username, $password, $dbname);

          
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }
                $usuario = $_SESSION['Usuario'];
                $sql1 = "SELECT Usuario, Vestido, Fecha_carga FROM Vestido WHERE Usuario = '$usuario'";
                $result1 = $conn->query($sql1);


                $datos = [];

                if ($result1->num_rows > 0) {
                    while ($row = $result1->fetch_assoc()) {
                        $datos[] = $row;
                    }
                } else {
                    echo "No se encontraron datos en la base de datos.";
                }

                $conn->close();

                echo '<div class="container mt-4">';
                echo '<table class="table table-bordered col-md-8 mx-auto">
                <thead class="thead-dark">
                    <tr>
                    <th>Fecha de consulta</th>

                        <th>Vestido</th>

                    </tr>
                </thead>
                <tbody>';
                date_default_timezone_set('America/Argentina/Buenos_Aires');

                          $horaArgentina = date('d-m-y H:i:s');

                 foreach ($datos as $fila) {

                echo '<tr>';
           
                    echo '<td>' . date('d-m-y H:i', strtotime($fila['Fecha_carga'])) . ' hs.</td>';


                     echo '<td>' . $fila['Vestido'] . '</td>';
 
                    echo '</tr>';

                 }


                echo '</tbody>';
                echo '</table>';
                echo '</div>';

                ?>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var valoresVestido = <?php echo json_encode(array_column($datos, 'Vestido')); ?>;
                        var fechasConsulta = <?php echo json_encode(array_map(function ($fila) {
                            return date('d-m-y H:i', strtotime($fila['Fecha_carga']));
                        }, $datos)); ?>;

                        var ctx = document.getElementById('graficoBarras4').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: fechasConsulta,
                                datasets: [{
                                    label: 'Vestido',
                                    data: valoresVestido,
                                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 5
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }

                            }
                        });
                    });
                </script>

                            <div class="container mt-4">
              
                    <canvas id="graficoBarras4" width="400" height="90"></canvas>
                </div>
                </div>

                <div class="tab-pane fade" id="resumenVivienda" role="tabpanel" aria-labelledby="pills-sustantivos-tab" tabindex="1">

                <?php


                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "econet";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }
                $usuario = $_SESSION['Usuario'];
                
                $sql1 = "SELECT Usuario, Vivienda, Fecha_carga FROM Vivienda WHERE Usuario = '$usuario' and Vivienda > 0";

                $result1 = $conn->query($sql1);


                $datos = [];

                        if ($result1->num_rows > 0) {
                    while ($row = $result1->fetch_assoc()) {
                        $datos[] = $row;
                    }
                } else {
                    echo "No se encontraron datos en la base de datos.";
                }

                $conn->close();


                echo '<div class="container mt-4">';
                echo '<table class="table table-bordered col-md-8 mx-auto">
                <thead class="thead-dark">
                    <tr>
                    <th>Fecha de consulta</th>

                        <th>Vivienda</th>

                    </tr>
                </thead>
                <tbody>';
                date_default_timezone_set('America/Argentina/Buenos_Aires');

                $horaArgentina = date('d-m-y H:i:s');

                 foreach ($datos as $fila) {

                echo '<tr>';
                     echo '<td>' . date('d-m-y H:i', strtotime($fila['Fecha_carga'])) . ' hs.</td>';


                     echo '<td>' . $fila['Vivienda'] . '</td>';

                    echo '</tr>';

                 }


                echo '</tbody>';
                echo '</table>';
                echo '</div>';
                ?>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var valoresVivienda = <?php echo json_encode(array_column($datos, 'Vivienda')); ?>;
                        var fechasConsulta = <?php echo json_encode(array_map(function ($fila) {
                            return date('d-m-y H:i', strtotime($fila['Fecha_carga']));
                        }, $datos)); ?>;

                        var ctx = document.getElementById('graficoBarras5').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: fechasConsulta,
                                datasets: [{
                                    label: 'Vivienda',
                                    data: valoresVivienda,
                                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 5
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }

                            }
                        });
                    });
                </script>
                <div class="container mt-4">

                    <canvas id="graficoBarras5" width="400" height="90"></canvas>
                </div>
                </div>

                <div class="tab-pane fade show active" id="resumenTotales" role="tabpanel" aria-labelledby="pills-gestion-tab"
        tabindex="0">


        <?php

        $usuario = $_SESSION['Usuario'];
        $conexion = new mysqli('localhost', 'root', '', 'econet');

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }


        $query = "SELECT 'Agua' AS Tipo, Usuario, SUM(Agua) AS suma_total
        FROM Agua
        WHERE Usuario = '$usuario'
        GROUP BY Usuario

        UNION ALL

        SELECT 'Alimentacion' AS Tipo, Usuario, SUM(Alimentacion) AS suma_total
        FROM Alimentacion
        WHERE Usuario = '$usuario'
        GROUP BY Usuario

        UNION ALL

        SELECT 'Compras' AS Tipo, Usuario, SUM(Compras) AS suma_total
        FROM Compras
        WHERE Usuario = '$usuario'
        GROUP BY Usuario

        UNION ALL

        SELECT 'Vestido' AS Tipo, Usuario, SUM(Vestido) AS suma_total
        FROM Vestido
        WHERE Usuario = '$usuario'
        GROUP BY Usuario

        UNION ALL

        SELECT 'Vivienda' AS Tipo, Usuario, SUM(Vivienda) AS suma_total
        FROM Vivienda
        WHERE Usuario = '$usuario'
        GROUP BY Usuario

        UNION ALL

        SELECT 'Transporte' AS Tipo, Usuario, SUM(Transporte) AS suma_total
        FROM Transporte
        WHERE Usuario = '$usuario'
        GROUP BY Usuario

        UNION ALL

        SELECT 'Reciclaje' AS Tipo, Usuario, SUM(Reciclaje) AS suma_total
        FROM Reciclaje
        WHERE Usuario = '$usuario'
        GROUP BY Usuario;
        ";

        $result = $conexion->query($query);
        if ($result->num_rows > 0) {

            echo '<div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Tema de consulta</th>
                        <th>Suma Total de emisiones</th>
                    </tr>
                </thead>
                <tbody>';

            while ($fila = $result->fetch_assoc()) {
                echo '<tr>

                        <td>' . $fila['Tipo'] . '</td>
                        <td>' . $fila['suma_total'] . '</td>
                      </tr>';
            }

            echo '</table>';
        } else {
            echo "No se encontraron resultados.";
        }


        ?>

                        <?php

                        $datosGrafico = []; 

        while ($fila = $result->fetch_assoc()) {
            $datosGrafico[] = [
                'Tipo' => $fila['Tipo'],
                'suma_total' => $fila['suma_total']
            ];
        }
                        if (isset($datosGrafico) && is_array($datosGrafico)) {
                            foreach ($datosGrafico as $fila) {
                                echo '<tr>
                                        <td>' . $fila['Tipo'] . '</td>
                                        <td>' . $fila['suma_total'] . '</td>
                                      </tr>';
                            }
                        } else {
                            echo '<tr><td colspan="2">No se encontraron resultados.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <canvas id="graficoBarrasT" width="400" height="90"></canvas>
        </div>



</div>









                </div>





                </div>

</body>
</html>



