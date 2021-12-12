<?php 

	$pdo = new PDO(
		'mysql:host=localhost;dbname=generator_cv;',
		'root', 
		''
	);
	$pdo->setAttribute(
		PDO::ATTR_ERRMODE, 
		PDO::ERRMODE_EXCEPTION
	);

?>