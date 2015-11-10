<?php 

require_once(dirname(dirname(__FILE__)).'/app/info.php');
require_once(__ROOT__.'/db/connectdb.php');

// Consulta que muestra los avisos en los que ya se ha encontrado el animal

try {

	$sql = 'SELECT * FROM tb_aviso WHERE moddat IS NOT NULL ORDER BY moddat';
	$ps = $pdo->prepare($sql);
	$ps->execute();
	
} catch (PDOException $e) {

	die("No se ha podido extraer información de la base de datos:". $e->getMessage());
	
}

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
	
	$avisos[] = $row;
}

// Borrar un aviso solucionado por completo de la base de datos

if ( isset($_GET['borrar']) ) {

	$aviso_id = htmlspecialchars($_POST['idaviso'], ENT_QUOTES, 'UTF-8');
	
	try {

	$sql = 'DELETE FROM tb_aviso WHERE id = :aviso_id';
	$ps = $pdo->prepare($sql);
	$ps ->bindValue(':aviso_id', $aviso_id);
	$ps->execute();
	
	} catch (PDOException $e) {

	die("No se ha podido extraer información de la base de datos:". $e->getMessage());
	
	}

	header('Location: .');
	exit();

}

require_once 'solucionados.html.php';