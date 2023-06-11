<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>

    <!---Libreria Bootstrap--->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

</head>

<body>

  <!--Barra de navegacion-->
  <header style="position:sticky; top: 0; z-index: 1000;"> 
  
    <nav class="navbar navbar-dark bg-dark sticky-top" >

      <div class="container-fluid">
	  <!-- <h1>Datos de la sesión:</h1>
<pre>
    <?php
        $sessionData = session()->get();
        print_r($sessionData);
    ?>
</pre> -->

        <!--titulo y logo de la barra de navegacion-->
        <a class="navbar-brand title-nav" href= "<?php echo base_url('inicio');?>">
          <img class="logo-nav" src="../public\img\logo-umc.webp" alt="">
          UMC Marketplace
        </a>

        <!--Barra y boton de busqueda-->
        <nav class="navbar bg-dark busqueda ">
          <div class="container-fluid">
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
              <button class="btn btn-outline-light btn-busqueda" type="submit">
                <img class="buscar-logo" src="../public\img\busqueda.svg" alt="">
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
	<section class="my-3">

		<div class="container">
			<h1 class="mb-5">
				Ajustes del perfil
			</h1>

			<!-- contenedor general de toda la parte del perfil -->
			<div class="bg-white shadow d-block d-sm-flex contenedor">

			<div class="profile-tab-nav border-right">
    <!-- foto de perfil escogiendo avatares -->
    <div class="p-4">
        <div class="img-circle text-center mb-3">
            <form id="profile-form" action="<?php echo base_url('Perfil/guardarActualizarAvatar'); ?>" method="POST">
                <div id="profile-image-section">
                    <h3>Foto de Perfil:</h3> 
                    <img src="<?php echo $avatarSrc . '?t=' . time(); ?>" alt="Foto de Perfil" style="width:320px; height:320px;" id="profile-image">
                </div>

                <div class="dropdown">
                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Selecciona tu avatar
                    </button>

                    <div id="avatar-section" class="dropdown-menu text-center">
                        <ul id="avatar-list">
                            <li><img src="../public/img/avatares/mujer-1.svg" alt="Avatar 1" class="avatar" data-avatar-id="1"></li>
                            <li><img src="../public/img/avatares/mujer-2.svg" alt="Avatar 2" class="avatar" data-avatar-id="2"></li>
                            <li><img src="../public/img/avatares/hombre-1.svg" alt="Avatar 3" class="avatar" data-avatar-id="3"></li>
                            <li><img src="../public/img/avatares/hombre-2.svg" alt="Avatar 4" class="avatar" data-avatar-id="4"></li>
                        </ul>
                    </div>

                      <input type="hidden" id="avatarId" name="avatarId" value="">
                      <input type="hidden" id="avatarSrc" name="avatarSrc" value="">
                    <div>
                      <button type="button" class="btn btn-primary" id="guardarAvatar">Guardar</button>
                    </div>
            </form>
       
   
</div>


