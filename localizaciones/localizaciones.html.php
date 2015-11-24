<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Social Animal - Localizaciones</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.css">
	<link rel="stylesheet" href="<?=$base_url?>/css/styles.css">
</head>
<body>
	<header>
		<a href="<?=$base_url;?>" alt="Logo"><img src="<?=$base_url?>/assets/LogoSocialAnimal3.png" alt="Logo de la página"></a>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-2 col-lg-8">
				<div class="row">
					<div class="col-lg-8">
						<h1>Localizaciones</h1>
					</div>
				</div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Latitud</th>
							<th>Longitud</th>
							<th>Borrar Localización</th>
						</tr>
					</thead>
					<tbody>
					<?php if ( !empty($locations) ): ?>
						<?php foreach ($locations as $location): ?>
							<tr>
								<td><?=$location['id'];?></td>
								<td><?=$location['location'];?></td>
								<td><?=$location['lat'];?></td>
								<td><?=$location['lon'];?></td>
								<td>
								<form action="?deleteloc" method="post">
									<input type="hidden" name="idlocation" value="<?=$location['id'];?>">
									<button type="submit" class="btn btn-link btn-sm listiconbutton"><i class="glyphicon glyphicon-trash"></i></button>
								</form>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<h1>No hay ninguna localización.</h1>
						<p>Por favor introduzca una localización.</p>
					<?php endif; ?>
					</tbody>
				</table>
				<form action="" method="post">
					<div class="row">
						<div class="form-group col-xs-12 col-lg-6">
							<input type="text" class="form-control col-lg-8" name="location" placeholder="Introducir un nombre de localización">
						</div>
						<div class="form-group col-xs-12 col-lg-8">
							<input type="text" name="latitud" placeholder="Latitud">
						</div>
						<div class="form-group col-xs-12 col-lg-8">
							<input type="text" name="longitud" placeholder="Longitud">
						</div>
						<div class="form-group col-xs-12 col-lg-6">
							<button type="submit" class="btn btn-primary">Guardar</button>
							<a class="btn btn-default" href="<?=$base_url?>" role="button">Página principal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<footer>2015 - Red social dedicada a buscar y encontrar animales perdidos - <a href="">&copy;SocialAnimal</a>
	</footer>
</body>
</html>