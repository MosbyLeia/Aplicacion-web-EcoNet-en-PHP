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
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Noticias sobre Ecología y Huella de Carbono en Argentina</h2>

        <div id="carouselNoticias" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://concepto.de/wp-content/uploads/2013/08/ecolog%C3%ADa-e1551739090805.jpg" class="d-block w-100" alt="Noticia 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Argentina implementa nuevas políticas para reducir la huella de carbono</h5>
                        <p>El gobierno argentino anuncia medidas para combatir el cambio climático y promover la sostenibilidad en el país.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS670Y71dyWL1v8O5WkDfrh7rUY5lofRfehTcutC38M&s" class="d-block w-100" alt="Noticia 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Avances en energías renovables en Argentina</h5>
                        <p>Parques eólicos y solares están transformando el panorama energético argentino, reduciendo las emisiones de carbono.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://encolombia.com/wp-content/uploads/2021/12/Ecologia.jpg" class="d-block w-100" alt="Noticia 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Proyectos de reforestación en Argentina</h5>
                        <p>Organizaciones ecologistas lanzan iniciativas para plantar árboles y restaurar áreas forestales en todo el país.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselNoticias" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselNoticias" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>


</body>

<?php include("templates/footer.php");?>

</html>