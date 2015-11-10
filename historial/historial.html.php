<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>SocialAnimal - Historial de avisos</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.css">
	<link rel="stylesheet" href="<?=$base_url?>/css/styles.css">
	<style>
	
	.buttonhome {
		text-align: right;
		margin-left: 262px;
		padding: 10px;
	}

	</style>
</head>
<body>
	<header>
		<a href="<?=$base_url;?>" alt="Logo"><img src="<?=$base_url?>/assets/LogoSocialAnimal3.png" alt="Logo de la página"></a>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-1 col-lg-10">
				<div class="row">
					<div class="col-lg-offset-4 col-lg-10">
						<h1>Historial de Avisos</h1>
					</div>
				<?php if (!empty($avisos)) : ?>
					<table class="table table-striped table table-bordered">
					<thead>
						<tr>
							<th>Nº Aviso</th>
							<th>Usuario</th>
							<th>Animal</th>
							<th>Localización</th>
							<th>Características del animal</th>
							<th>Email</th>
							<th>Teléfono</th>
							<th>Fecha/Hora creación aviso

								<!-- Botones de ordenación de fecha (más o menos reciente) -->
								
								<?php if ($avisos > 1): ?>							
								<div class="row">
									<div class="col-lg-offset-6 col-lg-12">
										<form action="?ordenew" method="post">
											<input type="hidden" name="idaviso" value="<?=$aviso['id'];?>">
												<button type="submit" class="btn btn-link btn-sm listiconbutton"><i class="glyphicon glyphicon-arrow-down"></i></button>
										</form>
										<form action="?ordenold" method="post">
											<input type="hidden" name="idaviso" value="<?=$aviso['id'];?>">
												<button type="submit" class="btn btn-link btn-sm listiconbutton"><i class="glyphicon glyphicon-arrow-up"></i></button>
										</form>
									</div>
								</div>
								<?php endif; ?>
							</th>
							<th>Aviso solucionado</th>
						</tr>
					</thead>
					<tbody>
						<?php $num_aviso=1; ?> 
						<?php foreach ($avisos as $aviso) : ?>
							<tr>
								<td><?=$num_aviso++;?></td>
								<td><?=$aviso['usuario'];?></td>
								<td><?=$aviso['animal']?></td>
								<td><?=$aviso['localizacion']?></td>
								<td><?=$aviso['caracteristicas']?></td>
								<td><?=$aviso['email']?></td>
								<td><?=$aviso['telefono']?></td>
								<td><?=$aviso['createdat']?></td>
								<td class="listicon">
									<form action="?exito" method="post">
										<input type="hidden" name="idaviso" value="<?=$aviso['id'];?>">
										<button type="submit" class="btn btn-link btn-sm listiconbutton"><i class="glyphicon glyphicon-thumbs-up"></i></button>
									</form>
								</td>
							</tr>
						<?php endforeach; ?>
				<?php else: ?>
					<div class="row">
						<div class="col-lg-offset-1 col-lg-10">
							<h2>En estos momentos no existe ningún aviso de animal perdido o encontrado.</h2>
						</div>
					</div>
				<?php endif; ?>
					</tbody>
					</table>
				</div>
				<div class="col-lg-offset-3 col-lg-9 buttonhome">
					<a class="btn btn-default" href="<?=$base_url?>" role="button">Página Principal</a>
					<a class="btn btn-primary" href="<?=$base_url?>/solucionados/" role="button">Avisos solucionados</a>
				</div>
			</div>
		</div>
	</div>
	<footer>2015 - Red social dedicada a buscar y encontrar animales perdidos - <a href="">&copy;SocialAnimal</a>
	</footer>
</body>
</html>