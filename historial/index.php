<?php 
	
require_once(dirname(dirname(__FILE__)).'/app/info.php');
require_once(__ROOT__.'/db/connectdb.php');

// Muestra el historial de avisos

try {

	$sql = 'SELECT * FROM tb_aviso WHERE moddat IS NULL ORDER BY createdat';
	$ps = $pdo->prepare($sql);
	$ps->execute();
	
} catch (PDOException $e) {

	die("No se ha podido extraer información de la base de datos:". $e->getMessage());
	
}

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
	
	$avisos[] = $row;
}

// Botón aviso solucionado, encontrado el animal perdido

if (isset($_GET['exito'])) {

	$aviso_id = $_POST['idaviso'];

	try {

		$sql = 'UPDATE tb_aviso SET moddat = NOW() WHERE id = :aviso_id';	
		$ps = $pdo->prepare($sql);
		$ps->bindValue(':aviso_id', $aviso_id);
		$ps->execute();

	} catch (PDOException $e) {
		
		die('No se ha podido extraer información de la base de datos.' . $e->getMessage());

	}

	header('Location: .');
	exit();

}

// Fecha más reciente

require_once 'historial.html.php';

?>