<script>
    $(document).ready(function() {
        $('.avatar').click(function() {
            var avatarId = $(this).data('avatar-id');
            var avatarSrc = $(this).attr('src');
            $('#profile-image').attr('src', avatarSrc);
            $('#avatarId').val(avatarId);
            $('#avatarSrc').val(avatarSrc);
        });

        $('#guardarAvatar').click(function() {
            var avatarId = $('#avatarId').val();
            var avatarSrc = $('#avatarSrc').val();
            guardarActualizarAvatar(avatarId, avatarSrc);

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Perfil/guardarActualizarAvatar"); ?>', // Eliminamos los comentarios de PHP
                data: {
                    avatarId: avatarId,
                    avatarSrc: avatarSrc
                },
                success: function(response) {
                    alert('Avatar guardado exitosamente');
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>


					
							<!-- Espacio donde van el nombre y el apellido del usuario -->
							</div>
							
						</div>

					<!-- botones para cambiar entre configuracion de cuenta y de publicaciones -->
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

						<!-- boton para los ajustes de la cuenta -->
						<a class="nav-link active mr-2" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i> 
							Cuenta
						</a>

						<!-- boton para los ajustes de las publicaciones -->
						<a class="nav-link mr-2" id="publication-tab" data-toggle="pill" href="#publication" role="tab" aria-controls="publication" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Publicaciones
						</a>
							
					</div>

				</div>


				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">

					<!-- ajustes del perfil -->
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">

							<h3 class="mb-4">
								<i class="fa-solid fa-gear fa-lg" style="color: #fff04d;"></i>
								Ajustes del perfil
							</h3>

							<div class="row">
								<div class="form-group">
									<label>Nombre</label>
									<span id="nombre" class="form-control"><?php echo $nombre; ?></span>

								</div>

								</div>
								<div >
									<div class="form-group">
										<label>Apellido</label>
										<span id="apellido" class="form-control"><?php echo $apellido?></span>
									</div>
								</div>
								<div>
									<div class="form-group">
										<label>Usuario</label>
										<span id="usuario" class="form-control"><?php echo $usuario ?></span>

									</div>
								</div>
								<!-- agregue este div para mostrar el numero de telefono-->
								<div>
									<div class="form-group">
										<label>Telefono</label>
										<span id="telefono" class="form-control"><?php echo $telefono ?></span>

									</div>
								</div>

								<div>
									
								</div>

								<div>
  <form class="form-group bio" id="form-biografia" method="post" action="<?php echo base_url('Perfil/guardar_biografia'); ?>">
    <label>Bio</label>
    <textarea style="height: 150px; overflow:scroll overflow-x:hidden" class="campo form-control" id="biografia" name="biografia" placeholder="Escribe aquí una pequeña biografía"><?php echo $biografia; ?></textarea>

    <button type="submit" class="btn btn-primary save mt-5" id="save-biografia">Guardar</button>
  </form>
</div>

<div id="mensaje-exito" style="display: none;" class="alert alert-success">Biografía actualizada correctamente</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#form-biografia').submit(function(e) {
      e.preventDefault(); // Evitar el envío del formulario

      var biografia = $('#biografia').val();

      $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: { biografia: biografia },
        success: function(response) {
          // Actualizar la biografía en la página
          $('#biografia').val(biografia);
          $('#mensaje-exito').fadeIn().delay(3000).fadeOut();
        },
        error: function(xhr, status, error) {
          // Manejar errores si es necesario
        }
      });
    });
  });
</script>



							</div>
							
						</div>


						<!-- apartado donde iran las publicaciones del perfil -->
						<div class="tab-pane fade" id="publication" role="tabpanel" aria-labelledby="publication-tab">

							
						<?php
            				include_once "post-card.php";
          				?>
							

							

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


	<!-- script para la selecion del avatar de foto de perfil -->
  <script>
var avatarList = document.getElementById('avatar-list');
var avatarItems = avatarList.getElementsByTagName('li');
var profileImage = document.getElementById('profile-image');
var avatarUrlInput = document.getElementById('avatarSrc'); // Cambiamos el ID del input

for (var i = 0; i < avatarItems.length; i++) {
  var avatarImg = avatarItems[i].querySelector('img');
  var avatarId = avatarImg.getAttribute('data-avatar-id');

  avatarItems[i].addEventListener('click', function() {
    var avatarSrc = this.querySelector('img').getAttribute('src');
    profileImage.setAttribute('src', avatarSrc);
    avatarUrlInput.value = avatarSrc;

    guardarActualizarAvatar(avatarId, avatarSrc);
  });
}

function guardarActualizarAvatar(avatarId, avatarSrc) {
  var formData = new FormData();
  formData.append('avatarId', avatarId);
  formData.append('avatarSrc', avatarSrc);

  fetch('<?php echo base_url("Perfil/guardarActualizarAvatar"); ?>', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    console.log('Avatar guardado o actualizado:', data);
    // Lógica adicional después de guardar o actualizar el avatar
  })
  .catch(error => {
    console.error('Error al guardar o actualizar el avatar:', error);
  });
}

</script>




	<!-- script para cambiar de botones entre cuenta y publicaciones -->
	<script>
		$(document).ready(function() {
		// Escuchar el evento clic en los enlaces de la lista de botones
		$(".nav-link").on("click", function() {
			// Remover la clase 'active' de todos los enlaces
			$(".nav-link").removeClass("active");
			// Ocultar todos los contenidos de las pestañas
			$(".tab-pane").removeClass("show active");
			
			// Obtener el valor del atributo 'href' del enlace clicado
			var tabId = $(this).attr("href");
			// Agregar la clase 'active' al enlace clicado
			$(this).addClass("active");
			// Mostrar el contenido de la pestaña correspondiente
			$(tabId).addClass("show active");
		});
		});
	</script>



	<!--Scripts de js para bootstrap-->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
</body>
</html>