<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>SocialAnimal - Crear aviso</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<header>
		<a href="<?=$base_url;?>" alt="Logo"><img src="assets/LogoSocialAnimal3.png" alt="Logo"></a>
	</header>
	<div class="container home">
		<div class="row">
			<div class="col-lg-offset-2 col-lg-10">
				<div class="row">
					<div class="col-lg-8">
						<h1>Formulario Aviso</h1>
					</div>
					<form action="" method="post">
						<div class="form-group col-xs-12 col-lg-8">
							<label for="usuario">Usuario:</label>
							<input type="text" class="form-control col-lg-8" name="usuario" placeholder="Introducir usuario" value="<?php if ( isset($usuario) ) echo $usuario; ?>">
							<?php if ( isset($errores['usuario-vacio']) ) : ?>
								<div class="alert alert-danger alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									Por favor introduzca su nombre de usuario.
								</div>
							<?php endif; ?>
						</div>
						<div class="form-group col-xs-12 col-lg-8">
							<label for="animal">Animal perdido o encontrado:</label>
							<select class="form-control" name="animal">
								<option>Tipo animal</option>
								<option value="perro" <?php if (isset($animal) && $animal == 'perro') echo "selected" ?>>Perro</option>
								<option value="gato" <?php if (isset($animal) && $animal == 'gato') echo "selected" ?>>Gato</option>
							</select>
							<?php if ( isset($errores['animal-vacio']) ) : ?>
								<div class="alert alert-danger alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									Por favor introduzca el tipo de animal perdido o encontrado.
								</div>
							<?php endif; ?>
						</div>
						<div class="form-group col-xs-12 col-lg-8">
						<label for="location">Localización:</label>
							<select name="location">
								<option>Localización:</option>
									<?php foreach ($locations as $location): ?>
										<option value="<?=$location['id'];?>"><?=$location['location'];?></option>
									<?php endforeach;?>
							</select>
						</div>
						<div class="form-group col-xs-12 col-lg-8">
							<label for="caracteristicas">Características del animal:</label>
							<textarea class="form-control" name="caracteristicas" rows="5"><?php if (isset($caracteristicas)) echo $caracteristicas;?></textarea>
							<?php if ( isset($errores['caracteristicas-vacio']) ) : ?>
								<div class="alert alert-danger alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									Por favor introduzca características del animal.
								</div>
							<?php endif; ?>
						</div>
						<div class="form-group col-xs-12 col-lg-8">
							<label for="email">Email:</label>
							<input type="email" class="form-control col-lg-8" name="email" placeholder="Email para contacto" value="<?php if (isset($email)) echo $email;?>">
							<?php if ( isset($errores['email-vacio']) ) : ?>
								<div class="alert alert-danger alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									Por favor introduzca su email.
								</div>
							<?php endif; ?>
						</div>
						<div class="form-group col-xs-12 col-lg-8">
							<label for="telefono">Teléfono:</label>
							<input type="text" class="form-control col-lg-8" name="telefono" placeholder="Teléfono para contacto" value="<?php if (isset($telefono)) echo $telefono;?>">
							<?php if ( isset($errores['telefono-vacio']) ) : ?>
								<div class="alert alert-danger alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									Por favor introduzca un teléfono.
								</div>
							<?php endif; ?>
						</div>
						<div class="form-group col-xs-12 col-lg-8">
							<button type="submit" class="btn btn-primary">Enviar aviso</button>
							<a class="btn btn-default" href="<?=$base_url?>/historial/" role="button">Historial avisos</a>
							<a class="btn btn-default" href="<?=$base_url?>/mapa/" role="button">Mapa de avisos</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	 </div>
	 	<footer>2015 - Red social dedicada a buscar y encontrar animales perdidos - <a href="">&copy;SocialAnimal</a>
		</footer>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.js"></script>
</body>
</html>