<?php

require_once(dirname(dirname(__FILE__)).'/app/info.php');

require_once(__ROOT__.'/db/connectdb.php');

try {

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "CREATE TABLE tb_locations (
		id					INT AUTO_INCREMENT PRIMARY KEY,
		location			VARCHAR(255) NOT NULL,
		lat 				DECIMAL(10,8) NOT NULL,
		lon					DECIMAL(10,8) NOT NULL,
		createdat			TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		editat				TIMESTAMP NULL DEFAULT NULL
	) DEFAULT CHARACTER SET UTF8 ENGINE=InnoDB";

	$pdo->exec($sql);

	$sql = "CREATE TABLE tb_aviso (
		id 					INT AUTO_INCREMENT PRIMARY KEY,
		id_location			INT,
		usuario				VARCHAR(255) NOT NULL,
		animal				ENUM('perro','gato') NOT NULL DEFAULT 'perro',
		localizacion		VARCHAR(255) NOT NULL,
		caracteristicas 	VARCHAR(255) NOT NULL,
		telefono			VARCHAR(255) NOT NULL,
		email				VARCHAR(255) NOT NULL,
		createdat			TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		moddat				TIMESTAMP NULL DEFAULT NULL,
		deletedat			TIMESTAMP NULL DEFAULT NULL,
		FOREIGN KEY (id_location) REFERENCES tb_locations(id)
			ON UPDATE CASCADE
			ON DELETE SET NULL
	) DEFAULT CHARACTER SET UTF8 ENGINE=InnoDB";

	$pdo->exec($sql);
	
}catch(PDOException $e){

		die("No se ha podido crear la tabla:". $e->getMessage());
}