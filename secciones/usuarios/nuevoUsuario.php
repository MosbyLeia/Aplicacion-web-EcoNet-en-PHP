 <header>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="altaUsuario.css">
 </header>

 <div class="card">
   <div class="card-header">
     Datos usuario
   </div>
   <div class="card-body">
     <form method="post">
       <div class="row">
         <div class="col-md-6 mb-4">
           <div class="form-outline">
             <label class="form-label" for="form3Example1m">Nombres</label>
             <input type="text" name="Nombre" id="Nombre" class="form-control form-control-lg" />

           </div>
         </div>
         <div class="col-md-6 mb-4">
           <div class="form-outline">
             <label class="form-label" for="form3Example1n">Apellidos</label>
             <input type="text" name="Apellidos" id="Apellidos" class="form-control form-control-lg" />

           </div>
         </div>
       </div>

       <div class="form-outline mb-4">
         <label class="form-label" for="form3Example9">Fecha de nacimiento</label>
         <input type="text" name="Fechanac" id="Fechanac" class="form-control form-control-lg" />

       </div>

       <div class="d-grid gap-2 d-md-flex justify-content-md-end">
         <button type="button" class="btn btn-secondary" onclick="history.go(-1)">Cancelar</button>
         <button type="submit" name="registrarse" class="btn btn-success">Registrarse</button>
       </div>

     </form>

     <?php
      include("registrar.php");
      ?>

   </div>
   <div class="card-footer text-muted">

   </div>
 </div>