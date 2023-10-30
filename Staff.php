<?php include("templates/header.php");?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
      <link rel="stylesheet" href="ecoNet.css">
</header>

<head>

    <title id="title">
        EcoNet
    </title>

</head>

<body>
<style>#cerrarSesionCalculadora {display: none}</style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

    <div id="page-wrapper">


        <div class="container">
            <div class="row mb-5">
                <p id="inicio" class="secciones">Staff</p><br>
                <section>
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalMiembro1">
        Conoce a Marcelo
    </button>

  
    <div class="modal fade" id="modalMiembro1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Marcelo Pérez</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Ing. Ambiental con experiencia en medición y reducción de emisiones de gases de efecto invernadero. Especializado en energías renovables y sostenibilidad.</p>
                </div>
            </div>
        </div>
    </div>

  
    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalMiembro2">
        Conoce a José
    </button>

  
    <div class="modal fade" id="modalMiembro2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">José González</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Expertao en análisis de ciclo de vida y evaluación de impacto ambiental. Apasionadoa por encontrar soluciones sostenibles para las empresas y comunidades.</p>
                </div>
            </div>
        </div>
    </div>

  
    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalMiembro3">
        Conoce a Andrés
    </button>

  
    <div class="modal fade" id="modalMiembro3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Andrés Rodríguez</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Científico de datos especializado en modelado de carbono y análisis estadísticos. Trabaja en la optimización de estrategias para la reducción de la huella de carbono.</p>
                </div>
            </div>
        </div>
        </div>
        </section>
    
    </div>

</body>

</html>

<?php include("templates/footer.php");?>