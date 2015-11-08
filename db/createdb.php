<?php

require_once(dirname(dirname(__FILE__)).'/app/info.php');

require_once(__ROOT__.'/db/connectdb.php');

try {

	$sql = "CREATE TABLE tb_aviso (

		id 					INT AUTO_INCREMENT PRIMARY KEY,
		usuario				VARCHAR(16) NOT NULL,
		animal				ENUM('perro','gato') NOT NULL DEFAULT 'perro',
		localizacion		VARCHAR(255) NOT NULL,
		caracteristicas 	VARCHAR(255) NOT NULL,
		telefono			VARCHAR(15) NOT NULL,
		email				VARCHAR(80) NOT NULL,
		createdat			TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		moddat				TIMESTAMP NULL DEFAULT NULL,
		deletedat			TIMESTAMP NULL DEFAULT NULL

	)DEFAULT CHARACTER SET UTF8 ENGINE=InnoDB";

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$pdo->exec($sql);
	
}catch(PDOException $e){

		die("No se ha podido crear la tabla 'tasks':". $e->getMessage());
}