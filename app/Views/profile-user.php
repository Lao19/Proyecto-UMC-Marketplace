<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil usuario</title>

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
    <link rel="stylesheet" href="<?php base_url();?>../public\style-profile.css">

	<!-- link al jquery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

</head>

<body>


<header style="position:sticky; top: 0; z-index: 1000;"> 
  <!--Barra de navegacion-->
    <nav class="navbar navbar-dark bg-dark sticky-top" >

      <div class="container-fluid">

        <!--titulo y logo de la barra de navegacion-->
        <a class="navbar-brand title-nav" href= "<?php echo base_url('inicio');?>">
          <img class="logo-nav" src="..\public\img\logo-umc.webp" alt="">
          UMC Marketplace
        </a>

        <!--Barra y boton de busqueda-->
        <nav class="navbar bg-dark busqueda ">
          <div class="container-fluid">
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
              <button class="btn btn-outline-light btn-busqueda" type="submit">
                <img class="buscar-logo" src="..\public\img\busqueda.svg" alt="">
              </button>
            </form>
          </div>
        </nav>

        <!--Boton del menu desplegable a la derecha-->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
          <i class="fa-solid fa-bars fa-lg" style="color: #e6da50;"></i>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">

          <!--Titulo del menu desplegable-->
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
              <i class="fa-solid fa-bars fa-2xl icon" style="color: #e6da50;"></i>
              Menú
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>

          <!--Lista de botones del menu desplegable-->
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

              <!--Boton al perfil del usuario-->
              <li class="nav-item">
                <a class="nav-link" href="profile/<?php echo session('usuario')['usuario']; ?>">
                  <i class="fa-solid fa-user fa-xl icon" style="color: #50b9e6;"></i>
                  Perfil
                </a>
              </li>

              <!--Boton para hacer una publicacion-->
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('postear');?>">
                  <i class="fa-solid fa-upload fa-xl icon" style="color: #50e66e;"></i>
                  Haz una publicación
                </a>
              </li>

              <!--Boton para cerrar sesion-->
                <li class="nav-item active">
                 <a class="nav-link" href="<?php echo base_url();?>/sesion/login">
                  <i class="fa-solid fa-right-from-bracket fa-xl icon" style="color: #e65850;"></i>
                  Cerrar sesión
                </a>
              </li>

              
            </ul>
            
          </div>

        </div>

      </div>

    </nav>
  </header> 


	<!--Cuadro de ajustes del perfil-->
	<section class="my-3">

		<div class="container" style="display: flex;">

			<!-- contenedor general de toda la parte del perfil -->
			<div class="bg-white shadow rounded-lg d-block d-sm-flex contenedor" style="display: flex;">

				<div class="profile-tab-nav border-right">
					<!-- foto de perfil escogiendo avatares -->
					<div class="p-4">
							
						<div class="img-circle text-center mb-3">

							<div id="profile-image-section">
								<!-- <h3>Foto de Perfil:</h3> -->
                                
								<img style="width: 200px;" src="<?php echo $avatarSrc . '?t=' . time(); ?>" alt="Foto de Perfil" id="profile-image">
							</div>

                            <!-- Esto en teoria no hace nada, pero si lo quitan
                            se me jode la vista, asi que como no estorba, no lo toquen KAGBSJKsahgS -->
							<div class="dropdown">
						</div>
					
						<!-- Espacio donde van el nombre y el apellido del usuario -->
						</div>
							<h4 class="nombre-apellido" ><?php echo $usuario['nombre']; ?>  <?php echo $usuario['apellido']; ?></h4>
                            

						</div>

                        <!-- Sistema de raiting -->
                        <!-- Hay que buscar una manera de agregar esto a la base de datos de cada usuario -->
                        <!-- <div class="star-widget text-center" style="justify-content: center;">
                            <input type="radio" name="rate" id="rate-5">
                            <label for="rate-5" class="fas fa-star"></label>

                            <input type="radio" name="rate" id="rate-4">
                            <label for="rate-4" class="fas fa-star"></label>

                            <input type="radio" name="rate" id="rate-3">
                            <label for="rate-3" class="fas fa-star"></label>

                            <input type="radio" name="rate" id="rate-2">
                            <label for="rate-2" class="fas fa-star"></label>

                            <input type="radio" name="rate" id="rate-1">
                            <label for="rate-1" class="fas fa-star"></label>
                        </div> -->

                        <!-- Pequeña bio del usuario -->
                        <div class="form-group" style="margin-left: 5%; margin-right: 5%; margin-bottom: 5%;"">
                        
                        <span id="nombre" class="form-control" style="width: 400px; height: 150px; display: inline-block; overflow: auto; word-wrap: break-word;">
                          <?php echo $usuario['biografia']; ?>
                        </span>

						</div>

                        <!-- En esta seccion iria el promedio del vendedor, solo que no lo pongo porque no
                        se como se va a definir eso -->
                        <!-- <div>
                            <p>
                                Este vendedor tiene un promedio de x estrellas
                            </p>
                        </div> -->
                        
				</div>
                

                <!-- Publicaciones de cada usuario -->
                <div class="tab-content p-md-5 container-fluid" id="publicaciones-usuario">
                    <div class="tab-pane fade show active">
                        <h3 class="mb-4">
                            <i class="fa-solid fa-shop fa-xl"></i>
                            Publicaciones
                        </h3>
                        <div class="container-fluid mx-auto">
                            <div class="album">
                                
                                <div class="row row-cols-1 row-cols-sm-3 g-3" style="max-width: 100%;">
                                <?php
                                  include_once "post-card.php";
                                ?>

                                </div>


                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>

	</section>



	<!--Llamado al archivo de footer-->
	<?php
    	include_once "footer.php";
  	?>

    <!-- Script para el sistema de raiting -->
    <!-- <script>
        // const stars = document.querySelectorAll('.star-widget input');

        // stars.forEach((star, index) => {
        // star.addEventListener('click', () => {
        //     const rating = index + 1;

        //     stars.forEach((star, index) => {
        //     if (index < rating) {
        //         star.checked = true;
        //     } else {
        //         star.checked = false;
        //     }
        //     });
        // });
        // });


    </script> -->


	<!--Scripts de js para bootstrap-->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
</body>
</html>