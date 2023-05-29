<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMC Marketplace</title>

    <!---Libreria Bootstrap--->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <!---link de las fuentes a utilizar--->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">

    <!--Link a font awesome, para los iconos-->
    <script src="https://kit.fontawesome.com/3af059f722.js" crossorigin="anonymous"></script>

    <!--Hoja de estilos css-->
    <link rel="stylesheet" href="<?php base_url();?>public\styles-inicio.css">
  </head>


  
<body>

  <!--Llamado al archivo header que contiene la barra de navegacion-->
  <?php
    include_once "header.php";
  ?>

  <main>

    <!--Cartas de las categorias-->
    <div class="container">

      <section class=" text-center container">

        <div class="row py-lg-5">

          <div class="col-lg-8 col-md-8 mx-auto">

            <h1 class="fw-light">
              <!-- <i class="fa-solid fa-tags fa-lg" style="color: #e5e166;"></i>   -->
              Bienvenido a UMC Marketplace
            </h1>

            <p class="lead text-body-secondary">En nuestra plataforma podrás encontrar productos de diferentes categorías:</p>


            <!-- Estos son los botones para filtrar las distintas categorias -->
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn categoria">Vestimenta</button>
              <button type="button" class="btn categoria">Tecnología</button>
              <button type="button" class="btn categoria">Educación</button>
              <button type="button" class="btn categoria">Comestibles</button>
              <button type="button" class="btn categoria">Entretenimiento</button>
              <button type="button" class="btn categoria">Residencias</button>
              <button type="button" class="btn categoria">Otros</button>
            </div>

          </div>
        </div>

      </section>



      <div class="album">
        <div class="container">

          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

          <!-- Aqui es donde van a ir las tarjetas de las publicaciones -->
          <?php
            include_once "post-card.php";
          ?>


        </div>
    </div>

  </main>




  
   <!--Llamado al archivo footer-->
    <?php
      include_once"footer.php";
    ?>


    <!--Scripts de js para bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
  </body>

</html>






    
