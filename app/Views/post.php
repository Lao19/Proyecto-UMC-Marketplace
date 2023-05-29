<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>

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
    <link rel="stylesheet" href="<?php base_url();?>public/style-post.css">

	<!-- link al jquery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

  <!--Barra de navegacion-->
  <header style="position:sticky; top: 0; z-index: 1000;"> 
  
    <nav class="navbar navbar-dark bg-dark sticky-top" >

      <div class="container-fluid">

        <!--titulo y logo de la barra de navegacion-->
        <a class="navbar-brand title-nav" href= "<?php echo base_url('inicio');?>">
          <img class="logo-nav" src="public\img\logo-umc.webp" alt="">
          UMC Marketplace
        </a>

        <!--Barra y boton de busqueda-->
        <nav class="navbar bg-dark busqueda ">
          <div class="container-fluid">
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
              <button class="btn btn-outline-light btn-busqueda" type="submit">
                <img class="buscar-logo" src="public\img\busqueda.svg" alt="">
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
					<a class="nav-link" href="http://localhost/Proyecto-Uni/profile/<?php echo session('usuario')['usuario']; ?>">
						<i class="fa-solid fa-user fa-xl icon" style="color: #50b9e6;"></i>
						Perfil
					</a>
				</li>
			
			<!--Boton para hacer una publicacion-->
              <li class="nav-item active">
                <a class="nav-link" href="http://localhost/Proyecto-Uni/postear">
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
	<section class="my-5">

		<div class="container">
		
			<!-- contenedor general de toda la parte del perfil -->
			<div class="bg-white shadow d-block d-sm-flex contenedor" style="display: flex; border-radius: 10px;">

				<div class="profile-tab-nav border-right">
					<!-- foto de perfil escogiendo avatares -->
					<div class="p-6">
							
							<div class="img-circle text-center mb-3">

								

								<div class="dropdown">
							</div>
							<!-- Espacio donde van el nombre y el apellido del usuario -->
							</div>
						</div>

					<!-- Imagenes del producto -->
          <div id="carouselExampleIndicators" class="carousel slide" >
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="public/img/misu.webp" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="public/img/raton.webp" class="d-block w-100" alt="...">
              </div>
              
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
					

				</div>


				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">

					<!-- ajustes del perfil -->
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">

							<h3 class="mb-4">
              <i class="fa-solid fa-basket-shopping fa-xl" style="color: #fff04d;"></i>
								Nombre del producto
							</h3>

							<div class="row">

								<div class="product-details">
                  
                  <div class="product-info">

                  <h6>Nombre del vendedor</h6>
                   
                    <h5 class="precio"> USD 50$  </h5>

                    <p class="descripcion"> Descripción del producto Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                    <div class="contact-info">
                        <p>Número de contacto: <span class="telefono">123456789</span> </p>
            
                    </div>

                    <p>Tipo de producto: Tipo de producto</p>
                  </div>
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





	<!--Scripts de js para bootstrap-->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
</body>
</html>

