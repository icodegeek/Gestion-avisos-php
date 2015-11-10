<?php 

require_once 'app/info.php';
require_once 'db/connectdb.php';

function validar_entrada($usuario, $animal, $localizacion, $caracteristicas, $email, $telefono){

		$fails = [];

		if (empty($usuario)) {
			$fails['usuario-vacio'] = true;	
		}

		if (empty($animal)) {
			$fails['animal-vacio'] = true;
		}

		if (empty($localizacion)) {
			$fails['localizacion-vacio'] = true;
		}

		if (empty($caracteristicas)) {
			$fails['caracteristicas-vacio'] = true;
		}

		if (empty($email)) {
			$fails['email-vacio'] = true;
		}

		if (empty($telefono)) {
			$fails['telefono-vacio'] = true;
		}

		return $fails;

	}


if (!$_POST) {
	
	require_once 'form.html.php';

}else{

	$usuario = htmlspecialchars($_POST['usuario'], ENT_QUOTES, 'UTF-8');
	$animal = htmlspecialchars($_POST['animal'], ENT_QUOTES, 'UTF-8');
	$localizacion = htmlspecialchars($_POST['localizacion'], ENT_QUOTES, 'UTF-8');
	$caracteristicas = htmlspecialchars($_POST['caracteristicas'], ENT_QUOTES, 'UTF-8');
	$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
	$telefono = htmlspecialchars($_POST['telefono'], ENT_QUOTES, 'UTF-8');

	if ($errores = validar_entrada($usuario, $animal, $localizacion, $caracteristicas, $email, $telefono)) {
		
		require_once 'form.html.php';
		
	}else{

		try {

			$sql = "INSERT INTO tb_aviso (usuario, animal, localizacion, caracteristicas, email, telefono) VALUES (:usuario, :animal, :localizacion, :caracteristicas, :email, :telefono)";

			$ps = $pdo->prepare($sql);
			$ps->bindValue(':usuario', $usuario);
			$ps->bindValue(':animal', $animal);
			$ps->bindValue(':localizacion', $localizacion);
			$ps->bindValue(':caracteristicas', $caracteristicas);
			$ps->bindValue(':email', $email);
			$ps->bindValue(':telefono', $telefono);
			$ps->execute();
			
		} catch (PDOException $e) {
			
			die('No se ha podido guardar los datos del aviso en la base de datos' . $e->getMessage());
		}

		require_once 'sent.html.php';
	}

}


?>