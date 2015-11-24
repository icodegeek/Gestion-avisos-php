<?php 
require_once(dirname(dirname(__FILE__)).'/app/info.php');
require_once(__ROOT__.'/db/connectdb.php');

// Muestro los datos de todos los avisos almacenados

try {

	$sql = 'SELECT tb_aviso.animal, tb_locations.location, tb_aviso.caracteristicas FROM tb_aviso INNER JOIN tb_locations ON tb_aviso.id_location = tb_locations.id';

	$ps = $pdo->prepare($sql);
	$ps->execute();
	
} catch (PDOException $e) {

	die("No se ha podido mostrar los avisos de la base de datos:". $e->getMessage());
	
}

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
	
	$avisodatos[] = $row;

}

// Muestro latitud y longitud de todos los avisos almacenados

try {

	$sql = 'SELECT tb_aviso.id_location, tb_aviso.animal, tb_locations.location, tb_locations.lat, tb_locations.lon, tb_aviso.caracteristicas FROM tb_aviso INNER JOIN tb_locations ON tb_aviso.id_location = tb_locations.id';

	$ps = $pdo->prepare($sql);
	$ps->execute();
	
} catch (PDOException $e) {

	die("No se ha podido mostrar los avisos de la base de datos:". $e->getMessage());
	
}

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
	
	$latlon[] = $row;

}

require_once 'mapa.html.php';