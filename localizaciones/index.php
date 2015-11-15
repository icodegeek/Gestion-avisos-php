<?php 

require_once(dirname(dirname(__FILE__)).'/app/info.php');
require_once(__ROOT__.'/db/connectdb.php');

//Muestra el contenido de la tabla de localizaciones

try {
	
	$sql = 'SELECT * FROM tb_locations';
	$ps = $pdo->prepare($sql);
	$ps->execute();

} catch (PDOException $e) {
	
	die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());
}

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
	
	$locations[] = $row;
}

if (!$_POST) {
	
	require_once 'localizaciones.html.php';

}else{

	$location = htmlspecialchars($_POST['location'], ENT_QUOTES, 'UTF-8');
	$latitud = htmlspecialchars($_POST['latitud'], ENT_QUOTES, 'UTF-8');
	$longitud = htmlspecialchars($_POST['longitud'], ENT_QUOTES, 'UTF-8');
	$errores = [];

	if ($location == "") {
		
		$errores['location-vacio'] = 'Por favor introduzca una localización.';
	}

	if ($latitud == "") {
		
		$errores['latitud-vacio'] = 'Por favor introduzca una latitud';
	}

	if ($longitud == "") {
		
		$errores['longitud-vacio'] = 'Por favor introduzca una longitud';
	}

	if (empty($errores)) {

		try {

		$sql = "INSERT INTO tb_locations (location, lat, lon) VALUES (:location, :latitud, :longitud)";

		$ps = $pdo->prepare($sql);

		$ps->bindValue(':location', $location);
		$ps->bindValue(':latitud', $latitud);
		$ps->bindValue(':longitud', $longitud);
		$ps->execute();
		
	} catch (PDOException $e) {
		
		die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());

	}

	header("Location: .");
	exit();

	}
		
}

// Borrar localización

if (isset($_GET['deleteloc'])) {
	
	$location_id = htmlspecialchars($_POST['idlocation'], ENT_QUOTES, 'UTF-8');

	try {

		$sql = 'DELETE FROM tb_locations WHERE id = :location_id';

		$ps = $pdo->prepare($sql);
		$ps->bindValue(':location_id', $location_id);
		$ps->execute();
		
	} catch (PDOException $e) {
		
		die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());
	
	}

	header("Location: .");
	exit();
}


require_once 'localizaciones.html.php';
